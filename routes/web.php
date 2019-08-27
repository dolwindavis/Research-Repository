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

use App\Helpers\ShowRepository;

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {

    $showrepository = new ShowRepository();

    $repositorycount = $showrepository->totalRepositoryCount();



    return view('welcome')->with('repositorycount',$repositorycount);

})->middleware('home');

Route::get('/home', function () {

    $showrepository = new ShowRepository();

    $repositorycount = $showrepository->totalRepositoryCount();

    return view('welcome')->with('repositorycount',$repositorycount);

})->middleware('home');

Route::post('/profile/update','ProfileController@update');
Route::get('/profile/{slug}','ProfileController@index')->name('profile');

Route::get('/repository/{title}/{filename}/download','RepositoryController@repositoryDownload');
Route::get('/repository/{category}/{slug}','RepositoryController@index')->name('repository');

//department Routes
Route::get('/admin/department','AdminController@departmentIndex');
Route::get('/admin/department/add','AdminController@addDepartmentIndex');
Route::post('/admin/department/add','AdminController@addDepartment')->name('addDepartment');
Route::get('/admin/department/remove','AdminController@removeDepartment');
Route::get('/admin/department/edit/{id}','AdminController@editDepartment');
Route::post('/admin/department/update/{id}','AdminController@updateDepartment');

//resourcses Routes
Route::resource('/journals', 'JournalController');
Route::resource('/books', 'BookController');
Route::resource('/projects', 'ResearchProjectController');
// Route::resource('/departments', 'DepartmentController');
Route::resource('/indexing', 'IndexingTypeController');


//admin routes
Route::get('/admin/research/create','AdminController@create');
Route::post('/admin/create','AdminController@store');
Route::get('/admin','AdminController@index');
Route::get('/admin/books','AdminController@allBooks');
Route::get('/admin/journals','AdminController@allJournals');
Route::get('/admin/research','AdminController@allResearch');
Route::get('/admin/faculties','AdminController@allFaculties');


//search Routes

Route::get('/search/users','RepositoryController@searchUsers');

Route::get('/search/repository','RepositoryController@searchRepo');












