<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller {

	function all(){
		$articles = Article::all();
		return view('articles.articles',['articles'=>$articles]);
	}
	function show($id){
		$article = Article::find($id);
		return view('articles.article',['article'=>$article]);
	}
}
