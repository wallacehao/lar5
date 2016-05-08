@if(Session::has('flash-level'))
	<div class="{!! Session::get('flash-level')  !!}">
		{!! Session::get('flash_message') !!}
	</div>
	<br />
@endif