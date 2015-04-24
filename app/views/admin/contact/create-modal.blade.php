<div class="modal fade" id="addContactModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Add Contact Personnel
				</h4>
			</div>
			<div class="modal-body no-padding">
				{{ Form::open(['id'=>'add-modal-contact', 'class'=>'smart-form', 'method'=>'POST']) }}
					<fieldset>
						<section>
							{{ Form::hidden('client_id', null, ['id'=>'client_id'])}}
							@if ($errors->has('name'))		<label class="input state-error"> <i class="icon-append fa fa-user"></i>
							@else 							<label class="input"> <i class="icon-append fa fa-user"></i>
							@endif
								{{ Form::text('name', null, ['placeholder'=>'Name'])}}
							</label>
							@if ($errors->has('name')) <div class="note note-error">{{ $errors->first('name') }}</div> @endif
						</section>
						<section>
							@if ($errors->has('email'))		<label class="input state-error"> <i class="icon-append fa fa-envelope-o"></i>
							@else 							<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
							@endif
								{{ Form::email('email', null, ['placeholder'=>'Email'])}}
							</label>
							@if ($errors->has('email')) <div class="note note-error">{{ $errors->first('email') }}</div> @endif
						</section>
						<section>
							@if ($errors->has('mobile_no'))	<label class="input state-error"> <i class="icon-append fa fa-phone"></i>
							@else 							<label class="input"> <i class="icon-append fa fa-phone"></i>
							@endif
								{{ Form::text('mobile_no', null, ['placeholder'=>'Mobile Number']) }}
							</label>
							@if ($errors->has('mobile_no')) <div class="note note-error">{{ $errors->first('mobile_no') }}</div> @endif
						</section>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary">
							Add
						</button>
					</footer>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
