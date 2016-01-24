<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Interview;

use Carbon\Carbon;
use Validator;

class InterviewController extends Controller {

	public function __construct(){
		$this->middleware('auth',['except'=>['index','show']]);
	}

	function index(){
		$interviews = Interview::all();
		return view('interview.index',['interviews' => $interviews]);
	}

	function show($id){
		$interview = Interview::findOrFail($id);
		$interview->content = json_decode($interview->content,true);
		return view('interview.show',['interview' => $interview]);
	}



	function all(){
		$interviews = Interview::all();
		return view('interview.admin_list',['interviews'=>$interviews]);
	}

	function get($id){
		$c = Interview::findOrFail($id);
		$c->content = json_decode($c->content);
		return $c;
	}

	function add(Request $request){
		$values = $request->all();
		return Interview::create($request->all());
	}
	function view($id){
		$interview = Interview::findOrFail($id);
		$interview->content = json_decode($interview->content,true);
		return view('interview.admin_view',['interview' => $interview]);
	}
	function create(){
		return view('interview.admin_create');
	}
	function edit($id){
		return view('interview.admin_edit',['id'=>$id]);
	}
	function save($id,Request $request){
      $i = Interview::findOrFail($id);
      $values = $request->all();
      $i->person = $values['person'];
      $i->content = $values['content'];
			$i->intro = $values['intro'];
      $i->save();
      return $i;
  }

	function delete($id){
		Interview::destroy($id);
		return redirect('dashboard/interviews');
	}



}
