@extends('app')

@section('meta')

<meta property="og:title" content="" />
<meta property="og:site_name" content="inquisite.istenitc.org"/>
<meta property="og:url" content="http://inquisite.istenitc.org/photoclix"/>
<meta property="og:description" content="Photos from inquisite." />
<meta property="og:type" content="article" />
<meta property="fb:app_id" content="148666522131344" />
<meta property="og:image" content="http://inquisite.istenitc.org/images/aug.jpg">


@endsection

@section('content')
<div class="photoclixbg"></div>
 <div class="photoclix">
     <div class="row">
      @foreach($photos as $photo)
          <div class="col s6 m3 l3">
            <img class="responsive-img  thebox" src="{{url($photo->link)}}">
            <p style="color:black"><b>{{ $photo->name }}</b>
               by {{ $photo->user }}</p>
         </div>
      @endforeach
     </div>
 </div>

 @include('includes.pagination', ['paginator' => $photos])


@endsection


@section('script')
<script>
$('.thebox').materialbox();
</script>
@endsection
