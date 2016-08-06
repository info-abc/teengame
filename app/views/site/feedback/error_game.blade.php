@extends('site.layout.default')

@section('title')
{{ $title='Feedback bugs game' }}
@stop

@section('content')


<div class="box">
	<h3>Feedback bugs game</h3>
	@if ($message != '')
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<div class="alert alert-success">
		        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		        <strong><center>{{ $message }}</center></strong>
		    </div>
		</div>
	</div>
	<?php $url = CommonGame::getUrlGame($input_errorGame); ?>
	<script>setTimeout(function(){location.href = '<?php echo $url ?>';}, 3000);</script>
	@endif
	<div class="clearfix"></div>
	<div class="col-xs-12">
	{{ Form::open(array('action' => array('SiteFeedbackController@createErrorGame'), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
		{{ Form::hidden('gameId', $input_errorGame->id) }}
		<div class="form-group">
			<label for="username" class="col-sm-4 control-label label-text">Game name:</label>
			<div class="col-sm-4">
				{{ $input_errorGame->name }}
			</div>
		</div>

		<div class="form-group">
			<label for="username" class="col-sm-4 control-label label-text">Content:</label>
			<div class="col-sm-6">
				<textarea class="form-control" name="description" rows="5" placeholder="Content" id="description" require></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-4">
				<input type="submit" class="btn btn-primary btn-green" value="Send" /> &nbsp
				<input type="button"  class="btn btn-primary btn-green" value="Reset" onclick="myFunctionResertText()" />

			</div>
		@include('site.feedback.common')

		</div>

	{{ Form::close() }}
	</div>
	<div class="clearfix"></div>
</div>

@stop