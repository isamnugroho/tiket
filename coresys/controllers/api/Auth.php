<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Auth extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	function index_get() {
		echo "A";
	}
	
	function login_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$username = $this->input->get('username');
		$password = $this->input->get('password');
		$token = $this->input->get('token');
		
		$this->db->select('
			master_staff.id,
			master_staff.nik,
			master_staff.nama,
			master_staff.jk,
			master_staff.username,
			master_location.id as id_area,
			master_location.name as area,
			master_location.tz as time_zone,
		');
		$this->db->from('master_staff');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->join('trans_schedule', 'master_staff.id = trans_schedule.id_petugas');
		$this->db->join('master_location', 'trans_schedule.id_lokasi = master_location.id');
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		$res = $query->row_array();
		
		$last_query = str_replace(array("\n","\r"), ' ', $this->db->last_query());
		$result['query'] = $last_query;
		
		if ($num_rows > 0) {
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$this->db->update('master_staff', array('token' => $token));
			
			$user = [
				"id"=>$res['id'], 
				"nik"=>$res['nik'], 
				"nama"=>$res['nama'], 
				"jk"=>$res['jk'], 
				"username"=>$res['username'], 
				"id_area"=>$res['id_area'],
				"area"=>$res['area'],
				"time_zone"=>$res['time_zone']
			];
			
			$result['data'] = $user;
			
			$data_send = $this->input->get();
			$result['data_send'] = $data_send;
			$result['status'] = "found";
		} else {
			$data_send = $this->input->get();
			$result['data_send'] = $data_send;
			$result['status'] = "notfound";
		}
		
		echo json_encode($result);
	}
}