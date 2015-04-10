<div class="modal fade" id="deleteContactModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Delete Contact Personnel
				</h4>
			</div>
			<div class="modal-body">
				Confirm?
			</div>
			{{ Form::open(array('id'=>'confirm-delete-form','class'=>'smart-form','method'=>'DELETE')) }}
			<footer>
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
				<button type="submit" class="btn btn-danger">
					Remove
				</button>
			</footer>
			{{Form::close()}}
		</div>
	</div>
</div>