@extends('app')

@section('content')

<div class="row container himy">
	  {!! Form::open(['url'=>'/auth/login']) !!}
		<div class="input-field col s12">
				<input type="email" name="email" value="{{ old('email') }}" class="lgtext">
				<label>E-Mail Address</label>
		</div>
		<div class="input-field col s12">
				<input type="password" name="password">
				<label>Password</label>
		</div>

		<button type="submit" class="btn btn-primary">Login</button>
		<a href="{{url('auth/register')}}" class="btn btn-primary">Register</a>
		</form>
	</div>

@endsection
