<?php $__env->startSection('content'); ?>
	<table class="easyui-datagrid" data-options="url:'<?=base_url()?>dashboard/summary_attend',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true">
		<thead>
			<tr>
				<th data-options="field:'karyawan',align:'left'" width="200">KARYAWAN</th>
				<th data-options="field:'tanggal',align:'center'" width="100">TANGGAL</th>
				<th data-options="field:'status',align:'center'" width="100">STATUS</th>
				<th data-options="field:'clockin',align:'center'" width="200">CLOCK IN</th>
				<th data-options="field:'clockout',align:'center'" width="200">CLOCK OUT</th>
			</tr>
		</thead>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.easyui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\atmserv-assindo\coresys\views/pages/dashboard_merchant_internal/table_attend.blade.php ENDPATH**/ ?>