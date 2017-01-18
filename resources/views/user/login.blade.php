@extends('layouts.app')

@section('content')
	
	<br/>
	<br/>

	<div class="col-md-4 col-md-offset-4">
		
		<div class="bg-danger" id="login_img_wrapper">
			<img src="{{ URL::to('public/img/dashpayroll.png') }}" class="center-block">
		</div>

		<div class="panel panel-default" id="login_panel_wrapper">
			
			<div class="panel-heading bg-danger" id="login_header">
				
				<h3>You Have An Account? LOGIN here</h3>
			
			</div>

			<div id="login_down_caret">
				<i class="fa fa-angle-double-down"></i>
			</div>

			<div class="panel-body" id="login_panel_body">
				
				<div class="">
					
					<form role="form" method="POST" action="{{ url('/login') }}">

						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<div class="input-group">
								<input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" placeholder="Username" />
								<div class="input-group-addon"></div>

								@if ($errors->has('username'))
								    <span class="help-block">
								        <strong>{{ $errors->first('username') }}</strong>
								    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<div class="input-group">
								<input type="password" name="password" id="password" class="form-control" placeholder="Password" />
								<div class="input-group-addon"></div>

								@if ($errors->has('password'))
								    <span class="help-block">
								        <strong>{{ $errors->first('password') }}</strong>
								    </span>
								@endif
							</div>
						</div>

						<div align="center" id="forgot_password">
							<a href="#">Forgot password?</a>
						</div>

						<div class="form-group">
							<input type="submit" name="" class="btn btn-block btn-primary" value="LOGIN" />
						</div>

						<div align="center" id="not_a_member">
							<a href="{{ url('/register') }}">Not a member? Sign up now</a>
						</div>

					</form>
				
				</div>
			
			</div>

		</div>

	</div>

@endsection('content')
