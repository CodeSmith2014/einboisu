@extends('admin.master')

@section('title')
@parent
- Users
@stop

@section('page_title_icon')
user
@stop

@section('breadcrumb')
@parent
<li>Users</li>
@stop

@section('page_title')
List Users
@stop

@section('page_title_right')
<a data-toggle="modal" href="#addUserModal" class="btn btn-primary btn-lg pull-right header-btn hidden-mobile"><i class="fa fa-plus fa-lg"></i> Add User</a>
@stop

@section('modals')
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Add Administrator Uers
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form id="smart-form-register" class="smart-form" action="{{URL::route('users.store')}}" method="post">
					@if($errors->count() > 0)
					<div class="alert alert-block alert-danger">
						<ul style="list-style:none;">
							@foreach($errors->all() as $message)
							<li>{{$message}}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<fieldset>

						<section>
							<label class="input"> <i class="icon-append fa fa-user"></i>
								<input type="text" name="name" placeholder="Name">
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" placeholder="Email address">
								<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-lock"></i>
								<input type="password" name="password" placeholder="Password" id="password">
								<b class="tooltip tooltip-bottom-right">Don't forget your password</b>
							</label>
						</section>

					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary">
							Add User
						</button>
					</footer>
				</form>					
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Delete Administrator User
				</h4>
			</div>
			<div class="modal-body">
				Confirm?
			</div>
			{{ Form::open(array('id'=>'confirm-delete-form','class'=>'smart-form','method'=>'DELETE')) }}
			<footer>

				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
				<button type="submit" class="btn btn-danger">
					Delete
				</button>
			</footer>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop

@section('content')
<section >
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>
								<a href="{{URL::route('users.edit',$user->id)}}" title="Modify">
									<button class="btn btn-xs btn-default">
										<i class="fa fa-pencil"></i>
									</button>
								</a>
								<a data-toggle="modal" class="confirm-delete" data-id="{{$user->id}}" href="#deleteUserModal" title="Delete" >
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
		</article>
	</div>
</setction>
@stop

@section('javascript')

<script type="text/javascript">
@if($errors->count() > 0)
$('#addUserModal').modal('show');
@endif
$(document).on("click", ".confirm-delete", function () {
	var id = $(this).data('id');
	var url = "{{URL::route('users.index')}}";
	var url = url+'/'+id;
	$("#confirm-delete-form").attr("action",url);
});
</script>
@stop