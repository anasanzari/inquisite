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
	        <li><a href="{{url('articles')}}">Articles</a></li>
	        <li><a href="{{url('photoclix')}}">Photoclix</a></li>
	        <li><a href="{{url('interviews')}}">Interviews</a></li>
	        <li><a href="{{url('himy')}}">HIMY</a></li>
	        </ul>
	        <a href="{{url('/')}}" class="brand-logo"><img src="{{url('images/nav_logo.png')}}" style="width:30px">Inquisite</a>
	      <ul id="nav-mobile" class="right hide-on-small-only">
	        <li><a href="{{url('articles')}}">Articles</a></li>
	        <li><a href="{{url('photoclix')}}">Photoclix</a></li>
	        <li><a href="{{url('interviews')}}">Interviews</a></li>
	        <li><a href="{{url('himy')}}">HIMY</a></li>
	      </ul>
	    </div>
	  </nav>


		@yield('content')



		<!-- footer --------------------------->
		<footer class="page-footer"><div class="container"><div class="row"><div class="col l6 s12"><h5 class="white-text">ISTE NITC STUDENTS' CHAPTER</h5><a href="http://www.istenitc.org" class="btn">Visit our home page</a> </div>
		</div></div><div class="footer-copyright"><div class="container"> © 2016 ISTE NITC STUDENTS' CHAPTER</div></div></footer>

		@yield('script')

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-51743713-2', 'auto');
		  ga('send', 'pageview');

		</script>

</body>
</html>
