@extends('admin.master')

@section('title')
@parent
Client List - Client Information - E Inboisu
@stop

@section('breadcrumb')
@parent
<li>Client Information</li>
<li>Client List</li>
@stop

@section('page_title_icon')
university
@stop

@section('sub_navigation')
	@include('admin.navigation-client')
@stop

@section('page_title')
Client List
@stop

@section('page_title_right')
<a data-toggle="modal" data-target="#addClientModal" class="btn btn-primary btn-lg pull-right header-btn hidden-mobile"><i class="fa fa-plus fa-lg"></i> Add New Client</a>
@stop

@section('modals')
	@include('admin.client.create-modal')
	@include('admin.client.delete-modal')
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
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>List of Clients</h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th data-hide="phone">ID</th>
									<th>Company</th>
									<th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Phone</th>
									<th><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Address</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($clients as $client)
								<tr>
									<td>{{$client->id}}</td>
									<td><a href="{{URL::route('clients.show',$client->id)}}" title="Edit" >{{$client->name}}</a></td> 
									<td>{{$client->office_no}}</td>
									<td>{{$client->address}} {{$client->country}} {{$client->postal_code}}</td>
									<td style="valign='middle'">
										<a  href="{{URL::route('clients.show',$client->id)}}" title="Edit" >
											<button class="btn btn-xs btn-default">
												<i class="fa fa-pencil"></i>
											</button>
										</a>
										<a data-toggle="modal" class="confirm-delete" data-id="{{$client->id}}" href="#deleteClientModal" title="Delete" >
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

<!-- PAGE SCRIPTS -->
@section('page_scripts')
{{HTML::script("/assets/js/plugin/datatables/jquery.dataTables.min.js");}}
{{HTML::script("/assets/js/plugin/datatables/dataTables.colVis.min.js");}}
{{HTML::script("/assets/js/plugin/datatables/dataTables.tableTools.min.js");}}
{{HTML::script("/assets/js/plugin/datatables/dataTables.bootstrap.min.js");}}
{{HTML::script("/assets/js/plugin/datatable-responsive/datatables.responsive.min.js");}}
@stop
<!-- END PAGE SCRIPTS -->

<!-- DOCUMENT READY -->
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
<!-- END DOCUMENT READY -->

<!-- PAGE CUSTOM SCRIPT -->
@section('javascript')
<script type="text/javascript">
$(document).on("click", ".confirm-delete", function () {
	var id 				= $(this).data('id');
	var url 			= "{{URL::route('clients.index')}}" + "/" + id;

	$("#delete-modal-client").attr("action",url);
});
</script>
@stop
<!-- END PAGE CUSTOM SCRIPT -->