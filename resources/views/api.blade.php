@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form class="demographics" method="get">
				<label>City: </label><input type="text" name="city"/>
				<label>State: </label><select name="state">
				@foreach ($states as $abbrev=>$state)
        			<option value="{{$abbrev}}">
        				{{$state}}
        			</option>
    			@endforeach
    			</select>
				<input type='submit' name='submit'/>
			</form>
			<div id="results"></div>
		</div>
	</div>
</div>
@endsection
