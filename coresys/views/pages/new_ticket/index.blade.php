@extends('layouts.master')

@section('stylesheet')
@endsection

@section('breadcrumb')
@endsection

@section('content')
	<style>
		/*	start styles for the ContextMenu	*/
		.context_menu {
			background-color: #ebebeb;
			border: 1px solid black;
		}

		.context_menu_item {
			padding: 3px 6px;
		}

		.context_menu_item:hover {
			background-color: #CCCCCC;
		}

		.context_menu_separator {
			background-color: gray;
			height: 1px;
			margin: 0;
			padding: 0;
		}
		
		.controls {
			margin-top: 10px;
			border: 1px solid transparent;
			border-radius: 2px 0 0 2px;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			height: 40px;
			color: rgb(86, 86, 86);
			font-family: Roboto, Arial, sans-serif;
			-moz-user-select: none;
			font-size: 18px;
			background-color: rgb(255, 255, 255);
			padding: 0px 17px;
			border-bottom-right-radius: 2px;
			border-top-right-radius: 2px;
			background-clip: padding-box;
			box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
			min-width: 64px;
			border-left: 0px none;
			outline: currentcolor none medium;
		}
		
		#searchInput {
			background-color: #fff;
			font-family: Roboto;
			font-size: 15px;
			font-weight: 300;
			margin-left: 12px;
			padding: 0 11px 0 13px;
			text-overflow: ellipsis;
			width: 50%;
		}

		#searchInput:focus {
			border-color: #4d90fe;
		}

		ul#geoData {
			text-align: left;
			font-weight: bold;
			margin-top: 10px;
		}

		ul#geoData span {
			font-weight: normal;
		}
		
		.pac-container {
			z-index: 99999999 !important;
		}
	</style>
	<style>
	hanzmobview{
	  margin: 0 auto;
	}
	hanzmobview{
	  display: inline;
	}

	@media screen and (max-width: 1024px){
	hanzmobview{
		display: none;
	  }
	article{
	  padding: 20px;
	  }
	}
	</style>
	<div class="row">
	<hanzmobview>
		<article class="btn-group col-sm-12">
			<div class="navbar navbar-default" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 0px 0px;">
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="dash_maintenance" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Summary Tickets</small><br>
						<small style="color:white;font-size:12px;">Dashboard Maintenance</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px -40px;">
				<a href="new_ticket" class="btn btn-default btn-circle btn-sm zoomsmall active">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">New Tickets</small><br>
						<small style="color:white;font-size:12px;">New Issue Ticket</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px -80px;">
				<a href="status_ticket" class="btn btn-default btn-circle btn-sm zoomsmall ">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/taskred.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Status Ticket</small><br>
						<small style="color:white;font-size:12px;">Status Trouble Ticket</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px -40px;">
				<a href="trouble_category" class="btn btn-default btn-circle zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/folset7.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Activity Type</small><br>
						<small style="color:white;font-size:12px;">Activity Type Services</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 50px;">
				<a href="trouble_sub_category" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/purpleset.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Problem Type</small><br>
						<small style="color:white;font-size:12px;">Problem Type Services </small>
					</p>
				</a>
				</div>			
			</div>
		</article>
	</hanzmobview>
	</div>
	<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px 0px 0px;">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" 	
					data-widget-colorbutton="false" 
					data-widget-togglebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-deletebutton="false"
					data-widget-sortable="false"
					data-widget-editbutton="false"
					>
					
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data New Issue Tickets</b></h2>
						
					</header>
					<span class="ribbon-button-alignment pull-right" style="margin: -42px 180px 0px 0px; "> 
					<section>	
						<button class="btn btn-primary pull-right zoomsmall"  data-toggle="modal" data-target="#myModal" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);border-radius: 4px;width: 100%;height:30px;color:black"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/tikopen.png" height="20" width="20" /><b>Tambah New Ticket</b></button>
					</section>	
					</span>
					<span class="ribbon-button-alignment pull-right" style="margin: -42px 0px 0px 0px; "> 
					<section>	
						<a onclick="createModal()" class="btn btn-primary pull-right zoomsmall" style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;width: 100%;height:30px"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/tikopen.png" height="20" width="20" /><b>Tambah New Ticket</b></a>
					</section>	
					</span>
					<div>
						<div class="widget-body no-padding">

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone">No.</th>
										<th data-class="expand">ID ATM</th>
										<th data-class="expand">Client/Bank</th>
										<th data-class="expand">Area Service Coverage</th>
										<th data-class="expand">Lokasi Mesin ATM</th>
										<th data-class="expand">Ticket No.</th>
										<th data-class="expand">Problem Type</th>
										<th data-class="expand">Date / Time</th>
										<th width="80">Opsi/Fungsional</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>

						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->
			
			

		</div>

		<!-- end row -->
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white; height:40px;">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h5 style="color:white; margin: -8px 0px 0px 0px;"><b><img style="float: left; margin: -4px 5px -10px 0px;" src="<?=base_url()?>assets/img/new-ticket.png" height="18" width="18" /> Data New Issue Tickets</b></h5>
					</div>
					<div class="modal-body">
						
						<div class="widget-body no-padding" style="margin: -10px 0px 0px 0px;">
							<ul id="myTab1" class="nav nav-tabs bordered">
								<li class="active">
									<a href="#s1" data-toggle="tab">
									<span class="widget-icon"> <img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>assets/img/cal.png" height="20" width="22" /> </span>
									Reported Today</a>
								</li>
								<li>
									<a href="#s2" data-toggle="tab">
									<span class="widget-icon"> <img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>assets/img/calendar2.png" height="17" width="17" /> </span>
									Report On Previous Day</a>
								</li>
							</ul>
	
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade in active" id="s1">
									<form action="<?=base_url()?>new_ticket/insert" class="formName">
										<center><h5 style="font-weight: bold">CREATE NEW ISSUE TICKET TODAY<br>TICKET NUMBER : <span id="id_ticket">-</span></h5></center><br>
										<input type="hidden" placeholder="" class="ticket_id form-control" required />
										<div  style="margin: -20px 0px 0px 0px;" class="jarviswidget jarviswidget-color-blueLight" id="wid-id-12" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
											<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);height:30px;">
												<h2 style="font-size:12px; font-weight: bold;"><p class="small" style="margin: 8px 0px 0px 0px;">
												<small style="color:white;font-size:12px;  font-weight: bold;">FORM CREATE NEW TICKET</small></p>
												</h2>
											</header>
											<div>
												<div class="widget-body no-padding"  style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
												<table class="table table-bordered table-condensed">
													<thead>
														<tr>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">TICKET INFORMATION</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">ISSUE REPORTED</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
															<div class="form-group">
																<label>ID ATM</label>
																<select class="form-control idatm" id="idatm" required="">
																	<option value="">-- Select ATM --</option>
																</select>
															</div>
															</td>
															<td>
															<div class="form-group">
																<label>REPORTED BY</label>
																<input type="text" placeholder="Reported By" class="reported_by form-control" required />
															</div>
															</td>
														</tr>
														<tr>
															<td>
															<div class="form-group">
															<label>EMAIL DATE</label>
															<input type="text" placeholder="Email Date" class="email_date form-control" required />
															</div>
															</td>
															<td>
															<div class="form-group">
																<label>EMAIL PIC</label>
																<input type="text" placeholder="Email PIC" class="reported_by form-control" required />
															</div>
															</td>
														</tr>
														<tr>
															<td>
															<div class="form-group">
																<label>REPORTED PROBLEM</label>
																<input type="text" placeholder="Reported Problem" class="reported_problem form-control" required />
															</div>
															</td>
															<td>
															<div class="form-group">
																<label>NO HP PIC</label>
																<input type="text" placeholder="PIC Contact" class="reported_by form-control" required />
															</div>
															</td>
														</tr>
														<tr>
															<td colspan="2">
															<div class="form-group" style="height:20px;">
																<label>REPORTED METHOD</label>
																	<input type="checkbox" name="checkbox-inline" checked="checked" style="margin: 10px 0px 0px 20px;">
																	<i></i>BY EMAIL
																	<input type="checkbox" name="checkbox-inline" style="margin: 10px 0px 0px 20px;">
																	<i></i>BY PHONE
															</div>
															</td>
														</tr>
														<tr>
															<td colspan="2">
															<div class="form-group">
																<label>SERVICE TYPE</label>
																<select class="form-control pic" id="pic" required="">
																	<option value="">-- Select Service Type --</option>
																</select>
															</div>
															</td>
														</tr>
													</tbody>
													<thead>
														<tr>
															<th colspan="2" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">CUSTOMER SUPPORT ENGINEER</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td colspan="2">
															<div class="form-group">
																<label>ASSIGN CSE</label>
																<select class="form-control pic" id="pic" required="">
																	<option value="">-- Select CSE --</option>
																</select>
															</div>
															</td>
														</tr>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="2" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
														</tr>
													</tfoot>
												</table>
											
												
													
												</div>
											</div>
										</div>
							
												
									</form>
									
								</div>
								<div class="tab-pane fade" id="s2">
									<form action="<?=base_url()?>new_ticket/insert" class="formName">
										<center><h5 style="font-weight: bold">CREATE NEW ISSUE TICKET PREVIOUS DAY</center><br><br>
										<input type="hidden" placeholder="" class="ticket_id form-control" required />
										<div  style="margin: 10px 0px 0px 0px;" class="jarviswidget jarviswidget-color-blueLight" id="wid-id-12" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
											<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);height:30px;">
												<h2 style="font-size:12px; font-weight: bold;"><p class="small" style="margin: 8px 0px 0px 0px;">
												<small style="color:white;font-size:12px;  font-weight: bold;">FORM CREATE NEW TICKET</small></p>
												</h2>
											</header>
											<div>
												<div class="widget-body no-padding"  style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
												<table class="table table-bordered table-condensed">
													<thead>
														<tr>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">TICKET INFORMATION</th>
															<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">ISSUE REPORTED</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
															<div class="form-group">
																<label>ID TICKET</label>
																<input type="text" placeholder="ID Ticket" class="reported_problem form-control" required />
															</div>
															</td>
															<td>
															<div class="form-group">
																<label>REPORTED PROBLEM</label>
																<input type="text" placeholder="Reported Problem" class="reported_problem form-control" required />
															</div>
															</td>
														</tr>
														<tr>
															<td>
															<div class="form-group">
																<label>ID ATM</label>
																<select class="form-control idatm" id="idatm" required="">
																	<option value="">-- Select ATM --</option>
																</select>
															</div>
															</td>
															<td>
															<div class="form-group">
																<label>REPORTED BY</label>
																<input type="text" placeholder="Reported By" class="reported_by form-control" required />
															</div>
															</td>
														</tr>
														<tr>
															<td>
															<div class="form-group">
															<label>EMAIL DATE</label>
															<input type="text" placeholder="Email Date" class="email_date form-control" required />
															</div>
															</td>
															<td>
															<div class="form-group">
																<label>EMAIL PIC</label>
																<input type="text" placeholder="Email PIC" class="reported_by form-control" required />
															</div>
															</td>
														</tr>
														<tr>
															<td>
															<div class="form-group">
																<label>JAM EMAIL/CALL</label>
																<input type="text" placeholder="00:00" class="reported_problem form-control" required />
															</div>
															</td>
															<td>
															<div class="form-group">
																<label>NO HP PIC</label>
																<input type="text" placeholder="PIC Contact" class="reported_by form-control" required />
															</div>
															</td>
														</tr>
														<tr>
															<td colspan="2">
															<div class="form-group" style="height:20px;">
																<label>REPORTED METHOD</label>
																	<input type="checkbox" name="checkbox-inline" checked="checked" style="margin: 10px 0px 0px 20px;">
																	<i></i>BY EMAIL
																	<input type="checkbox" name="checkbox-inline" style="margin: 10px 0px 0px 20px;">
																	<i></i>BY PHONE
															</div>
															</td>
														</tr>
														<tr>
															<td colspan="2">
															<div class="form-group">
																<label>SERVICE TYPE</label>
																<select class="form-control pic" id="pic" required="">
																	<option value="">-- Select Service Type --</option>
																</select>
															</div>
															</td>
														</tr>
													</tbody>
													<thead>
														<tr>
															<th colspan="2" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">CUSTOMER SUPPORT ENGINEER</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td colspan="2">
															<div class="form-group">
																<label>ASSIGN CSE</label>
																<select class="form-control pic" id="pic" required="">
																	<option value="">-- Select CSE --</option>
																</select>
															</div>
															</td>
														</tr>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="2" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
														</tr>
													</tfoot>
												</table>
											
												
													
												</div>
											</div>
										</div>
							
												
									</form>
									
								</div>
							</div>
								
						</div>
						
					</div>
					<div class="modal-footer" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white; height:30px;">
						
					
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		
		
				<div class="container content_form" hidden>
		<div class="row">
		
		
		
		
		
			<article class="col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
						<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/new-ticket.png" height="18" width="18" /> </span>
						<h2 style="color:white;font-size:14px; font-weight: bold;">New Ticket
						</h2>
					</header>
					<div>
						<div class="widget-body">
							<form action="<?=base_url()?>new_ticket/insert" class="formName">
								<center><h5 style="font-weight: bold">CREATE NEW ISSUE TICKET <br>TICKET NUMBER : <span id="id_ticket">-</span></h5></center><br>
                                <input type="hidden" placeholder="" class="ticket_id form-control" required />
								<div class="form-group">
                					<label>ID ATM</label>
                					<select class="form-control idatm" id="idatm" required="">
                						<option value="">-- Select ATM --</option>
                					</select>
                				</div>
                				<div class="form-group">
                					<label>EMAIL DATE</label>
                					<input type="text" placeholder="Email Date" class="email_date form-control" required />
                				</div>
                				<div class="form-group">
                					<label>REPORTED PROBLEM</label>
                					<input type="text" placeholder="Reported Problem" class="reported_problem form-control" required />
                				</div>
                				<div class="form-group">
                					<label>REPORTED BY</label>
                					<input type="text" placeholder="Reported By" class="reported_by form-control" required />
                				</div>
                				<div class="form-group">
                					<label>SERVICE TYPE</label>
                					<select name="service_type[]" class="easyui-validatebox service_type" style="width: 100%" required>
                						<option value="">-- Select type --</option>
                					</select>
                				</div>
                				<div class="form-group">
                					<label>C S E</label>
                					<select class="form-control pic" id="pic" required="">
                						<option value="">-- Select PIC --</option>
                					</select>
                				</div>
                				<!--<div class="form-group">
                					<label>PART REPLACEMENT</label>
                					<select multiple name="part[]"  class="form-control part" id="part" required="">
                						<option value="">-- Select Part --</option>
                					</select>
                				</div>-->
							</form>
						</div>
					</div>
				</div>
			</article>		
		</div>

		
		</div>

		
		
		
		<!--<div class="container content_form" hidden style="width:100%">
		<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
						<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/new-ticket.png" height="18" width="18" /> </span>
						<h2 style="color:white;font-size:14px; font-weight: bold;">New Ticket
						</h2>
					</header>
					<div>
						<div class="widget-body no-padding">
						<div class="col-xs-12 col-sm-4 col-md-12" style="margin: 0px 0px 0px 0px;">
							<form action="<?=base_url()?>new_ticket/insert" class="formName">
								<center><h5 style="font-weight: bold">CREATE NEW ISSUE TICKET <br>TICKET NUMBER : <span id="id_ticket">-</span></h5></center><br>

								<div class="form-group">
									<label>ID ATM</label>
									<select class="form-control idatm" id="idatm" required="">
										<option value="">-- Select ATM --</option>
									</select>
								</div>
								<label>ID TICKET (Auto)</label>
								<input type="text" placeholder="ID Tickets" class="ticket_id form-control" required /><br>
								<div class="form-group">
									<label>EMAIL DATE</label>
									<input type="text" placeholder="Email Date" class="email_date form-control" required />
								</div>
								<div class="form-group">
									<label>PROBLEM TYPE</label>
									<select multiple name="problem_type[]" class="easyui-validatebox problem_type" style="width: 100%" required>
										<option value="">-- Select Problem --</option>
									</select>
								</div>
								<div class="form-group">
									<label>C S E</label>
									<select class="form-control pic" id="pic" required="">
										<option value="">-- Select PIC --</option>
									</select>
								</div>
								<div class="form-group" hidden>
									<label>PART REPLACEMENT</label>
									<select multiple name="part[]"  class="form-control part" id="part" required="">
										<option value="">-- Select Part --</option>
									</select>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>
			</article>		
		</div>

		
		</div>-->

	</section>
	<!-- end widget grid -->
@endsection

@section('javascript')
	<script type="text/javascript">

		/* DO NOT REMOVE : GLOBAL FUNCTIONS!
		 *
		 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
		 *
		 * // activate tooltips
		 * $("[rel=tooltip]").tooltip();
		 *
		 * // activate popovers
		 * $("[rel=popover]").popover();
		 *
		 * // activate popovers with hover states
		 * $("[rel=popover-hover]").popover({ trigger: "hover" });
		 *
		 * // activate inline charts
		 * runAllCharts();
		 *
		 * // setup widgets
		 * setup_widgets_desktop();
		 *
		 * // run form elements
		 * runAllForms();
		 *
		 ********************************
		 *
		 * pageSetUp() is needed whenever you load a page.
		 * It initializes and checks for all basic elements of the page
		 * and makes rendering easier.
		 *
		 */

		pageSetUp();
		
		/*
		 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
		 * eg alert("my home function");
		 * 
		 * var pagefunction = function() {
		 *   ...
		 * }
		 * loadScript("<?=BASE_URL?>js/plugin/_PLUGIN_NAME_.js", pagefunction);
		 * 
		 */
		
		// PAGE RELATED SCRIPTS
		
		// pagefunction	
		var table;
		var table2;
		var qty_global;
		var pagefunction = function() {
			//console.log("cleared");
			
			/* // DOM Position key index //
			
				l - Length changing (dropdown)
				f - Filtering input (search)
				t - The Table! (datatable)
				i - Information (records)
				p - Pagination (paging)
				r - pRocessing 
				< and > - div elements
				<"#id" and > - div with an id
				<"class" and > - div with a class
				<"#id.class" and > - div with an id and class
				
				Also see: http://legacy.datatables.net/usage/features
			*/	

			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};
				
				var base_url = "<?php echo base_url();?>";
				table = $('#dt_basic').DataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					},
					"pageLength" : 10,
					"serverSide": true,
					"order": [[1, "asc" ]],
					"columnDefs": [{"orderable": false, "targets": 0}],
					"ajax":{
						url : base_url + 'new_ticket/get_data',
						type : 'POST',
						dataFilter: function(data) {
							console.log(data);
							var json = jQuery.parseJSON( data );
							json.recordsTotal = json.recordsTotal;
							json.recordsFiltered = json.recordsFiltered;
							json.data = json.data;

							return JSON.stringify( json );
						}
					},
				});

			/* END BASIC */

		};

		function createModal() {
			var content = $('.content_form').clone().html();

			$.confirm({
				columnClass: 'col-md-6 col-md-offset-3',
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							var url = self.$content.find('form')[0].action;
							
							var idatm = this.$content.find('.idatm').val();
							var ticket_id = this.$content.find('.ticket_id').val();
							var email_date = this.$content.find('.email_date').val();
							var problem_type = this.$content.find('.problem_type').val();
							var pic = this.$content.find('.pic').val();
							if(!problem_type){ $.alert('provide a valid problem_type'); return false; }
							if(!pic){ $.alert('provide a valid pic'); return false; }

							var data = {
								id: null,
								idatm: idatm,
								ticket_id: ticket_id,
								email_date: email_date,
								problem_type: problem_type,
								pic: pic
							};

							self.showLoading();

							$.ajax({
								url: url,
								dataType: 'json',
								method: 'post',
								data: data,
								timeout: 3000,
							}).done(function (response) {
								
								if(response.status=="exist") {
									self.hideLoading();
									$.alert('Sub kategori sudah tersedia!');
								} else {
									self.close();
									// $.alert('SUCCESS');
									$.confirm({
										title: false,
										content: 'SUCCESS',
										autoClose: 'ok|1000',
										buttons: {
											ok: function () {
												
											}
										}
									});
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					var jc = this;

					this.$content.find('.idatm').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_atm'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					}).on('change', function(e) {
						// Access to full data
						// console.log($(this).select2('data'));
						var data = $(this).select2('data');
						var value = data[0].id;
						var text = data[0].text;
						// alert(value);
						// alert(text);
						

						url = "<?=base_url()?>new_ticket/get_ticket";
						$.ajax({
							url: url,
							dataType: 'html',
							method: 'post',
							data: {id: value},
							timeout: 3000,
						}).done(function (response) {
							jc.$content.find('#id_ticket').html(response)
							jc.$content.find('.ticket_id').val(response)
						}).fail(function(){
							$.alert('Something went wrong.');
						});
					});;

					this.$content.find('.problem_type').select2({
						tags: false, tokenSeparators: [','], width: '100%',
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_problem'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}, maximumSelectionLength: 3,
						createTag: function (params) { var term = $.trim(params.term);
							if (term === '') { return null; }
							return { id: term, text: term + ' (add new)' };
						}
					});

					this.$content.find('.pic').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_pic'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});

					this.$content.find('.part').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_part'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});

					this.$content.find('.email_date').datepicker({
						autoclose: true,
						minViewMode: 0,
						format: 'yyyy-mm-dd',
						todayHighlight: true
					}).on('changeDate', function(selected){
						var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
						var tahun = selected.date.getFullYear(); 
					}); 

					this.$content.find('form').on('submit', function (e) {
						e.preventDefault();
						jc.$$formSubmit.trigger('click');
					});
				}
			});
		}

		function updateModal(id, category_id, category_name, name) {
			var content = $('.content_form').clone().html();

			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							var url = self.$content.find('form')[0].action;
							
							var category = this.$content.find('.category').val();
							var name = this.$content.find('.name').val();
							if(!category){ $.alert('provide a valid category'); return false; }
							if(!name){ $.alert('provide a valid name'); return false; }
							
							var data = {
								id: id,
								category: category,
								name: name
							};

							self.showLoading();
							
							$.ajax({
								url: url,
								dataType: 'json',
								method: 'post',
								data: data,
								timeout: 3000,
							}).done(function (response) {
								// self.buttons.formSubmit.hide();
								// self.buttons.cancel.hide();
								// self.close();
								
								if(response.status=="exist") {
									self.hideLoading();
									$.alert('Lokasi sudah tersedia!');
								} else {
									self.close();
									// $.alert('SUCCESS');
									$.confirm({
										title: false,
										content: 'SUCCESS',
										autoClose: 'ok|1000',
										buttons: {
											ok: function () {
												
											}
										}
									});
									
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					this.$content.find('.category').append('<option value="'+category_id+'">'+category_name+'</option>');
					this.$content.find('.category').val(category_id);
					this.$content.find('.category').select2().trigger('change');
					this.$content.find('.category').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticket/select_category'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});

					// this.$content.find('.category').val(category);
					// this.$content.find('.category').select2().trigger('change');
					var jc = this;
					jc.$content.find('.name').val(name);
					this.$content.find('form').on('submit', function (e) {
						e.preventDefault();
						jc.$$formSubmit.trigger('click');
					});
				}
			});
		}

		function deleteAction(url) {
			$.confirm({
				title: 'Delete data?',
				content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
				autoClose: 'cancel|8000',
				buttons: {
					delete: {
						text: 'delete',
						keys: ['enter'],
						action: function () {
							$.ajax({
								url: url,
								dataType: 'html',
								timeout: 3000,
							}).done(function (response) {
								
								if(response=="SUCCESS") {
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
						}
					},
					cancel: function () {
						
					}
				}
			});
		}

		
		// load related plugins
		
		loadScript("<?=BASE_URL?>js/plugin/datatables/jquery.dataTables.min.js", function(){
			loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.colVis.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
					loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
						loadScript("<?=base_url()?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js", function(){
							loadScript("<?=BASE_URL?>js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
						});
					});
				});
			});
		});


	</script>
@endsection