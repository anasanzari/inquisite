@extends('app')

@section('meta')

<meta property="og:title" content="{{$story->user->name}} met {{$story->person}}" />
<meta property="og:site_name" content="inquisite.istenitc.org"/>
<meta property="og:url" content="{{url('himy/story/'.$story->id)}}"/>
<meta property="og:description" content="Read how people met people." />
<meta property="og:type" content="article" />
<meta property="fb:app_id" content="148666522131344" />
<meta property="og:image" content="{{url('himy/story/img/'.$story->id)}}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
@endsection

@section('content')
 @include('includes.fb_init')

<div class="himbg"></div>
<div class="row container himy">
  <div class="main">

    <div class="transbar-white story center">
      <img src="http://graph.facebook.com/<?=$story['userid']?>/picture?height=75&width=75" alt="" class="av-img circle">
        @if($story->stickerid!=1)
          <img class="av-img circle" src="{{url($story->sticker->url)}}">
        @endif

        <h4>{{$story->user->name}} met {{$story->person}}</h4>
         <p>
             {!!nl2br($story->content)!!}
         </p>

    </div>

    <div class="transbar center"  style="padding-left: 5px">
      <div style="padding:25px">
          <a href="{{url('himy/create')}}" class="btn-large waves-effect">
            Create story
          </a>
          <a class="waves-effect waves-light btn-large" id="sharebtn">Share Story</a>
      </div>
    </div>

  </div>
</div>

@endsection


@section('script')
<script>
$("#sharebtn").click(function(){
   FB.ui({
     method: 'share',
     href: '{{url('himy/story/'.$story->id)}}'
     }, function(response){});
});
</script>
@endsection
