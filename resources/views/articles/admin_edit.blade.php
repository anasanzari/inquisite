@extends('dashboard')

@section('meta')

@endsection

@section('content')


<div class="row container admin">
  <h3>Create New</h3>

  @include('errors.errorlist',['err'=>$errors])

  {!! Form::open(['url' => url('dashboard/articles/id/'.$article->id)]) !!}
    <div class="input-field">
      <input name="name" type="text" class="validate" value="{{$article->name}}">
      <label>Name</label>
    </div>
    <div class="input-field">
      <input name="author" type="text" class="validate" value="{{$article->author}}">
      <label>Author</label>
    </div>
    <label>Month</label>
    <div class="input-field">
      <select  class="browser-default"  name="month">
        @foreach($months as $key => $value)
          @if(($key+1)==$article->month->month)
            <option value="{{$key+1}}" selected>{{$value}}</option>
          @else
            <option value="{{$key+1}}">{{$value}}</option>
          @endif

        @endforeach
    </select>
  </div>

    <div class="input-field">
      <input name="year" type="text" class="validate" value="{{$article->year}}">
      <label>Year</label>
    </div>
    <div class="input-field">
      <textarea name="content" class="materialize-textarea" length="120">{{$article->content}}</textarea>
      <label>Html Content</label>
    </div>
    {!! Form::submit('Save',['class' => 'btn']) !!}
  {!! form::close() !!}

</div>


@endsection


@section('script')
<script>

</script>
@endsection
