@extends('app')

@section('meta')
<meta property="og:title" content="interview with {{$interview->person}}" />
<meta property="og:site_name" content="inquisite.istenitc.org"/>
<meta property="og:url" content="{{url('interviews/'.$interview->id)}}"/>
<meta property="og:description" content="Read interesting interviews." />
<meta property="og:type" content="article" />
<meta property="fb:app_id" content="148666522131344" />
<meta property="og:image" content="{{url('images/inq.jpg')}}">
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
@endsection

@section('content')

  @include('includes.fb_init')
  <div class="articleitembg"></div>
  <div class="row container interviewitem">
      <div class="right">
          <a class="waves-effect waves-light btn-large" id="sharebtn">Share</a>
      </div>
      <h1 class="shadow">{{$interview->person}}</h1>
      <p class="introp">{{$interview->intro}}</p>
      <ul class="collection">
        @if($interview->content)
          @foreach($interview->content as $item)
            <li class="collection-item"><div class="box bubble-left">{{$item['q']}}</div></li>
            <li class="collection-item"><div class="box right bubble-right">{{$item['a']}}</div></li>
          @endforeach
        @endif

      </ul>
  </div>
@endsection


@section('script')
<script>

$("#sharebtn").click(function(){
   FB.ui({
     method: 'share',
     href: '{{url('interviews/'.$interview->id)}}'
     }, function(response){});
});

</script>
@endsection
