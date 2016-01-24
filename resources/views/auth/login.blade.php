@extends('app')

@section('content')

<div class="adminbg"></div>
<div class="admin">
	<div class="row container">
		  {!! Form::open(['url'=>'/auth/login']) !!}
			<div class="input-field col s12">
					<input type="email" name="email" value="{{ old('email') }}" class="lgtext">
					<label>E-Mail Address</label>
			</div>
			<div class="input-field col s12">
					<input type="password" name="password">
					<label>Password</label>
			</div>
			<div class="input-field col s12">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
			</form>
	</div>
</div>
@endsection
