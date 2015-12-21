@extends('app')

@section('content')

<div class="mainheader">

 <h1>August is here!</h1>
 <a class="btn" href="./articles">Read August Edition</a>
</div>

<div class="row writer">
 <div class="col s12 m6">
		 <h2>Are you a writer?</h2>
		 <h4>We provide a platform to show your writing skills.</h4>
 </div>
 <div class="col s12 m6">
		 <h4>Send your articles.</h4>

		 <ul class="collapsible popout" data-collapsible="accordion">
				 <li>
						 <div class="collapsible-header"><i class="icon icon-email"></i>Mail Us</div>
						 <div class="collapsible-body"><p>Send your articles to istenitcmail@gmail.com</p></div>
				 </li>
				 <li>
						 <div class="collapsible-header"><i class="icon icon-contact"></i>Contact Us</div>
						 <div class="collapsible-body"><p>You can contact us at +91 9***958875</p></div>
				 </li>
				 <li>
						 <div class="collapsible-header"><i class="icon icon-info"></i>Info</div>
						 <div class="collapsible-body"><p>Send us scientific articles that are interesting and new.</p></div>
				 </li>
		 </ul>
 </div>
</div>

<div class="row writer">
 <div class="col s12 m6">
		 <h2>Write to us.</h2>
		 <h4>We would like to hear what you have to tell about us!</h4>
 </div>
 <div class="col s12 m6">
		 <form id="feedform">
				 <div class="row" style="padding-top: 20px;text-align: center">
						 <div class="input-field col s12">
								<input type="text" name="name" class="validate">
								<label>Name</label>
						 </div>
						<div class="input-field col s12">
								<input type="email" name="email" class="validate">
								<label>Email</label>
						 </div>
						<div class="input-field col s12">
								<textarea id="textarea1" name="feed" class="materialize-textarea"></textarea>
								<label>Write your feedbacks..</label>
						</div>

						 <button class="btn">Send</button>

				 </div>
		 </form>
 </div>
</div>

@endsection


@section('script')
<script>

	$('.collapsible').collapsible({
		accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
	});

 $('.dropdown-button').dropdown({
		 inDuration: 300,
		 outDuration: 225,
		 constrain_width: false, // Does not change width of dropdown to that of the activator
		 hover: false, // Activate on hover
		 gutter: 0, // Spacing from edge
		 belowOrigin: false // Displays dropdown below the button
	 }
 );

 $('#feedform').submit(function (){
	 Materialize.toast('Sending feed..',1000);
	 var data =  $(this).serialize();
	 $.post("./feed.php",data,function(res){
			 var val = JSON.parse(res);
			 if(val.status == "success"){
						Materialize.toast('Your feed is recieved.', 3000)
			 }else{
						Materialize.toast('Sorry.Something went wrong!', 1000)
			 }
	 })
	 return false;
 });


</script>
@endsection
