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
				<h3>Don't Have An Account? REGISTER here</h3>
			</div>

			<div id="login_down_caret">
				<i class="fa fa-angle-double-down"></i>
			</div>

			<div class="panel-body" id="login_panel_body">
				
				@include('errors.msg')

				<div class="">
					
					<form role="form" method="POST" action="{{ url('/signup') }}">

						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
							<div class="input-group">
								<input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}" placeholder="Company name" />
								<div class="input-group-addon"></div>
							</div>

								@if ($errors->has('company_name'))
								    <span class="help-block">
								        <strong>{{ $errors->first('company_name') }}</strong>
								    </span>
								@endif
						</div>

						<div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
							<div class="input-group">
								<input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ old('contact_person') }}" placeholder="Contact person" />
								<div class="input-group-addon"></div>
							</div>

							@if ($errors->has('contact_person'))
							    <span class="help-block">
							        <strong>{{ $errors->first('contact_person') }}</strong>
							    </span>
							@endif

						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<div class="input-group">
								<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Email" />
								<div class="input-group-addon"></div>
							</div>

							@if ($errors->has('email'))
							    <span class="help-block">
							        <strong>{{ $errors->first('email') }}</strong>
							    </span>
							@endif
						</div>

						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<div class="input-group">
								<input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" placeholder="Username" />
								<div class="input-group-addon"></div>
							</div>

							@if ($errors->has('username'))
							    <span class="help-block">
							        <strong>{{ $errors->first('username') }}</strong>
							    </span>
							@endif
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<div class="input-group">
								<input type="password" name="password" id="password" class="form-control" placeholder="Password" />
								<div class="input-group-addon"></div>
							</div>

							@if ($errors->has('password'))
							    <span class="help-block">
							        <strong>{{ $errors->first('password') }}</strong>
							    </span>
							@endif
						</div>

						<div align="center" id="forgot_password">
							<a href="#">By Registering you confirm that you agree with our conditions</a>
						</div>

						<div class="form-group">
							<input type="submit" name="" class="btn btn-block btn-primary" value="REGISTER" />
						</div>

					</form>
				
				</div>
			
			</div>

		</div>

	</div>

@endsection('content')
