<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/blog/{title}',[
    'as'=>'blog.single',
    'uses'=> 'WelcomeController@showblog'
        ]);

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'], function(){

    Route::resource('post','PostController');
    Route::controller('setting','SettingController');
//    Route::post('setting/upload',[
//        'as' => 'setting.upload',
//        'uses' => 'SettingController@uplaod'
//    ]);


});
//Route::get('/blog/{id}',[
//    'as'=>'blog.single',
//    'uses'=> 'WelcomeController@showblog'
//])->where('id','[\w\d\-\_]+');