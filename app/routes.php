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

$languages = array('nl','fr');
$locale = Request::segment(1);
if(in_array($locale, $languages)){
   \App::setLocale($locale);
} else {
   $locale = null;
}

Route::group(array('prefix' => $locale), function()
      {
      //Route::get('/', array('as' => 'home', function(){ //Do something  }));
      //Route::get('news', array('as' => 'news', 'uses' => 'NewsController@showIndex'));
      //Route::get('{slug}', 'PageController@showPage');

   Route::get('/', 'HomeController@getIndex');
   Route::get('download', 'HomeController@getDownload');

   Route::post('form',  array('before' => 'csrf','uses'=>'HomeController@postIndex'));
   Route::post('upload', 'HomeController@postUpload');
});
