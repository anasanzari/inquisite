<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Article;
use Validator;

class ArticlesController extends Controller {

	public function __construct(){
		$this->middleware('auth',['except'=>['all','show']]);
	}

	function all(){
		$articles = Article::where('year',2016)->where('month',1)->get();
		$month = Carbon::parse('2010/01/01')->format('F');
		return view('articles.articles',['articles'=>$articles,'month'=>$month]);
	}
	function show($id){
		$article = Article::find($id);
		$article->content = str_replace("images/articles",url("images/articles"),$article->content);
		return view('articles.article',['article'=>$article]);
	}

	/* Administrator routes */

	function listAll(){
		$articles = Article::groupBy(['year','month'])->get();
	  return view('articles.admin_list',['articles'=>$articles]);
	}
	function listEdition($year,$month){
		$articles = Article::where('year',$year)->where('month',$month)->get();
		return view('articles.admin_list_edition',['articles'=>$articles]);
	}
	function create(){
		$months = [];
		for ($i=1; $i <=12 ; $i++) {
			$months[] = Carbon::parse('2010/'.$i.'/01')->format('F');
		}
		return view('articles.admin_create',['months'=>$months]);
	}
	function savenew(Request $request){

		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'author' => 'required',
			'year' => 'required',
			'month' => 'required',
			'content' => 'required'
		]);
		if ($validator->fails()) {
					 return redirect('dashboard/articles/create')
											 ->withErrors($validator)
											 ->withInput();
		}
    Article::create($request->all());
		return redirect('dashboard/articles');

	}

	function get($id){
		$article = Article::find($id);
		$article->content = str_replace("images/articles",url("images/articles"),$article->content);
		return view('articles.admin_get',['article'=>$article]);
	}
	function delete($id){
		$article = Article::destroy($id);
		return redirect('dashboard/articles');
	}
	function edit($id){
		$article = Article::find($id);
		$months = [];
		for ($i=1; $i <=12 ; $i++) {
			$months[] = Carbon::parse('2010/'.$i.'/01')->format('F');
		}
		return view('articles.admin_edit',['article'=>$article,'months'=>$months]);
	}
	function save($id,Request $request){
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'author' => 'required',
			'year' => 'required',
			'month' => 'required',
			'content' => 'required'
		]);
		if ($validator->fails()) {
					 return redirect('dashboard/articles/'.$id.'/edit')
											 ->withErrors($validator)
											 ->withInput();
		}
		$values = $request->all();
		$article = Article::find($id);
		$article->name = $request['name'];
		$article->author = $request['author'];
		$article->year = $request['year'];
		$article->month = $request['month'];
		$article->content = $request['content'];
		$article->save();
		return redirect('dashboard/articles/'.$id);

	}


}
