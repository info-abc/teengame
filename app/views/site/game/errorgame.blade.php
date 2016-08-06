<textarea class="form-control" name="description" rows="3" placeholder="bugs game" id="description" required></textarea>
<br />
<input type="submit" class="btn btn-primary btn-green" value="Send" onclick="sendErrorGame()" />
<input type="reset"  class="btn btn-default" value="Reset" />

<div id="modal-senderror-alert" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Alert</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">Feedback success!</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-green" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	function sendErrorGame()
	{
		desc = $('#description').val();
		if(!desc) {
			alert('bugs game content is required!');
			exit();
		}
		$.ajax({
			type:'post',
			url: '{{ url("/send-error-game") }}',
			data: {
				'id': {{ $id }},
				'description': desc
			},
			success: function(data){
				if(data == 1){
					$('#description').val('');
					$('#modal-senderror-alert').modal();
				} else {
					alert('Error!');
				}
				return false;
			},
		});
	}
</script>