@extends('dashboard')

@section('meta')

@endsection

@section('content')

<div class="row container admin">
  <h3>Create New</h3>

  @include('errors.errorlist',['err'=>$errors])

  {!! Form::open(['url' => url('dashboard/articles/create')]) !!}
    <div class="input-field">
      <input name="name" type="text" class="validate">
      <label>Name</label>
    </div>
    <div class="input-field">
      <input name="author" type="text" class="validate">
      <label>Author</label>
    </div>

      <label>Month</label>
      <select  class="browser-default"  name="month">
        @foreach($months as $key => $value)
          <option value="{{$key+1}}">{{$value}}</option>
        @endforeach
      </select>

    <div class="input-field">
      <input name="year" type="text" class="validate">
      <label>Year</label>
    </div>
    <div class="input-field">
      <textarea name="content" class="materialize-textarea" length="120"></textarea>
      <label>Html Content</label>
    </div>
    {!! Form::submit('Create',['class' => 'btn']) !!}
  {!! form::close() !!}

</div>

@endsection


@section('script')
<script>


</script>
@endsection
