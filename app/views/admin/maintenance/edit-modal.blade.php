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
						<label class="input"> <i class="icon-append fa fa-clock-o"></i>
							{{ Form::text('total_hours_purchased', '', ['id'=>'total_hours_purchased', 'placeholder'=>'Total Hours Purchased'])}}
							
						</label>
					</section>
				</fieldset>
				<footer>
					<button type="submit" class="btn btn-primary">
						Edit Total Hours Purchased
					</button>
				</footer>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>