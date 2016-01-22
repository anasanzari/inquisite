@extends('dashboard')

@section('meta')

@endsection

@section('content')
<div class="adminbg"></div>
  <div class="admin">
  <div class="row container interviewitem">
    <div class="right">
        <a href="{{url('dashboard/interviews/'.$interview->id.'/edit')}}" class="waves-effect waves-light btn">Edit</a>
        <a href="{{url('dashboard/interviews/'.$interview->id.'/delete')}}" class="waves-effect waves-light btn">Delete</a>
    </div>
      <h1 class="shadow">{{$interview->person}}</h1>
      <ul class="collection">
        @if($interview->content)
          @foreach($interview->content as $item)
            <li class="collection-item"><div class="box bubble-left">{{$item['q']}}</div></li>
            <li class="collection-item"><div class="box right bubble-right">{{$item['a']}}</div></li>
          @endforeach
        @endif

      </ul>
  </div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
