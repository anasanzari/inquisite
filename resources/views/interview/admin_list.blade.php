@extends('dashboard')

@section('meta')

@endsection

@section('content')
<div class="adminbg"></div>
<div class="admin">
<div class="row container">
  <h3>Interviews</h3>

  <div class="collection">
    @foreach($interviews as $interview)
      <a href="{{url('dashboard/interviews/'.$interview->id)}}" class="collection-item">
      {{$interview->person}}
      </a>
    @endforeach
  </div>

  <a class="btn" href="{{url('dashboard/interviews/create')}}">Create</a>


</div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
