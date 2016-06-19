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

/**
* Set first page to be the login page
*/
Route::get('/', function () {
    return redirect()->route('viewfields');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function () {
   
    //Create field routing to createfield function on fieldcontroller
    Route::get('/create', ['as' => 'create', 'uses' => 'FieldController@createfield']);
    //use field controller as a resoure to call it defined functions
    Route::resource('field', 'FieldController');
    //viewfields routing to viewfields function on fieldcontroller 
    Route::get('/viewfields', ['as' => 'viewfields', 'uses' => 'FieldController@viewfields']);
    //delete field routing to deletefield function on fieldcontroller 
    Route::get('/field/delete/id/{id}',['uses' => 'FieldController@deletefield']); 
    //eidt field routing to edit field function on fieldcontroller
    Route::get('/field/edit/id/{id}',  ['uses' => 'FieldController@editfield']); 
    //handelDelete routing to handelDelete funtion on the fieldconroller 
    Route::post('/handleDelete', ['as' => 'handleDelete', 'uses' => 'FieldController@handleDelete']);
    //handeEdit routing to handleEdit function on fieldcontroller
    Route::post('/handleEdit',   ['as' => 'handleEdit', 'uses' => 'FieldController@handleEdit']);
      

    
});