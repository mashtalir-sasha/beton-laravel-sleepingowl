<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('home');
});*/

//Route::post('mail/send', 'MailController@send');

Route::get('/', function () {
    return view('home', ['contacts' => \App\Contacts::find(1), 'title' => \App\Title::find(1), 'category' => \App\Categories::get(), 'gallery' => \App\Gallery::find(1), 'controller' => new \App\Http\Controllers\HomeController()]);
});

Route::match(['get', 'post'], 'categories/{id}', 'CategoriesController@showCategoriesDetails')->where(['id' => '[0-9]+']);

Route::get('/home', function () {
    return redirect('/admin');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
