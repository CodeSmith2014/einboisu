@extends('admin.master')

@section('title')
@parent
- Users
@stop

@section('page_title_icon')
pencil
@stop

@section('breadcrumb')
@parent
<li>Edit Users</li>
@stop

@section('page_title')
Edit {{$user->name}}
@stop

@section('content')
<section >
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			{{ Form::open(array('class'=>'smart-form','method'=>'PUT', 'url'=> URL::route("users.update",array($user->id)))) }}
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
						<input type="text" name="name" placeholder="Name" value="{{$user->name}}">
					</label>
				</section>

				<section>
					<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
						<input type="email" name="email" placeholder="Email address" value="{{$user->email}}">
					</label>
				</section>

			</fieldset>
			<footer>
				<button type="submit" class="btn btn-default">
					<a href="{{URL::route('users.index')}}">Back</a>
				</button>
				<button type="submit" class="btn btn-primary">
					Edit User
				</button>
			</footer>
			{{Form::close()}}
		</article>
	</div>
</setction>
@stop
