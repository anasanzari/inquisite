@extends('dashboard')

@section('meta')

@endsection

@section('content')

<div class="articleitembg"></div>
<div class="row container article-item">
            <div class="right">
                <a href="{{url('dashboard/articles/id/'.$article->id.'/edit')}}" class="waves-effect waves-light btn">Edit</a>
                <a href="{{url('dashboard/articles/id/'.$article->id.'/delete')}}" class="waves-effect waves-light btn">Delete</a>
            </div>
            <h1 class="shadow">{{$article->name}}</h2>
            <h3 class="shadow whitetext">{{$article->author}}</h3>
            <div class="article" id="#article">
                {!! $article->content !!}
            </div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
