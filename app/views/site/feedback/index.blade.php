@extends('site.layout.default')

@section('title')
{{ $title='Feedback' }}
@stop

@section('content')

<div class="box">
	<h3>Feedback</h3>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			@include('site.common.message')
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-xs-12">
	{{ Form::open(array('action' => 'SiteFeedbackController@store', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			<label for="username" class="col-sm-4 control-label label-text">Fullname:</label>
			<div class="col-sm-4">
				<input type="text" name="name" class="form-control" id="name" placeholder="Fullname" maxlength="255" required >
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-4 control-label label-text">Email:</label>
			<div class="col-sm-4">
				<input type="email" name="email" class="form-control" id="email" placeholder="Email" maxlength="255" required >
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-4 control-label label-text">Title:</label>
			<div class="col-sm-4">
				<input type="text" name="title" class="form-control" id="title" placeholder="Title" maxlength="255" required >
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-4 control-label label-text">Content:</label>
			<div class="col-sm-6">
				<textarea class="form-control" name="description" rows="5" placeholder="Content Feedback" id="description" require></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-4">
				<input type="submit" class="btn btn-primary button1" value="Send" /> &nbsp
				<input type="button"  class="btn btn-primary button1" value="Reset" onclick="myFunctionResertText()" />

			</div>
			@include('site.feedback.common')

		</div>

	{{ Form::close() }}
	</div>
	<div class="clearfix"></div>
</div>

@stop