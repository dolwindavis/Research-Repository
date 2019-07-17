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

// Route::get('/', function () {
//     return view('inauguration');
// });
Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {

    return view('welcome');

});
Route::get('/home', function () {

    return view('welcome');

});

Route::post('/profile/update','ProfileController@update');
Route::get('/profile/{slug}','ProfileController@index')->name('profile');

Route::get('/repository/{title}/{filename}/download','RepositoryController@repositoryDownload');
Route::get('/repository/{category}/{slug}','RepositoryController@index')->name('repository');



//resourcses Routes
Route::resource('/journals', 'JournalController');
Route::resource('/books', 'BookController');
Route::resource('/projects', 'ResearchProjectController');
Route::resource('/departments', 'DepartmentController');
Route::resource('/indexing', 'IndexingTypeController');

//admin routes
Route::get('/admin','AdminController@index');
Route::get('/admin/departement/add','AdminController@departmentIndex');
Route::post('/admin/departement/add','AdminController@addDepartment')->name('addDepartment');


