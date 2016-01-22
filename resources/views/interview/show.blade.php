@extends('app')

@section('meta')
<meta property="og:title" content="interview with {{$interview->person}}" />
<meta property="og:site_name" content="inquisite.istenitc.org"/>
<meta property="og:url" content="http://inquisite.istenitc.org/interview/"/>
<meta property="og:description" content="Read interesting interviews." />
<meta property="og:type" content="article" />
<meta property="fb:app_id" content="148666522131344" />
<meta property="og:image" content="http://inquisite.istenitc.org/images/aug.jpg">
@endsection

@section('content')

  @include('includes.fb_init')
  <div class="articleitembg"></div>
  <div class="row container interviewitem">
      <div class="right">
          <a class="waves-effect waves-light btn-large" id="sharebtn">Share</a>
      </div>
      <h1 class="shadow">{{$interview->person}}</h1>
      <ul class="collection">
        
        @foreach($all as $item)
          <li class="collection-item"><div class="box bubble-left">{{$item['ques']}}</div></li>
          <li class="collection-item"><div class="box right bubble-right">{{$item['ans']}}</div></li>
        @endforeach
      </ul>
  </div>
@endsection


@section('script')
<script>

</script>
@endsection
