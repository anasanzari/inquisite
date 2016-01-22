@extends('dashboard')

@section('meta')

@endsection

@section('content')

<div class="articleitembg"></div>
<div class="row container article-item">
            <div class="right">
                <a href="{{url('dashboard/himy/'.$story->id.'/delete')}}" class="waves-effect waves-light btn">Delete</a>
            </div>
            <h1 class="shadow">{{ $story->person }}</h2>
            <h3 class="shadow whitetext">{{ $story->place }}</h3>
            <div class="article" id="#article">
              {{ $story->content }}
            </div>
</div>
@stop
