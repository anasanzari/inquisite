@extends('dashboard')

@section('meta')

@endsection

@section('content')

<div class="row container admin">
  <h3>Upload New Image</h3>

  @include('errors.errorlist',['err'=>$errors])

  {!! Form::open(['url' => url('dashboard/photoclix/upload'),'files' => 'true']) !!}
    <div class="input-field">
      <input name="caption" type="text" class="validate">
      <label>Image Caption</label>
    </div>
    <div class="input-field">
      <input name="user" type="text" class="validate">
      <label>Photographer</label>
    </div>

    <div class="file-field input-field">
          <div class="btn">
            <span>Choose Image</span>
            <input name="photo" type="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>

    {!! Form::submit('Create',['class' => 'btn']) !!}
  {!! form::close() !!}

</div>

@endsection


@section('script')
<script>


</script>
@endsection
