@extends('app')

@section('meta')


@endsection

@section('content')

<div class="himbg"></div>
<div class="row container himy">
    <div class="transbar">
        <h1 class="shadow">How I met you!</h2>
        <p class="shadow">Whom did you first meet from NITC ? <br/>
                Do you have an interesting story about your meeting?
        </p>
        <div>
            <a href="{{url('himy/login')}}" class="btn-large waves-effect">Create Your Story!</a>
        </div>
    </div>

    <div>
        <h2 class="shadow" style="padding-left:25px">Recent Stories Created</h2>

        <ul class="collection" id="collection">

        </ul>
    </div>



</div>

@endsection


@section('script')
<script>

</script>
@endsection
