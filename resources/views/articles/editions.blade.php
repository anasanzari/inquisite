@extends('app')

@section('content')


<div class="articlesbg"></div>
<div class="row container articles">
    <h1 class="shadow transbar">Editions</h1>

    <div class="row">
      @foreach ($editions as $e)
        <div class="col s12 m6">
          <div class="article-card card z-depth-2 hoverable">
            <div class="card-content">
              <span class="title">{{$e->year}} {{$e->month->format('F')}}</span>
              <span class="sub-title"></span>
              <a href="{{url('editions/'.$e->year.'/'.$e->month->month)}}" class="waves-effect waves-light btn">Read</a>
            </div>
          </div>
        </div>
     @endforeach
    </div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
