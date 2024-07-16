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

Route::namespace('Backend')->group(function () {

	Route::get('/','userController@getDangNhapAdmin')->name('admin.login');

	Route::post('login','userController@postDangNhapAdmin');

	Route::get('logout','userController@postDangXuatAdmin')->name('logout');

	Route::group(['prefix'=>'admin'], function(){

		Route::group(['prefix'=>'trangchu'], function(){	

			Route::get('indexHome','humanResourcesController@getIndex');

			Route::get('trangchu','humanResourcesController@getTrangchu');
		});

		Route::group(['prefix'=>'humanResources'], function(){

			//Tài khoản
			Route::get('account','humanResourcesController@getAccount');

			Route::post('addAccount','humanResourcesController@postAddAccount');

			Route::post('deleteAccount','humanResourcesController@postDeleteAccount');

			Route::get('getUpdateAccount/{id}','humanResourcesController@getUpdateAccount');

			Route::post('postUpdateAccount/{id}','humanResourcesController@postUpdateAccount');

			Route::get('getUpdateAccountAdmin/{id}','humanResourcesController@getUpdateAccountAdmin');

			Route::post('postUpdateAccountAdmin/{id}','humanResourcesController@postUpdateAccountAdmin');


			//Học viên
			Route::get('student','humanResourcesController@getStudent');
            Route::get('course/student/{id}', 'humanResourcesController@courseStudent')->name('course.student');

			Route::post('addStudent','humanResourcesController@postAddStudent');

			Route::post('updateStudent','humanResourcesController@postUpdateStudent');

			Route::post('deleteStudent','humanResourcesController@postDeleteStudent');

			//Giảng viên
			Route::get('teacher','humanResourcesController@getTeacher');
            Route::get('course/teacher/{id}', 'humanResourcesController@courseTeacher')->name('course.teacher');

			Route::post('addTeacher','humanResourcesController@postAddTeacher');

			Route::post('updateTeacher','humanResourcesController@postUpdateTeacher');

			Route::post('deleteTeacher','humanResourcesController@postDeleteTeacher');
		});

		Route::group(['prefix'=>'more2level'], function(){

			Route::get('courseIntensive/{id}','courseController@getCourseIntensive');

			Route::get('editIntensive','courseController@editCourseIntensive');

			Route::post('addIntensive','courseController@addCourseIntensive');

			Route::post('deleteIntensive/{id}/{category_id}','courseController@deleteCourseIntensive');

			Route::get('infoCourse/{id}','courseController@getPageInfoCourse');

			Route::post('registerTeacher','courseController@registerTeacher');

			Route::get('deleteTeacher/{id}/{courseId}','courseController@deleteTeacher');
			
			Route::get('listStudent/{id}','courseController@listStudent');

			Route::post('registerStudent','courseController@registerStudent');

			Route::post('deleteStudent/{id}/{courseId}','courseController@deleteStudent');

			Route::get('addNewStudents/{id}','courseController@getPageAddstudent');

			Route::post('addPeriod','courseController@addPeriodofCourse');

			Route::post('deletePeriod','courseController@deletePeriodofCourse');


      Route::get('update/status/tuition/{id}', 'courseController@updateStatusTuition')->name('update.status.tuition');

			//Document
			
			Route::post('addDocument','courseController@postAddDocument');

			Route::post('updateDocument','courseController@postUpdateDocument');
			
			Route::post('deleteDocument','courseController@postDeleteDocument');

			//Score		
			
			Route::post('addScore/{id}','courseController@postAddScore');

		});

		  Route::group(['prefix'=>'test'], function(){
			
			Route::get('importQuestion/{id}','testController@getImportQuestion');

			Route::post('importExcelQuestion','testController@postImportExcelQuestion');

		});

		Route::group(['prefix'=>'schedule'], function(){
			
			//Đăng ký lịch dạy
			Route::get('teachingSchedule','scheduleController@getTeachingSchedule');

			Route::post('addTeachingSchedule','scheduleController@postAddTeachingSchedule');

			Route::post('deleteTeachingSchedule','scheduleController@postDeleteTeachingSchedule');		

		});

		Route::group(['prefix'=>'list'], function(){
			
			//Danh mục: Thời gian học và buổi học
			Route::get('studyTime','listController@getStudyTime');

			Route::post('addStudyTime','listController@postAddStudyTime');

			Route::post('updateStudyTime','listController@postUpdateStudyTime');

			Route::post('deleteStudyTime','listController@postDeleteStudyTime');

			Route::get('studyShift','listController@getStudyShift');	

			Route::post('addStudyShift','listController@postAddStudyShift');	

			Route::post('updateStudyShift','listController@postUpdateStudyShift');

			Route::post('deleteStudyShift','listController@postDeleteStudyShift');

		});

		Route::group(['prefix'=>'ajax'], function(){
			
			Route::get('buoihoc/{id}','ajaxController@getBuoihoc');

			Route::get('diemdanh/{column}/{value}/{register}/{period}','ajaxController@saveDiemdanh');
		});

		Route::group(['prefix'=>'chart'], function(){
			
			Route::get('courseChart','chartController@getCourseChart');

            Route::get('course/detail/{id}','chartController@getCourseDetail')->name('chart.course.detail');
		});

		Route::group(['prefix'=>'search'], function(){
			//Tìm kiếm
			Route::get('livesearch/action','searchController@action')->name('livesearch.action');

			Route::get('livesearchTeacher/searchTeacher','searchController@searchTeacher')->name('livesearchTeacher.searchTeacher');

			Route::get('livesearchAccount/searchAccount','searchController@searchAccount')->name('livesearchAccount.searchAccount');
		});

		Route::group(['prefix'=>'search'], function(){

			Route::get('exportStudent/exportExcelStudent','humanResourcesController@exportExcelStudent')->name('exportStudent.exportExcelStudent');

			Route::get('exportTeacher/exportExcelTeacher','humanResourcesController@exportExcelTeacher')->name('exportTeacher.exportExcelTeacher');

			Route::get('exportPT/exportExcelPT','humanResourcesController@exportExcelPT')->name('exportPT.exportExcelPT');
					});
	});

});

Route::namespace('Teacher')->group(function () {

	Route::group(['prefix'=>'teacher'], function(){

		Route::group(['prefix'=>'homeTeacher'], function(){
			
			Route::get('homeTeacher','teacherController@getHomeTeacher');

			Route::get('indexHome','teacherController@getIndexHome');
		});
		
		Route::group(['prefix'=>'schedule'], function(){
			
			//Đăng ký lịch dạy
			Route::get('teachingSchedule','scheduleController@getTeachingSchedule');

			Route::post('addTeachingSchedule','scheduleController@postAddTeachingSchedule');

			Route::post('deleteTeachingSchedule','scheduleController@postDeleteTeachingSchedule');	
		});

		Route::group(['prefix'=>'more2level'], function(){

			Route::get('courseIntensive/{id}','courseController@getCourseIntensive');

			Route::get('editIntensive','courseController@editCourseIntensive');

			Route::post('addIntensive','courseController@addCourseIntensive');

			Route::post('deleteIntensive/{id}/{category_id}','courseController@deleteCourseIntensive');

			Route::get('infoCourse/{id}','courseController@getPageInfoCourse');

			Route::post('registerTeacher','courseController@registerTeacher');

			Route::get('deleteTeacher/{id}/{courseId}','courseController@deleteTeacher');
			
			Route::get('listStudent/{id}','courseController@listStudent');

			Route::post('registerStudent','courseController@registerStudent');

			Route::get('deleteStudent/{id}/{courseId}','courseController@deleteStudent');

			Route::get('addNewStudents/{id}','courseController@getPageAddstudent');

			Route::post('addPeriod','courseController@addPeriodofCourse');

			Route::post('deletePeriod','courseController@deletePeriodofCourse');

			//Document
			
			Route::post('addDocument','courseController@postAddDocument');

			Route::post('updateDocument','courseController@postUpdateDocument');
			
			Route::post('deleteDocument','courseController@postDeleteDocument');

			Route::post('addScore/{id}','courseController@postAddScore');
		});

		Route::group(['prefix'=>'info_teacher'], function(){
			
			Route::get('getUpdateAccount/{id}','teacherController@getUpdateAccount');

			Route::post('postUpdateAccount/{id}','teacherController@postUpdateAccount');
			
		});

		Route::group(['prefix'=>'ajax'], function(){
			
			Route::get('buoihoc/{id}','ajaxController@getBuoihoc');

			Route::get('diemdanh/{column}/{value}/{register}/{period}','ajaxController@saveDiemdanh');
		});

	});

});

Route::namespace('Student')->group(function () {

	Route::group(['prefix'=>'student'], function(){

		Route::group(['prefix'=>'homeStudent'], function(){
			
			Route::get('homeStudent','studentController@getHomeStudent');

		});

		Route::group(['prefix' => 'list'], function () {

			Route::get('score', 'studentController@getScoreStudent');
			Route::get('course', 'studentController@getCourseStudent');
		});

		Route::group(['prefix'=>'studentDocument'], function(){

			Route::get('document','studentController@getPageDocument');

			Route::get('getDocument/{id}','studentController@getDocument');
		});

		Route::group(['prefix'=>'account'], function(){

			Route::get('getUpdateAccount/{id}','studentController@getUpdateAccount');

			Route::post('postUpdateAccount/{id}','studentController@postUpdateAccount');

		});
	});
});


