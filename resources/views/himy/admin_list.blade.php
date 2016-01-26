@extends('dashboard')

@section('meta')

@endsection

@section('content')
<div class="adminbg"></div>
<div class="admin">
<div class="row container">
  <h3>Stories</h3>

  <div class="collection">
    @foreach($story as $story)
      <a href="{{url('dashboard/himy/'.$story->id)}}" class="collection-item">
        {{ $story->user()->first()->name }}
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
