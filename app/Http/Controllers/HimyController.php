<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
			return view('himy.all');
		}
}
