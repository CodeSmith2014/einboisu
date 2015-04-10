<div class="modal fade" id="deleteMaintenanceModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Confirm Delete Maintenance Support to Client
				</h4>
			</div>
			<div class="modal-body">
				This will also delete all onsite support to the client.</br>
				Are you sure you want to proceed?
			</div>
			<div class="modal-footer">
				{{ Form::open(['id'=>'delete-modal-maintenance','method'=>'DELETE']) }}
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
				<button type="submit" class="btn btn-labeled btn-danger">
					<span class="btn-label">
						<i class="glyphicon glyphicon-trash"></i>
					</span>Delete
				</button>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>