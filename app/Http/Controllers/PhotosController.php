<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller {

	function index(){
		$photos = Photo::paginate(5);  //DB::table('photos')->paginate(6);
		return view('photoclix.index', ['photos' => $photos]);
	}

	function upload(){
		return view('photoclix.photo_upload');
	}

	function newupload(Request $request){

		$validator = Validator::make($request->all(), [
			'user' => 'required',
			'photo' => 'required',
			'caption' => 'required'
		]);
		if ($validator->fails()) {
					 return redirect('dashboard/photoclix/upload')
											 ->withErrors($validator)
											 ->withInput();
		}


		$photo = Photo::create($request->all());
		$photo->link = 'uploads/'.$photo->id.".jpg";
		$photo->save();

		$destinationPath="uploads";
		$fileName=$photo->id.".jpg";
		 if ($request->file('photo')->isValid()) {
			 $request->file('photo')->move($destinationPath, $fileName);
		}
		else{
			Photo::destroy($photo->id);
			return redirect('dashboard/photoclix/upload')
									 ->withErrors($validator)
									 ->withInput();
		}

		return redirect('dashboard/photoclix');

	}

}
