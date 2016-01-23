@extends('app')

@section('meta')


@endsection

@section('content')

<div class="himbg"></div>
<div class="row container himy">
  <div class="main">
      <div class="transbar center"  style="padding-left: 5px">

          <h1 class="shadow">How I met you!</h2>
              <p class="shadow">Who did you first meet from NITC ? <br/>
                  Do you have an interesting story about your meeting? <br/>
                  Share your story of how you met people!
              </p>
              <div style="padding:25px">
                  <a href="{{url('himy/fblogin')}}" id="login" class="btn-large waves-effect">Login with Facebook</a>
              </div>
      </div>
  </div>
</div>

@endsection


@section('script')
<script>

</script>
@endsection
