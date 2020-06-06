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
use App\Book;
use Illuminate\Http\Request;

// ダッシュボード表示
Route::get('/', 'BooksController@index');

// 追加
Route::post('/books', 'BooksController@store');

// 更新画面
Route::post('/edit/{books}', 'BooksController@edit');

// 更新処理
Route::post('/books/update', 'BooksController@update');

// 本を削除
Route::delete('/book/{book}', 'BooksController@delete');


// Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
