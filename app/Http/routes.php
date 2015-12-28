<?php

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*public routes*/
Route::get('articles', 'ArticlesController@all');
Route::get('articles/{id}', 'ArticlesController@show');

Route::get('photoclix','PhotosController@index');
Route::get('interviews','InterviewController@index');
Route::get('interviews/{id}','InterviewController@show');

Route::get('himy','HimyController@index');
Route::get('himy/stories','HimyController@all');
Route::get('himy/login','HimyController@login');
Route::get('himy/create','HimyController@create');

/* Administrator routes-- needs authentication */
Route::get('dashboard','Dashboard\DashboardController@main');
Route::get('dashboard/articles','ArticlesController@listAll');
Route::get('dashboard/articles/create','ArticlesController@create');
Route::post('dashboard/articles/create','ArticlesController@savenew');

Route::get('dashboard/articles/id/{id}','ArticlesController@get');
Route::get('dashboard/articles/id/{id}/edit','ArticlesController@edit');
Route::get('dashboard/articles/id/{id}/delete','ArticlesController@delete');
Route::post('dashboard/articles/id/{id}','ArticlesController@save');
Route::get('dashboard/articles/{year}/{month}','ArticlesController@listEdition');

Route::get('dashboard/photoclix','PhotosController@index');
Route::get('dashboard/photoclix/upload','PhotosController@upload');
Route::post('dashboard/photoclix/upload','PhotosController@newupload');
