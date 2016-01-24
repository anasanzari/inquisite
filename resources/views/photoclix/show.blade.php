@extends('dashboard')

@section('meta')

@endsection

@section('content')

<div class="articleitembg"></div>
<div class="row container article-item">
            <div class="right">
                <a href="{{url('dashboard/photoclix/'.$photo->id.'/edit')}}" class="waves-effect waves-light btn">Edit</a>
                <a href="{{url('dashboard/photoclix/'.$photo->id.'/delete')}}" class="waves-effect waves-light btn">Delete</a>
            </div>
            <h1 class="shadow">{{$photo->name}}</h2>
            <h3 class="shadow whitetext">{{$photo->user}}</h3>
            <div class="article" id="#article">
              <img class="responsive-img" src="{{ url('/').'/'.$photo->link }}">
            </div>
</div>
@stop
