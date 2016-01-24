<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Photo;
use File;

class PhotosController extends Controller {

	public function __construct(){
		$this->middleware('auth',['except'=>['index']]);
	}

	function index(){
		$photos = Photo::paginate(8);  //DB::table('photos')->paginate(6);
		$photos->setPath('photoclix');
		return view('photoclix.index', ['photos' => $photos]);
	}

	function upload(){
		return view('photoclix.photo_upload');
	}

	function all(){
		$photos = Photo::all();
		return view('photoclix.admin_list',['photos'=>$photos]);
	}

	function newupload(Request $request){

		$validator = Validator::make($request->all(), [
			'user' => 'required',
			'photo' => 'required',
			'name' => 'required'
		]);
		if ($validator->fails()) {
					 return redirect('dashboard/photoclix/upload')
											 ->withErrors($validator)
											 ->withInput();
		}


		$photo = Photo::create($request->all());
		$photo->link = 'uploads/photoclix/'.$photo->id.".jpg";
		$photo->save();

		$destinationPath="uploads/photoclix";
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

	public function show($id)
	{
		$photo = Photo::find($id);
    return view('photoclix.show',compact('photo'));
	}

	public function edit($id)
	{
		$photo = Photo::find($id);
		return view('photoclix.edit',compact('photo'));
	}
	public function confirm_edit(Request $request,$id)
	{
		$photo = Photo::find($id);
		$input = $request->all();
		$photo->update($input);
		return redirect('dashboard/photoclix/'.$id);
	}

	public function delete($id)
	{

		Photo::destroy($id);
		File::delete('uploads/photoclix/'.$id.'.jpg');
		return redirect('dashboard/photoclix');
	}

}
