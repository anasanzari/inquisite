@extends('dashboard')

@section('meta')

@endsection

@section('content')
<div class="adminbg"></div>
<div class="admin">
  <div class="row container">
    <h3>Create New</h3>

    @include('errors.errorlist',['err'=>$errors])

    {!! Form::open(['url' => url('dashboard/articles/create')]) !!}
      <div class="input-field col s12">
        <input name="name" type="text" class="validate">
        <label>Name</label>
      </div>
      <div class="input-field col s12">
        <input name="author" type="text" class="validate">
        <label>Author</label>
      </div>
      <div class="input-field col s12">
        <select name="month">
          <option value="" disabled selected>Select Month</option>
          @foreach($months as $key => $value)
            <option value="{{$key+1}}">{{$value}}</option>
          @endforeach
        </select>
      </div>

      <div class="input-field col s12">
        <input name="year" type="text" class="validate">
        <label>Year</label>
      </div>
      <div class="input-field col s12">
        <textarea name="content" class="materialize-textarea"></textarea>
        <label>Html Content</label>
      </div>
      {!! Form::submit('Create',['class' => 'btn']) !!}
    {!! form::close() !!}

  </div>
</div>

@endsection


@section('script')
<script>

  $(document).ready(function() {
    $('select').material_select();
  });

</script>
@endsection
