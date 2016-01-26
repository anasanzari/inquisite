@extends('dashboard')

@section('meta')

@endsection

@section('content')
<div class="adminbg"></div>
<div class="admin">
<div class="row container">


  <h3>Users</h3>
<div class="list">
  <ul class="collection" id="collection">
    @foreach($users as $user)
    <li class="collection-item" style="padding-bottom:20px">
      <img src="http://graph.facebook.com/{{$user->fbid}}/picture?height=40&width=40" alt="" class="av-img circle left">
      {{$user->fbid}} :: {{$user->name}}
      </li>
      @endforeach
    </ul>
  </div>





</div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
