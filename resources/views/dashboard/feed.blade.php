@extends('dashboard')

@section('meta')

@endsection

@section('content')

<div class="adminbg"></div>
<div class="admin">
  <div class="row container">
    <h3>Feeds</h3>

    <ul class="collapsible" data-collapsible="accordion">
      @foreach($feeds as $feed)
        <li>
            <div class="collapsible-header">{{$feed->email}}</div>
            <div class="collapsible-body">
              <p>from <em>{{$feed->name}}</em></br></br>
                 {{$feed->feed}}</p>
            </div>
        </li>
        @endforeach
    </ul>

     @include('includes.pagination', ['paginator' => $feeds])

  </div>
</div>


@endsection


@section('script')
<script>

$('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrain_width: false,
    hover: false,
    gutter: 0,
    belowOrigin: false
  }
);

</script>
@endsection
