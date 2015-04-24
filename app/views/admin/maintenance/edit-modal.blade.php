<div class="modal fade" id="editMaintenanceModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Edit Total Hours Purchased
				</h4>
			</div>
			<div class="modal-body no-padding">
				{{ Form::open(['id'=>'edit-modal-maintenance', 'class'=>'smart-form', 'method'=>'PUT']) }}
				<fieldset>
					{{ Form::hidden('maintenance_id', '', ['id'=>'maintenance_id'])}}
					<section>
						<label for="total_hours_purchased" class="label">Total Hours Purchased</label>
						@if ($errors->has('total_hours_purchased'))	<label class="input state-error"> <i class="icon-append fa fa-clock-o"></i>
						@else 										<label class="input"> <i class="icon-append fa fa-clock-o"></i>
						@endif
							{{ Form::text('total_hours_purchased', '', ['id'=>'total_hours_purchased', 'placeholder'=>'Total Hours Purchased'])}}
						</label>
						@if ($errors->has('total_hours_purchased')) <div class="note note-error">{{ $errors->first('total_hours_purchased') }}</div> @endif
					</section>
				</fieldset>
				<footer>
					<button type="submit" class="btn btn-primary">
						Update
					</button>
				</footer>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>