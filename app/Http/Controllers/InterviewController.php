<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Interview;

class InterviewController extends Controller {

	function index(){
		$interviews = Interview::all();
		return view('interview.index',['interviews' => $interviews]);
	}
	function show($id){
		$interview = Interview::findOrFail($id);
		// save things in json. Change the code below
		$contents = $interview->content;
		$carray =  explode("||Q||",$contents);
		$all = [];
		foreach ($carray as $q) {
		   $ques =  explode("||@||",$q);
		   $b['ques'] = $ques[0];
		   $b['ans'] = $ques[1];
		   $all[] = $b;
		}
		return view('interview.show',['interview' => $interview,'all' => $all]);
	}
}
