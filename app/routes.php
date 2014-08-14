<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$languages = array('nl','fr','en');
$locale = Request::segment(1);
if (empty($locale)) { 
   \App::setLocale('en');
}

if(in_array($locale, $languages)){
   \App::setLocale($locale);
}
   // \App::setLocale('nl');
Route::group(array('prefix' => $locale), function()
      {
      //Route::get('/', array('as' => 'home', function(){ //Do something  }));
      //Route::get('news', array('as' => 'news', 'uses' => 'NewsController@showIndex'));
      //Route::get('{slug}', 'PageController@showPage');

      Route::get('/', array('as' => 'home', 'uses'=>'HomeController@getIndex'));
      Route::get('/map', array('as' => 'map', 'uses'=>'MapController@getIndex'));
      Route::get('/api', array('as' => 'api', 'uses'=>'ApiController@getIndex'));
});

Route::post('form',  array('before' => 'csrf','uses'=>'HomeController@postIndex'));
Route::get('download', 'HomeController@getDownload');
Route::post('upload', 'HomeController@postUpload');
