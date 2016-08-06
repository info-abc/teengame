@extends('site.layout.default')

@section('title')
{{ $title='Login account' }}
@stop

@section('content')

<div class="box">
	<h3>Login account</h3>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			@include('site.common.message')
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-xs-12">
		{{ Form::open(array('action' => 'SiteController@doLogin', 'class' => 'form-horizontal')) }}
			<div class="form-group">
				<label for="username" class="col-sm-4 control-label label-text">Username:</label>
				<div class="col-sm-4">
					<input type="text" name="user_name" class="form-control" id="username" placeholder="Username" maxlength="255" required >
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-4 control-label label-text">Password:</label>
				<div class="col-sm-4">
					<input type="password" name="password" class="form-control" id="password" placeholder="password" maxlength="255" required >
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<input type="submit" class="btn btn-primary form-control btn-green" value="Login" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<div class="row">
						<div class="col-sm-6">
							<a href="{{  action('LoginFacebookController@loginfb') }}" id="register" class="btn btn-primary login-facebook"><i class="fa fa-facebook"></i> Login Facebook</a>
						</div>
						<div class="col-sm-6">
							<a href="{{ action('GoogleController@logingoogle') }}" class="btn btn-danger login-google"><i class="fa fa-google"></i> Login Google</a>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="{{ action('PasswordController@index') }}">Forgot Password?</a>
				</div>
			</div>
		{{ Form::close() }}
	</div>
	<div class="clearfix"></div>
</div>

@stop