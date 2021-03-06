<div class="modal fade" id="addOnsitesupportModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Add Onsite Support
				</h4>
			</div>
			<div class="modal-body no-padding">
				{{ Form::open(['id'=>'add-modal-onsitesupport', 'class'=>'smart-form', 'method'=>'POST']) }}
					<fieldset>
						<section>
							{{ Form::hidden('maintenance_id', null, ['id'=>'maintenance_id'])}}
							@if ($errors->has('hours_spent'))	<label class="input state-error"> <i class="icon-append fa fa-clock-o"></i>
							@else 								<label class="input"> <i class="icon-append fa fa-clock-o"></i>
							@endif
								{{ Form::text('hours_spent', null, ['placeholder'=>'Hours Spent'])}}
							</label>
							@if ($errors->has('hours_spent')) <div class="note note-error">{{ $errors->first('hours_spent') }}</div> @endif
						</section>
						<section>
							@if ($errors->has('onsite_date'))	<label class="input state-error"> <i class="icon-append fa fa-calendar"></i>
							@else 								<label class="input"> <i class="icon-append fa fa-calendar"></i>
							@endif
								{{ Form::text('onsite_date', null, ['type'=>'tel', 'placeholder'=>'Onsite Date YYYY-MM-DD'])}}
							</label>
							@if ($errors->has('onsite_date')) <div class="note note-error">{{ $errors->first('onsite_date') }}</div> @endif
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