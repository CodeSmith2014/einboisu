@extends('admin.master')

@section('title')
@parent
Client Details - Maintenance Support - E Inboisu
@stop

@section('breadcrumb')
@parent
<li>Maintenance Support</li>
<li>Client Details</li>
@stop

@section('page_title_icon')
university
@stop

@section('sub_navigation')
	
@stop

@section('page_title')
Client Details
@stop

@section('page_title_right')
<a href="{{URL::route('maintenance.index')}}" class="btn btn-danger btn-lg pull-right header-btn hidden-mobile"><i class="fa fa-circle-arrow-up fa-lg"></i>Back</a>
<a data-toggle="modal" class="add-modal-onsitesupport btn btn-primary btn-lg pull-right header-btn" data-mid="{{$maintenance->id}}" href="#addOnsitesupportModal"><i class="fa fa-plus fa-lg"></i> Add Onsite Support</a>
@stop

@section('modals')
	@include('admin.maintenance.edit-modal')
	@include('admin.onsitesupport.create-modal')
	@include('admin.onsitesupport.edit-modal')
	@include('admin.onsitesupport.delete-modal')
@stop

@section('content')
<div class="row">
	<article class="col-sm-12 col-md-12 col-lg-12">
		@if($errors->count() > 0)
		<div class="alert alert-block alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</article>
</div>
<section id="widget-grid" class="">
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>{{$maintenance->client->name}}</h2>
				</header>
				<div class="widget-body">
					<form id="company-form" class="smart-form" novalidate="novalidate">
						<fieldset>
							<div class="row">
								<section class="col col-4">
									<label class="label">Total Hours Purchased</label>
									<span>{{$maintenance->hours_purchased}}</span>
								</section>
								<section class="col col-4">
									<label class="label">Total Hours Spent</label>
									<span>{{$maintenance->hours_spent}}</span>
								</section>
								<section class="col col-4">
									<label class="label">Total Hours Remaining</label>
									<span>{{$maintenance->hours_remaining}}</span>
								</section>
							</div>
						</fieldset>
						<footer>
							<a data-toggle="modal" class="edit-modal-maintenance btn btn-primary btn-lg pull-right header-btn" data-mid="{{$maintenance->id}}" data-hourspurchased="{{$maintenance->hours_purchased}}" href="#editMaintenanceModal">Edit Total Hours Purchased</a>
						</footer>
					</form>
				</div>
			</div>
		</article>
	</div>
</section>
<section>



<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>List of Onsite Support</h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th>Company</th>
									<th><i class="fa fa-fw fa-clock-o text-muted hidden-md hidden-sm hidden-xs"></i> Hours Spent</th>
									<th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Onsite Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($onsitesupports as $onsitesupport)
								<tr>
									<td>{{$onsitesupport->maintenance->client->name}}</td>
									<td>{{$onsitesupport->hours_spent}}</td>
									<td>{{$onsitesupport->onsite_date}}</td>
									<td style="valign='middle'">
										<a data-toggle="modal" class="edit-modal-onsitesupport" data-mid="{{$onsitesupport->maintenance_id}}" data-oid="{{$onsitesupport->id}}" data-hoursspent='{{$onsitesupport->hours_spent}}' data-onsitedate='{{$onsitesupport->onsite_date}}' href="#editOnsitesupportModal" title="Edit" >
											<button class="btn btn-xs btn-default">
												<i class="fa fa-pencil"></i>
											</button>
										</a>
										<a data-toggle="modal" class="confirm-delete" data-mid="{{$onsitesupport->maintenance_id}}" data-oid="{{$onsitesupport->id}}" href="#deleteOnsitesupportModal" title="Delete" >
											<button class="btn btn-xs btn-default">
												<i class="fa fa-times"></i>
											</button>
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
@stop

@section('page_scripts')
{{HTML::script("/assets/js/plugin/jquery-form/jquery-form.min.js");}}
{{HTML::script("/assets/js/plugin/datatables/jquery.dataTables.min.js");}}
{{HTML::script("/assets/js/plugin/datatables/dataTables.colVis.min.js");}}
{{HTML::script("/assets/js/plugin/datatables/dataTables.tableTools.min.js");}}
{{HTML::script("/assets/js/plugin/datatables/dataTables.bootstrap.min.js");}}
{{HTML::script("/assets/js/plugin/datatable-responsive/datatables.responsive.min.js");}}
@stop

@section('document_ready')
var responsiveHelper_dt_basic = undefined;
var responsiveHelper_datatable_fixed_column = undefined;
var responsiveHelper_datatable_col_reorder = undefined;
var responsiveHelper_datatable_tabletools = undefined;

var breakpointDefinition = {
tablet : 1024,
phone : 480
};

$('#dt_basic').dataTable({
"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
"t"+
"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
"autoWidth" : true,
"iDisplayLength" : 25,
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
}
});
/* END BASIC */

/* COLUMN FILTER  */
var otable = $('#datatable_fixed_column').DataTable({
//"bFilter": false,
//"bInfo": false,
//"bLengthChange": false
//"bAutoWidth": false,
//"bPaginate": false,
//"bStateSave": true // saves sort state using localStorage
"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
"t"+
"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
"autoWidth" : true,
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_datatable_fixed_column) {
responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
},
"drawCallback" : function(oSettings) {
responsiveHelper_datatable_fixed_column.respond();
}		

});

// custom toolbar
$("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

// Apply the filter
$("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

otable
.column( $(this).parent().index()+':visible' )
.search( this.value )
.draw();

} );
/* END COLUMN FILTER */   

/* COLUMN SHOW - HIDE */
$('#datatable_col_reorder').dataTable({
"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
"t"+
"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
"autoWidth" : true,
"preDrawCallback" : function() {
// Initialize the responsive datatables helper once.
if (!responsiveHelper_datatable_col_reorder) {
responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
}
},
"rowCallback" : function(nRow) {
responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
},
"drawCallback" : function(oSettings) {
responsiveHelper_datatable_col_reorder.respond();
}			
});

/* END COLUMN SHOW - HIDE */
@stop

@section('javascript')
<script>
$(document).on("click", ".edit-modal-maintenance", function () {
	var mid 			= $(this).data('mid');
	var hours_purchased = $(this).data('hourspurchased');
	var url 			= "{{URL::route('maintenance.index')}}" + "/" + mid;

	$("#editMaintenanceModal #edit-modal-maintenance").attr("action",url);
	$("#editMaintenanceModal #maintenance_id").attr("value",mid);
	$("#editMaintenanceModal #total_hours_purchased").attr("value",hours_purchased);
});

$(document).on("click", ".add-modal-onsitesupport", function () {
	var mid 			= $(this).data('mid');
	var url 			= "{{URL::route('onsitesupport.index')}}";

	$("#addOnsitesupportModal #add-modal-onsitesupport").attr("action",url);
	$("#addOnsitesupportModal #maintenance_id").attr("value",mid);
});

$(document).on("click", ".edit-modal-onsitesupport", function () {
	var mid 			= $(this).data('mid');
	var oid 			= $(this).data('oid');
	var hours_spent 	= $(this).data('hoursspent');
	var onsite_date 	= $(this).data('onsitedate');
	var url 			= "{{URL::route('onsitesupport.index')}}" + "/" + oid;

	$("#editOnsitesupportModal #edit-modal-onsitesupport").attr("action",url);
	$("#editOnsitesupportModal #maintenance_id").attr("value",mid);
	$("#editOnsitesupportModal #hours_spent").attr("value",hours_spent);
	$("#editOnsitesupportModal #onsite_date").attr("value",onsite_date);
});

$(document).on("click", ".confirm-delete", function () {
	var mid 			= $(this).data('mid');
	var oid 			= $(this).data('oid');
	var url 			= "{{URL::route('onsitesupport.index')}}" + "/" + oid;

	$("#delete-modal-onsitesupport").attr("action",url);
});
</script>
@stop