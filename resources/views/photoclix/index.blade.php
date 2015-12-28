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

 <div class="photoclix">
     <div class="row">
      @foreach($photos as $photo)
          <div class="col s6 m3 l3">
           <img class="responsive-img  thebox" src="{{url($photo->link)}}">
         </div>
      @endforeach
     </div>
 </div>

@endsection


@section('script')
<script>
$('.thebox').materialbox();
</script>
@endsection
