@extends('dashboard')

@section('meta')

@endsection

@section('content')

<div class="adminbg"></div>
<div class="admin">
<div class="row container">
  <h3>Create New</h3>

  @include('errors.errorlist',['err'=>$errors])

  {!! Form::open(['url' => url('dashboard/articles/'.$article->id)]) !!}
    <div class="input-field col s12">
      <input name="name" type="text" class="validate" value="{{$article->name}}">
      <label>Name</label>
    </div>
    <div class="input-field col s12">
      <input name="author" type="text" class="validate" value="{{$article->author}}">
      <label>Author</label>
    </div>
    <div class="input-field col s12">
      <select name="month">
        <option value="" disabled selected>Select Month</option>
        @foreach($months as $key => $value)
          @if(($key+1)==$article->month->month)
            <option value="{{$key+1}}" selected>{{$value}}</option>
          @else
            <option value="{{$key+1}}">{{$value}}</option>
          @endif
        @endforeach
    </select>
  </div>

    <div class="input-field col s12">
      <input name="year" type="text" class="validate" value="{{$article->year}}">
      <label>Year</label>
    </div>
    <div class="input-field col s12">
      <textarea name="content" class="materialize-textarea">{{$article->content}}</textarea>
      <label>Html Content</label>
    </div>
    {!! Form::submit('Save',['class' => 'btn']) !!}
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
