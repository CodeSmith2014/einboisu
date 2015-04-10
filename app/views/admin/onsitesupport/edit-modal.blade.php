<div class="modal fade" id="editOnsitesupportModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Edit Onsite Support Entry
				</h4>
			</div>
			<div class="modal-body no-padding">
				{{ Form::open(['id'=>'edit-modal-onsitesupport', 'class'=>'smart-form', 'method'=>'PUT']) }}
					<fieldset>
						<section>
							{{ Form::hidden('maintenance_id', null, ['id'=>'maintenance_id'])}}
							<label for="hours_spent" class="label">Hours Spent</label>
							<label class="input"> <i class="icon-append fa fa-clock-o"></i>
								{{ Form::text('hours_spent', null, ['id'=>'hours_spent', 'placeholder'=>'Hours Spent'])}}
							</label>
						</section>
						<section>
							<label for="onsite_date" class="label">Onsite Date</label>
							<label class="input"> <i class="icon-append fa fa-calendar"></i>
								{{ Form::text('onsite_date', null, ['id'=>'onsite_date', 'type'=>'tel', 'placeholder'=>'Onsite Date YYYY-MM-DD'])}}
							</label>
						</section>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary">
							Edit Onsite Support Entry
						</button>
					</footer>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>