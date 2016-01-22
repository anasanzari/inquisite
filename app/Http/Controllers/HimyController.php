<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Story;

class HimyController extends Controller {

		function index(){
			return view('himy.index');
		}
		function create(){
			return view('himy.create');
		}
		function login(){
			return view('himy.login');
		}
		function all(){
			$story = Story::all();
			return view('himy.admin_list',compact('story'));
		}

		public function show($id)
		{
			$story = Story::find($id);
			return view('himy.show',compact('story'));
		}

		public function delete($id)
		{
			Story::destroy($id);
			return redirect('dashboard/himy');
		}
}
