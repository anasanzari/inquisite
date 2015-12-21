<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller {

	function index(){
		$photos = Photo::paginate(5);  //DB::table('photos')->paginate(6);
		return view('photoclix.index', ['photos' => $photos]);
	}


}
