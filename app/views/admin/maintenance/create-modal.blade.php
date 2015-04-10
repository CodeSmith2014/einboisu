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
							<label class="select">
								<select name="client_id">
									<option value="" disabled="disabled" selected>Select Client</option>
								@foreach($clients as $client)
									<option value="{{$client->id}}">{{ $client->name }}</option>
								@endforeach
								</select> <i></i>
							</label>
						</section>
						<section>
							<label class="input"> <i class="icon-append fa fa-clock-o"></i>
								{{ Form::text('hours_purchased', null, ['placeholder'=>'Hours Purchased']) }}
							</label>
						</section>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary">
							Add Support to Client
						</button>
					</footer>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>