<div class="modal fade" id="addContactModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Add Contact to Client
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form id="smart-form-register" class="smart-form" action="{{URL::route('contacts.store')}}" method="post">
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
							<label class="input"> <i class="icon-append fa fa-user"></i>
								{{ Form::text('name', null, ['placeholder'=>'Name']) }}
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
								{{ Form::text('email', null, ['placeholder'=>'Email']) }}
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-phone"></i>
								{{ Form::text('mobile_no', null, ['placeholder'=>'Mobile Number']) }}
							</label>
						</section>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary">
							Add Contact to Client
						</button>
					</footer>
				</form>
			</div>
		</div>
	</div>
</div>
