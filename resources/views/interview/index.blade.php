@extends('app')

@section('meta')

@endsection

@section('content')

<div class="interviewbg"></div>
<div class="row container interview">
    <h1 class="shadow transbar">Interviews</h1>
    <div class="collection">
        @foreach($interviews as $interview)
          <a href="{{url("interviews/".$interview->id)}}"" class="collection-item" >{{$interview->person}}</a>
        @endforeach
    </div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
