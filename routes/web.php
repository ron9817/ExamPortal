<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ExamController;

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

Route::get('welcome', function () { // sample
	// dd( config('app.db'));
    return view('Admin.modal');
});

Route::middleware(['auth', 'auth_admin'])->group(function () {
	Route::get('admin/dashboard', 'Admin\ExamController@displayDashboard_tests')->name('admin.dashboard.tests'); // admin dashboard (working)
	// 	return view('Admin/dashboard');
	// });

	Route::get('admin/students', function () { // students tab (working)
	    return view('Admin/student_tab');
	});

	Route::get('admin/tests', 'Admin\ExamController@display_tests')->name('admin.tests'); // Doubt
	Route::get('admin/test', function () { // redirecting (working)
	    return redirect('admin/tests');
	    // return view('Admin/Test/test_display_layout');
	});

	Route::get( '/admin/test/{id}', 'Admin\ExamController@getExamById' )->name('admin.test.show'); // To display a specific test (working)

	Route::get('admin', function () { // redirecting (working)
	    return redirect('admin/dashboard');
	    // return view('Admin/index');
	});

	Route::post('/admin/exam', 'Admin\ExamController@save_exam'); // For saving exam/test details (working)
	// Route::post('/admin/test/question', 'Admin\QuestionController@save_question'); // For saving question details // Wrong Approach
	Route::post('/admin/test/question', 'Admin\ExamController@save_question'); // For saving question details // Correct Approach
	Route::put('/admin/test/{id}/question/{qs_id}', 'Admin\ExamController@update_question');
	Route::delete('/admin/test/{id}/question/{qs_id}', 'Admin\ExamController@delete_question');

	Route::post('/admin/test/update_Exam', 'Admin\ExamController@update_Exam_Detials'); // New AJAX update
	// Route::post('/admin/test/activate_exam', 'Admin\ExamController@activate'); // Publish exam to students (working)
	Route::post('/admin/test/publish_Exam', 'Admin\ExamController@publish_Exam_Detials'); // New AJAX publish
	Route::post('/admin/test/publish_Exam_Confirm', 'Admin\ExamController@publish_Exam_Confirm'); // New AJAX publish confirm
	Route::post('/admin/test/delete_Exam', 'Admin\ExamController@delete_exam'); // New AJAX delete exam request
	Route::post('/admin/test/delete_Exam_Confirm', 'Admin\ExamController@delete_exam_confirm'); // New AJAX delete exam confirm
	Route::post('/admin/test/check_active', 'Admin\ExamController@active_exam'); // Used route do-not comment

	Route::get( '/admin/exams', 'Admin\ExamController@get' )->name( 'admin.exam' );

	Route::get( '/admin/exams/{$id}', 'Admin\ExamController@getById' );

	Route::post( '/admin/exams', 'Admin\ExamController@add' );

	Route::post( '/admin/exams/update/{$id}', 'Admin\ExamController@update' );

	Route::post( '/admin/exams/delete/{$id}', 'Admin\ExamController@delete' );

	Route::get( '/admin/questions', 'Admin\QuestionController@get' )->name( 'admin.question' );

	Route::get( '/admin/questions/{$id}', 'Admin\QuestionController@getById' );

	Route::post( '/admin/questions', 'Admin\QuestionController@add' );

	Route::post( '/admin/questions/update/{$id}', 'Admin\QuestionController@update' );

	Route::post( '/admin/questions/delete/{$id}', 'Admin\QuestionController@delete' );

	Route::get( '/admin/options', 'Admin\OptionController@get' )->name( 'admin.option' );

	Route::get( '/admin/options/{$id}', 'Admin\OptionController@getById' );

	Route::post( '/admin/options', 'Admin\OptionController@add' );

	Route::post( '/admin/options/update/{$id}', 'Admin\OptionController@update' );

	Route::post( '/admin/options/delete/{$id}', 'Admin\OptionController@delete' );

	Route::get('admin/options/ui/{id}', 'Admin\ExamController@get_option_ui');

});

Route::middleware(['auth'])->group(function () {
	Route::get( '/', 'Student\Dashboard\DashboardController@index' )->name( 'dashboard' );
	Route::get( '/exam/{id?}', 'Student\Exam\ExamController@get' );
	Route::post( '/exam/register', 'Student\Exam\ExamController@register' );
	Route::get( '/exam/score/{id}', 'Student\Exam\ExamController@score' )->middleware( 'exam_end' );

	Route::middleware(['exam_details', 'exam'])->group(function () {
		Route::post( '/exam/confirm', 'Student\Exam\ExamController@confirm' );
		Route::post( '/question/review', 'Student\Question\QuestionController@review' );
		Route::post( '/question/{qs_order?}', 'Student\Question\QuestionController@next_qs' )->name( 'next' );
		
	});
	

	Route::post( '/logout', 'LoginController@logout' );
	Route::get( '/logout', 'LoginController@logout_' );

});
Route::get( '/login', 'LoginController@index' )->name('login');
Route::post( '/login', 'LoginController@login' );
Route::get( '/mail', 'Student\Exam\ExamController@mail_test' );


// Route::get( '/score', function(){
// 	return view( 'Student/Score/index' );
// } );

// Route::get( '/test', 'Student\Dashboard\DashboardController@index' );
