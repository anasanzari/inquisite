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

    <div class="list">
        <h3 class="shadow" style="padding-left:25px">Stories</h3>

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

        <div class="transwh center">
          @include('includes.pagination', ['paginator' => $stories])
        </div>

    </div>



</div>

@endsection


@section('script')
<script>

</script>
@endsection
