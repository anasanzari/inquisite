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
      <a href="{{url('dashboard/articles/'.$article->id)}}" class="collection-item">
        {{$article->name}}
      </a>
    @endforeach
  </div>

</div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
