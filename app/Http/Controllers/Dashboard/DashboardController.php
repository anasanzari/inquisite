<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\FeedBack;

class DashboardController extends Controller {

	public function __construct(){
		$this->middleware('auth',['except'=>[]]);
	}

	function main(){
		return view('dashboard.index');
	}

	function feeds(){
		$feeds = FeedBack::orderBy('id','desc')->paginate(10);
		$feeds->setPath('feedback');
		return view('dashboard.feed',['feeds'=>$feeds]);
	}

}
