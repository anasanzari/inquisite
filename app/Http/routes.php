<?php

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::post('home/feed', 'HomeController@feedback');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*public routes*/
Route::get('editions', 'ArticlesController@editions');
Route::get('editions/{year}/{month}', 'ArticlesController@lists');

Route::get('articles', 'ArticlesController@all'); //latest edition
Route::get('articles/{id}', 'ArticlesController@show');

Route::get('photoclix','PhotosController@index');
Route::get('interviews','InterviewController@index');
Route::get('interviews/{id}','InterviewController@show');

Route::get('himy','HimyController@index');
Route::get('himy/stories','HimyController@listAll');
Route::get('himy/login','HimyController@login');
Route::get('himy/create','HimyController@create');
Route::post('himy/create','HimyController@save');
Route::get('himy/story/img/{id}','HimyController@img');
Route::get('himy/story/{id}','HimyController@view');


/* Administrator routes-- needs authentication */
Route::get('dashboard','Dashboard\DashboardController@main');
Route::get('dashboard/feedback','Dashboard\DashboardController@feeds');

Route::get('dashboard/articles','ArticlesController@listAll');
Route::get('dashboard/articles/create','ArticlesController@create');
Route::post('dashboard/articles/create','ArticlesController@savenew');

Route::get('dashboard/articles/{id}','ArticlesController@get');
Route::get('dashboard/articles/{id}/edit','ArticlesController@edit');
Route::get('dashboard/articles/{id}/delete','ArticlesController@delete');
Route::post('dashboard/articles/{id}','ArticlesController@save');
Route::get('dashboard/articleedition/{year}/{month}','ArticlesController@listEdition');

Route::get('dashboard/photoclix','PhotosController@all');
Route::get('dashboard/photoclix/upload','PhotosController@upload');
Route::post('dashboard/photoclix/upload','PhotosController@newupload');
Route::get('dashboard/photoclix/{id}','PhotosController@show');
Route::get('dashboard/photoclix/{id}/edit','PhotosController@edit');
Route::post('dashboard/photoclix/{id}/edit','PhotosController@confirm_edit');
Route::get('dashboard/photoclix/{id}/delete','PhotosController@delete');


Route::get('dashboard/interviews','InterviewController@all');
Route::get('dashboard/interviews/create','InterviewController@create');
Route::post('dashboard/interviews/create','InterviewController@add'); //REST
Route::get('dashboard/interviews/{id}','InterviewController@view');
Route::get('dashboard/interviews/rest/{id}','InterviewController@get'); //REST
Route::get('dashboard/interviews/{id}/edit','InterviewController@edit');
Route::post('dashboard/interviews/{id}/edit','InterviewController@save');
Route::get('dashboard/interviews/{id}/delete','InterviewController@delete');

Route::get('dashboard/himy','HimyController@all');
Route::get('dashboard/himy/{id}','HimyController@show');
Route::get('dashboard/himy/{id}/delete','HimyController@delete');

/* facebook auth */
Route::get('himy/fblogin', 'HimyController@redirectToProvider');
Route::get('himy/fblogin/callback', 'HimyController@handleProviderCallback');
Route::get('himy/fblogout', 'HimyController@logout');
