@extends('admin.master')

@section('title')
@parent
Client Details - Maintenance Support - E Inboisu
@stop

@section('breadcrumb')
@parent
<li>Client Information</li>
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
<a href="{{URL::route('clients.index')}}" class="btn btn-danger btn-lg pull-right header-btn hidden-mobile"><i class="fa fa-circle-arrow-up fa-lg"></i>Back</a>
@stop

@section('modals')
	@include('admin.client.edit-modal')
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
		<article class="col-sm-12 col-md-12 col-lg-6">
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>{{$client->name}}</h2>
				</header>
				<div class="widget-body">
					<form id="company-form" class="smart-form" novalidate="novalidate">
						<fieldset>
							<div class="row">
								<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<label for="name" class="label">Company Name</label>
									<label class="input state-disabled"> <i class="icon-append fa fa-university"></i>
										{{ Form::text('name', $client->name, ['disabled'=>'disabled'])}}
									</label>
								</section>

							</div>
							<div class="row">
								<section class="col col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="reg_no" class="label">Registration No.</label>
									<label class="input state-disabled"> <i class="icon-append fa fa-briefcase"></i>
										{{ Form::text('reg_no', $client->reg_no, ['disabled'=>'disabled'])}}
									</label>
								</section>
								<section class="col col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="office_no" class="label">Office No.</label>
									<label class="input state-disabled"> <i class="icon-append fa fa-phone"></i>
										{{ Form::text('office_no', $client->office_no, ['disabled'=>'disabled'])}}
									</label>
								</section>
								<section class="col col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="fax_no" class="label">Fax No.</label>
									<label class="input state-disabled"> <i class="icon-append fa fa-fax"></i>
										{{ Form::text('fax_no', $client->fax_no, ['disabled'=>'disabled'])}}
									</label>
								</section>
							</div>
						</fieldset>
						<fieldset>
							<section>
								<label for="address" class="label">Address</label>
								<label class="textarea state-disabled">
									{{ Form::textarea('address', $client->address, ['class'=>'custom-scroll', 'size'=>'1x3', 'disabled'=>'disabled'])}}
								</label>
							</section>
							<div class="row">
								<section class="col col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="country" class="label">Country</label>
									<label class="select state-disabled">
										<select name="country" disabled="disabled">
											<option value="">{{$client->country}}</option>
										</select> <i></i>
									</label>
								</section>
								<section class="col col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="city" class="label">City</label>
									<label class="input state-disabled">
										{{ Form::text('city', $client->city, ['disabled'=>'disabled'])}}
									</label>
								</section>
								<section class="col col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<label for="postal_code" class="label">Postal Code</label>
									<label class="input state-disabled">
										{{ Form::text('postal_code', $client->postal_code, ['disabled'=>'disabled'])}}
									</label>
								</section>
							</div>
							<section>
								<label for="notes" class="label">Additional Information</label>
								<label class="textarea state-disabled">
									{{ Form::textarea('notes', $client->notes, ['class'=>'custom-scroll', 'size'=>'1x3', 'disabled'=>'disabled'])}}
								</label>
							</section>
						</fieldset>
						<footer>
							<a 	data-toggle="modal"
								class="edit-modal-client btn btn-primary btn-lg pull-right header-btn"
								data-cid="{{$client->id}}"
								data-name="{{$client->name}}"
								data-regno="{{$client->reg_no}}"
								data-officeno="{{$client->office_no}}"
								data-faxno="{{$client->fax_no}}"
								data-address="{{$client->address}}"
								data-country="{{$client->country}}"
								data-city="{{$client->city}}"
								data-postalcode="{{$client->postal_code}}"
								data-notes="{{$client->notes}}"
								href="#editClientModal">Edit Client Information</a>
						</footer>
					</form>
				</div>
			</div>
		</article>

		<article class="col-sm-12 col-md-12 col-lg-6">
			<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Contact Personnel</h2>
				</header>
				<div class="widget-body">
					<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						<thead>			                
							<tr>
								<th>Name</th>
								<th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Phone</th>
								<th data-hide="phone,tablet"><i class="fa fa-fw fa-envelope-o hidden-md hidden-sm hidden-xs"></i> Address</th>
								<th><i class="fa fa-fw fa-cog hidden-md hidden-sm hidden-xs"></i> Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($contacts as $contact)
							<tr>
								<td>{{$contact->name}}</td> 
								<td>{{$contact->mobile_no}}</td>
								<td>{{$contact->email}}</td>
								<td>
									<a data-toggle="modal" class="edit-modal" data-id="{{$contact->id}}" data-name="{{$contact->name}}" data-email="{{$contact->email}}" data-mobileno="{{$contact->mobile_no}}" href="#editContactModal" title="Edit {{$contact->name}}" >
										<button class="btn btn-xs btn-default">
											<i class="fa fa-pencil"></i>
										</button>
									</a>

									<a data-toggle="modal" class="confirm-remove" data-id="{{$contact->id}}" href="#removeContactModal" title="Remove {{$contact->name}} from {{$client->name}}" >
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

<!-- 
	request: 	request object with a single term property.
				value currently in the text input.

	response:	expects a single argument: the data suggest to the user.

	complete:	a callback function to run when the request is complete.
				the function receives the raw request object and the text status of the request.

	data:		data to be sent to server. this can be either be an object or a query string.

	json:		evaluate the response as json and return javascript object. the JSON data is parsed in strict manner;
				any malformed JSON is rejected and a parse error is thrown. 

	jsonp:		the callback name to send in query string when making jsonp request.

	success : function(data) {
				$.each(data,function(key,val){
					console.log(val.name);
				});
			}
		-->

		@section('document_ready')
		var id = $("#client-id").val();
		$("#name").autocomplete({
		source : function(request, response) {
		$.ajax({
		url : "http://localhost/contacts/ajaxGetContacts/"+id,
		data: {
		q: request.term
	},
	dataType : "json",
	type : "post",
	delay: 1500,
	success : function(data) {
	response($.map(data, function(item) {
	return {
	label : item.name,
	value : item.name,
	mobile: item.mobile_no,
	email:	item.email
}
}));
}
});
},
minLength : 2,
select : function(event, ui) {
$("#email").val(ui.item.email);
$("#mobile").val(ui.item.mobile);
//console.log(ui.item ? "Selected: " + ui.item.label : "Nothing selected, input was " + this.value);
}
});
@stop

@section('javascript')
<script type="text/javascript">

$(document).on("click", ".edit-modal", function () {
	var id = $(this).data('id');
	var name = $(this).data('name');
	var email = $(this).data('email');
	var mobile = $(this).data('mobileno');
	var url = "{{URL::route('contacts.index')}}";
	var url = url+'/'+id;

	$("#editContactModalForm").attr("action",url);
	$("#editContactModalFormName").attr("value",name);
	$("#editContactModalFormEmail").attr("value",email);
	$("#editContactModalFormMobile").attr("value",mobile);
});

$(document).on("click", ".confirm-remove", function () {
	var id = $(this).data('id');
	var url = "{{URL::route('contacts.index')}}";
	var url = url+'/'+id;
	$("#confirm-remove-form").attr("action",url);
});

$(document).on("click", "#confirm-set-default", function () {
	var id 	= $(this).data('id');
	$("#set-contact-id").attr("value",id);
});




$(document).on("click", ".edit-modal-client", function () {
	var cid 			= $(this).data('cid');
	var name 			= $(this).data('name');
	var reg_no			= $(this).data('regno');
	var office_no		= $(this).data('officeno');
	var fax_no			= $(this).data('faxno');
	var address 		= $(this).data('address');
	var country 		= $(this).data('country');
	var city 			= $(this).data('city');
	var postal_code		= $(this).data('postalcode');
	var notes			= $(this).data('notes');
	var url 			= "{{URL::route('clients.index')}}" + "/" + cid;

	console.log(address);

	$("#editClientModal #edit-modal-client").attr("action",url);
	$("#editClientModal #client_id").attr("value",cid);
	$("#editClientModal #name").attr("value",name);
	$("#editClientModal #reg_no").attr("value",reg_no);
	$("#editClientModal #office_no").attr("value",office_no);
	$("#editClientModal #fax_no").attr("value",fax_no);
	$("#editClientModal #address").val(address);
	$("#editClientModal #country").attr("value",country);
	$("#editClientModal #city").attr("value",city);
	$("#editClientModal #postal_code").attr("value",postal_code);
	$("#editClientModal #notes").val(notes);
});
</script>
@stop