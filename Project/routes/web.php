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

//----------------------------------------------------------
/* login part */
//route to get login page
Route::get('/', 'pagesController@login');
Route::get('/login', 'pagesController@login');

//login
Route::post('/user_login', 'loginController@login');

//logout
Route::get('/logout', 'loginController@logout');



//--------------------- staff ------------------------

//route to get staff index page
Route::get('/management', 'indexController@index');

//route to get page for edit user info
Route::get('/user_edit', 'indexController@user_edit');

//route to update user info
Route::post('/configuration', 'indexController@configuration');



//----------------------------------------------------------
/* Part of Admin */

//route to get admin management page
Route::resource('/admin_management', 'StaffController');

//route to add user
Route::post('/add_user' , 'StaffController@store');

//route to delete user
Route::post('/del_user', 'StaffController@delete');

//route to search user
Route::post('/search_user', 'StaffController@staff_search');



//----------------------------------------------------------
/* Part of Student info */

//route to get student info page
Route::get('/student_info', 'pagesController@student_info');

//rote to search student info
Route::post('/student_search' , 'StudentController@student_search');



//----------------------------------------------------------
/* Part of Subject */

//route to get subject suggestion page
Route::get('/subject_suggestion', 'pagesController@subject_suggestion');

//rote to search subject info
Route::post('/subject_search' , 'SubjectController@subject_search');

//route to add subject
Route::post('/subject_add' , 'SubjectController@subject_add');

//route to delete subject
Route::post('/del_subject' , 'SubjectController@subject_del');



//--------------------- student ------------------------

Route::get('/student','pagesController@student');



Route::get('/course', function () {
    return view('student.course');
});

Route::get('/userEdit','StudentController@editForm');

Route::post('/studentEdit','StudentController@studentEdit');

Route::resource('user','StudentController');

Route::post('/addSearch','SubjectController@addSearch');

Route::resource('subjects','SubjectController');

Route::post('search','SubjectController@search');

Route::post('enroll','StudentController@enroll');


//----------------------------------------------------------
/* Other */


//route to change language
Route::get('change/{locale}', function ($locale) {
	Session::put('locale', $locale);
	return Redirect::back();
});

