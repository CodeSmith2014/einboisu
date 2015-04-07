@extends('admin.master')

@section('title')
@parent
- Clients
@stop

@section('breadcrumb')
@parent
<li>Maintenance Support</li>
<li>List Clients</li>
@stop

@section('page_title_icon')
desktop
@stop

@section('page_title')
List Clients
@stop

@section('page_title_right')
<button data-toggle="modal" data-target="#addMaintenanceModal" class="btn btn-primary btn-lg pull-right header-btn hidden-mobile"><i class="fa fa-plus fa-lg"></i> Add Support to Client</button>
@stop


@section('modals')
<div class="modal fade" id="addMaintenanceModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Add Maintenance Support to Client
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form id="smart-form-register" class="smart-form" action="{{URL::route('maintenance.store')}}" method="post">
					@if($errors->count() > 0)
					<div class="alert alert-block alert-danger">
						<ul style="list-style:none;">
							@foreach($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<fieldset>

						<section>
							<label class="input"> <i class="icon-append fa fa-university"></i>
								<select name="client_id">
								@foreach($clients as $client)
									<option value="{{$client->id}}">{{ $client->name }}</option>
								@endforeach
								</select>
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-clock-o"></i>
								{{ Form::text('hours_purchased', null, ['placeholder'=>'Hours Purchased']) }}
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-clock-o"></i>
								{{ Form::text('hours_spent', null, ['placeholder'=>'Hours Spent']) }}
							</label>
						</section>

					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary">
							Add Support to Client
						</button>
					</footer>
				</form>					
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteMaintenanceModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Confirm Delete Maintenance Support to Client
				</h4>
			</div>
			<div class="modal-body">
				Are you sure you want to proceed?
			</div>
			<div class="modal-footer">
				{{ Form::open(array('id'=>'confirm-delete-form','method'=>'DELETE')) }}
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
				<button type="submit" class="btn btn-labeled btn-danger">
					<span class="btn-label">
						<i class="glyphicon glyphicon-trash"></i>
					</span>Success
				</button>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@stop

@section('content')
<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Clients with Maintenance Support List</h2>
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
									<th data-hide="phone"><i class="fa fa-fw fa-clock-o text-muted hidden-md hidden-sm hidden-xs"></i> Hours Purchased</th>
									<th data-hide="phone"><i class="fa fa-fw fa-clock-o text-muted hidden-md hidden-sm hidden-xs"></i> Hours Spent</th>
									<th data-hide="phone"><i class="fa fa-fw fa-clock-o text-muted hidden-md hidden-sm hidden-xs"></i> Hours Remaining</th>
									<th>Last Updated</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>


								@foreach($maintenances as $maintenance)
									<td>{{$maintenance->id}}</td>
									<td><a href="{{URL::route('clients.edit',$client->id)}}">{{$maintenance->Client->name}}</a></td>
									<td>{{$maintenance->hours_purchased}}</td>
									<td>{{$maintenance->hours_spent}}</td>
									<td>{{$maintenance->hours_remaining}}</td>
									<td>{{$maintenance->updated_at}}</td>
									<td style="valign='middle'">
										<a  href="{{URL::route('maintenance.edit',$maintenance->id)}}" title="Edit" >
											<button class="btn btn-xs btn-default">
												<i class="fa fa-pencil"></i>
											</button>
										</a>
										<a data-toggle="modal" class="confirm-delete" data-id="{{$maintenance->id}}" href="#deleteMaintenanceModal" title="Delete" >
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
	var id = $(this).data('id');
	var url = "{{URL::route('maintenance.index')}}";
	var url = url+'/'+id;
	$("#confirm-delete-form").attr("action",url);
});
</script>

@if($errors->count() > 0)
	<script>
		$(function() {
			$('#addMaintenanceModal').modal('show');
		});
	</script>
@endif
@stop
<!-- END PAGE CUSTOM SCRIPT -->