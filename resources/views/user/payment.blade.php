@extends('layouts.app')

@include('user.header')

@section('content')

<br />
<br />

<div class="col-md-2 col-md-offset-2 bg-danger" id="payment_main_wrapper">
	<div class="bg-info row" id="payment_wrapper">
		
		<div id="payment_step1">
			<span>1st</span>
		</div>
		<div id="payment_step2">
			<span>2nd</span>
		</div>
		<div id="payment_step3">
			<span>3rd</span>
		</div>
		<div id="payment_step4" align="center">
			<span>4th</span>
		</div>

	</div>
</div>

@endsection('content')