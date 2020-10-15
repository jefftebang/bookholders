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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Bookshelves
Route::get('/bookshelves', 'BookController@books')->name('bookshelves');

// Request Lists
Route::get('/requestslist', 'BorrowedBookController@reqList');

// Admin
// Guide Line
Route::get('/guide', 'BookController@guideView');

// Add book
Route::get('/addbook', 'BookController@produce');
Route::post('/addbook', 'BookController@keep');

// Add Author
Route::get('/addauthor', 'BookController@addAuthorView');
Route::post('/addauthor', 'BookController@addAuthor');

// Add Publisher
Route::get('/addpublisher', 'BookController@addPublisherView');
Route::post('/addpublisher', 'BookController@addPublisher');

// Set Author Book
Route::get('setauthorbook', 'BookController@setAuthorBookView');
Route::post('setauthorbook', 'BookController@setAuthorBook');

// Delete Book
Route::get('/deletebook/{id}', 'BookController@destroy');

// Edit book
Route::get('/editbook/{id}', 'BookController@editBookView');
Route::patch('/editbook/{id}', 'BookController@updateBook');

// Admin Profile
Route::get('/profile', 'RoleController@adminProfileView');
Route::patch('/profile/{id}', 'RoleController@adminUpdateProfile');

// Search
Route::post('/search', 'ItemController@search');

// To filter
Route::get('/bookshelves/{id}', 'BookController@filter');

// User
// Request a book
Route::get('/request/{id}', 'BorrowedBookController@requestView');
Route::post('/request/{id}', 'BorrowedBookController@requestBtn');