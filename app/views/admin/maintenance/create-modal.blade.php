<div class="modal fade" id="addMaintenanceModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Add Support to Client
				</h4>
			</div>
			<div class="modal-body no-padding">
				{{ Form::open(['url'=>URL::route('maintenance.store'), 'class'=>'smart-form', 'method'=>'POST']) }}
					<fieldset>
						<section>
							@if ($errors->has('client_id'))	<label class="select state-error">
							@else 							<label class="select">
							@endif
								<select name="client_id">
									<option value="" disabled="disabled" selected>Select Client</option>
								@foreach($clients as $client)
									<option value="{{$client->id}}">{{ $client->name }}</option>
								@endforeach
								</select> <i></i>
							</label>
							@if ($errors->has('client_id')) <div class="note note-error">{{ $errors->first('client_id') }}</div> @endif
						</section>
						<section>
							@if ($errors->has('client_id'))	<label class="input state-error"> <i class="icon-append fa fa-clock-o"></i>
							@else 							<label class="input"> <i class="icon-append fa fa-clock-o"></i>
							@endif
								{{ Form::text('hours_purchased', null, ['placeholder'=>'Hours Purchased']) }}
							</label>
							@if ($errors->has('hours_purchased')) <div class="note note-error">{{ $errors->first('hours_purchased') }}</div> @endif
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