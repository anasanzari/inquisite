<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@yield('meta')

	<title>Inquisite</title>
	{!! Html::style('css/styles.css') !!}
	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/materialize.min.js') !!}

<body>
	<nav>
	    <div class="nav-wrapper">
	        <a class='dropdown-button material-icons hide-on-med-and-up nav-icon' href='#' data-activates='dropdown1' ></a>
	        <ul id='dropdown1' class='dropdown-content'>
	        <li><a href="{{url('dashboard/articles')}}">Articles</a></li>
	        <li><a href="{{url('dashboard/photoclix')}}">Photoclix</a></li>
	        <li><a href="{{url('dashboard/interviews')}}">Interviews</a></li>
	        <li><a href="{{url('dashboard/himy')}}">HIMY</a></li>
	        </ul>
	        <a href="{{url('/')}}" class="brand-logo">
            <img src="{{url('images/nav_logo.png')}}" style="width:30px">Inquisite Admin
          </a>
	      <ul id="nav-mobile" class="right hide-on-small-only">
	        <li><a href="{{url('dashboard/articles')}}">Articles</a></li>
	        <li><a href="{{url('dashboard/photoclix')}}">Photoclix</a></li>
	        <li><a href="{{url('dashboard/interviews')}}">Interviews</a></li>
	        <li><a href="{{url('dashboard/himy')}}">HIMY</a></li>
          <li><a href="{{url('auth/logout')}}">Logout</a></li>
	      </ul>
	    </div>
	  </nav>


		@yield('content')



		@yield('script')



</body>
</html>
