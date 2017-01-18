@if(Session::has('error'))
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
@endif

@if(Session::has('message'))
	<div class="alert alert-success">
		<strong> {{ Session::get('message') }} </strong>
	</div>
@endif