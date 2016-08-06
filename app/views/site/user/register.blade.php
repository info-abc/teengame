@extends('site.layout.default')

@section('title')
{{ $title='Register account' }}
@stop

@section('content')

<div class="box">
	<h3>Register an account</h3>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			@include('site.common.message')
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-xs-12">
		{{ Form::open(array('action' => 'AccountController@store', 'class' => 'form-horizontal')) }}
			<div class="form-group">
				<label for="username" class="col-sm-4 control-label label-text">Username (*):</label>
				<div class="col-sm-4">
					<input type="text" name="user_name" class="form-control" id="username" placeholder="Username" maxlength="255" required >
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-4 control-label label-text">Password (*):</label>
				<div class="col-sm-4">
					<input type="password" name="password" class="form-control" id="password" placeholder="password" maxlength="255" required >
				</div>
			</div>
			<div class="form-group">
				<label for="phone" class="col-sm-4 control-label label-text">Phone number (*):</label>
				<div class="col-sm-4">
					<input type="text" name="phone" class="form-control" id="phone" placeholder="phone" maxlength="255" required >
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-4 control-label label-text">Email (*):</label>
				<div class="col-sm-4">
					<input type="email" name="email" class="form-control" id="email" placeholder="email" maxlength="255" required >
				</div>
			</div>
			{{-- <div class="form-group">
				<label for="email" class="col-sm-4 control-label label-text">Policy:</label>
				<div class="col-sm-4">
					<textarea readonly="" class="form-control" name=""> --}}
					{{-- Config::get('policy.policy') --}}
					{{-- </textarea>
				</div>
			</div> --}}

			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<input type="checkbox" name="vehicle" id="vehicle" value="check" required> <a class="vehicle-text" href="{{ action('SiteFeedbackController@policy') }}">I agree to the site Terms & Rules</a>
					<br>

				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<input type="submit" class="btn btn-primary form-control btn-green" value="Register" onclick="checkAgree();" />
				</div>
			</div>

		{{ Form::close() }}
	</div>
	<div class="clearfix"></div>
</div>

@stop