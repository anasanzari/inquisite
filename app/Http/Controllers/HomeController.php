<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\FeedBack;

class HomeController extends Controller {


	public function index()
	{
		return view('home');
	}

	public function feedback(Request $request){

		$feed = FeedBack::create($request->all());
		$feed['status'] = "success";
		return $feed;

	}

}
