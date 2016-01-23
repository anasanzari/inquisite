@extends('app')

@section('meta')


@endsection

@section('content')
<div class="himbg"></div>
<div class="row container himy">
  <div class="storyform">

        <div class="center">
            <h2>Hello, <span id="name">{{$user->name}}</span></h2>
            <img id="profimg" src="http://graph.facebook.com/{{$user->fbid}}/picture?width=75&height=75" alt="" class="circle">
        </div>
        {!! Form::open(['url'=>'himy/create','id'=>'createstory']) !!}
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="creater" value="{{$user->name}}" class="validate lgtext" disabled>
                <label>Name</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="person" class="validate lgtext" required>
                <label>Person you met</label>
            </div>
            <div class="input-field col s12">
                <textarea id="textarea1" name="content" class="materialize-textarea lgtext"></textarea>
                <label>Interesting story about your meeting</label>
            </div>
            <div class="center">
                <img src=""  id="sticker-img">
            </div>
            <div id="formbtns">
                <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Add a Sticker</a>
                <button type="submit" class="btn">Create the story</button>
            </div>

            <input type="hidden" id="inSticker" name="stickerid" value="1"/>

            <div id="modal1" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h4>Add a sticker</h4>

                    <div class="row">
                      @foreach($stickers as $sticker)
                      <div class="col s3 m2 stickercol" data-id="{{$sticker->id}}" data-url="{{url($sticker->url)}}">
                        <img class="responsive-img" src="{{url($sticker->url)}}">
                      </div>
                      @endforeach
                    </div>
                  </div>
              </div>

          </div>
  </form>

</div>
</div>


@endsection


@section('script')
<script>
$('.modal-trigger').leanModal();
$model = $("#modal1");
$inSticker = $("#inSticker");


$sticker = $("#sticker-img");
$sticker.hide();
$(".stickercol").click(function () {
    var id = $(this).attr("data-id");
    var src = $(this).attr("data-url");
    $sticker.attr("src", src);
    $sticker.fadeIn();
    $inSticker.val(id);
    $model.closeModal();
});
</script>
@endsection
