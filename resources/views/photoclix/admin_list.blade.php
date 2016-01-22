@extends('dashboard')

@section('meta')

@endsection

@section('content')
<div class="adminbg"></div>
<div class="admin">
<div class="row container">
  <h3>Photos</h3>

  <div class="collection">
    @foreach($photos as $photo)
      <a href="{{url('dashboard/photoclix/'.$photo->id)}}" class="collection-item">
        {{$photo->name}} : {{$photo->user}}
      </a>
    @endforeach
  </div>

  <a class="btn" href="{{url('dashboard/photoclix/upload')}}">Create</a>


</div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
