@extends('dashboard')

@section('meta')

@endsection

@section('content')
<div class="adminbg"></div>
<div class="admin">
<div class="row container">
  <h3>Articles</h3>

  <div class="collection">
    @foreach($articles as $article)
      <a href="{{url('dashboard/articles/'.$article->year.'/'.$article->month->format('m'))}}" class="collection-item">
        {{$article->year}} {{$article->month->format('F')}}
      </a>
    @endforeach
  </div>

  <a class="btn" href="{{url('dashboard/articles/create')}}">Create</a>


</div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
