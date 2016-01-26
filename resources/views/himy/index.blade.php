@extends('app')

@section('optionallinks')
@if($loggedin)
  <li><a href="{{url('himy/fblogout')}}">Logout</a></li>
@endif
@endsection

@section('meta')


@endsection

@section('content')

<div class="himbg"></div>
<div class="row container himy">
    <div class="transbar">
        <h1 class="shadow">How I met you!</h2>
        <p class="shadow">Whom did you first meet from NITC ? <br/>
                Do you have an interesting story about your meeting?
        </p>
        <div>
            <a href="{{url('himy/login')}}" class="btn-large waves-effect">Create Your Story!</a>
        </div>
    </div>

    <div class="list">
        <h2 class="shadow" style="padding-left:25px">Recent Stories Created</h2>

        <ul class="collection" id="collection">
          @foreach($stories as $story)
          <li class="collection-item">
            <img src="http://graph.facebook.com/{{$story->user->fbid}}/picture?height=75&width=75" alt="" class="av-img circle left">
            @if($story->sticker->id!=1)
              <img class="right" src="{{url($story->sticker->url)}}">
            @endif
            <h4>{{$story->user->name}} met {{$story->person}}</h4>
            <a class="btn waves-effect" href="{{url('himy/story/'.$story->id)}}" >View</a>
          </li>
          @endforeach
        </ul>

        <a href="{{url('himy/stories')}}" class="btn-large waves-effect">See All Stories</a>

    </div>



</div>

@endsection


@section('script')
<script>

</script>
@endsection
