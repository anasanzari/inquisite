@extends('dashboard')

@section('meta')

@endsection

@section('content')
<div class="adminbg"></div>
<div class="admin">
<div class="row container">
  <h3>Edit Image Identifiers</h3>

  @include('errors.errorlist',['err'=>$errors])

  {!! Form::open(['url' => url('dashboard/photoclix/'.$photo->id.'/edit')]) !!}
    <div class="input-field col s12">
      <input name="name" type="text" class="validate" value="{{ $photo->name }}">
      <label>Image Caption</label>
    </div>
    <div class="input-field col s12">
      <input name="user" type="text" class="validate" value="{{ $photo->user }}">
      <label>Photographer</label>
    </div>

    <div class="input-field col s12">
      {!! Form::submit('Confirm',['class' => 'btn']) !!}
    </div>
  {!! form::close() !!}

</div>
</div>

@endsection


@section('script')
<script>


</script>
@endsection
