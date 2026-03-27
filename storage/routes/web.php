<?php

/*_________________Admin Controllers _____________________*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Home\HomeController as Dashboard;
use App\Http\Controllers\Admin\Users\AdminController as Admin;
use App\Http\Controllers\Admin\Auth\AuthController as Auth;
use App\Http\Controllers\Admin\Customer\CustomerController as Customer;

use App\Http\Controllers\Admin\Setting\CourseController as Course;
use App\Http\Controllers\Admin\Setting\ClassController as Classes;
use App\Http\Controllers\Admin\Setting\SubjectController as Subject;
use App\Http\Controllers\Admin\Setting\ChapterController as Chapters;
use App\Http\Controllers\Admin\Setting\TopicController as Topics;

use App\Http\Controllers\Admin\PastPaper\PaperController as PastPaper;
use App\Http\Controllers\Admin\PastPaper\Extra\ExtraController as Extra;

use App\Http\Controllers\Admin\Bank\extra\PreController as Prerequisite;
use App\Http\Controllers\Admin\Bank\QuestionController as Question;
use App\Http\Controllers\Admin\Bank\Partial\PartialController as Partial;

use App\Http\Controllers\Admin\System\SystemController as System;

/*_________________Client Controllers _____________________*/

use App\Http\Controllers\Client\AuthController as ClientAuth;
use App\Http\Controllers\Client\Home\DashboardController as ClientDashboard;
use App\Http\Controllers\Client\Past\PaperController as Past;
use App\Http\Controllers\Client\Teachers\TeacherController as Teacher;

use App\Http\Controllers\Client\Generate\CourseController as Syllabus;
use App\Http\Controllers\Client\Generate\DataController as Data;
use App\Http\Controllers\Client\Generate\Paper\PaperController as Generate;
use App\Http\Controllers\Client\Generate\Paper\SavedPaperController as Saved;

use App\Http\Controllers\Client\Setting\SettingController as Setting;







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
Route::get('/admin/login',[Auth::class,'login'])->name('user-login');
Route::post('/admin/auth',[Auth::class,'auth'])->name('user-auth');
Route::get('/classes/course/{id}',[Classes::class,'courseClasses'])->name('course-classes');


Route::middleware('user')->group(function (){
    Route::get('/dashboard',[Dashboard::class,'dashboard'])->name('admin-home');

    Route::get('/users/list',[Admin::class,'admins'])->name('admin-list');
    Route::get('/user/add',[Admin::class,'add'])->name('admin-add');
    Route::post('/user/save',[Admin::class,'save'])->name('admin-save');
    Route::get('/user/logout',[Admin::class,'logout'])->name('admin-logout');
    Route::get('/user/edit/{id}',[Admin::class,'edit'])->name('admin-edit');
    Route::post('/user/update',[Admin::class,'update'])->name('admin-update');
    Route::get('/user/profile/{id}',[Admin::class,'profile'])->name('admin-profile');
    Route::get('/user/setting/{id}',[Admin::class,'setting'])->name('admin-setting');
    Route::post('/user/account/update',[Admin::class,'account'])->name('admin-account-update');
    Route::get('/user/delete/{id}',[Admin::class,'remove'])->name('admin-remove');
    Route::get('/user/status/{id}/{status}',[Admin::class,'status'])->name('admin-status');

    Route::get('/customer/list',[Customer::class,'customers'])->name('customer-list');
    Route::get('/customer/add',[Customer::class,'add'])->name('customer-add');
    Route::post('/customer/save',[Customer::class,'save'])->name('customer-save');
    Route::get('/customer/status/{id}/{status}',[Customer::class,'status'])->name('customer-status');
    Route::get('/customer/edit/{id}',[Customer::class,'edit'])->name('customer-edit');
    Route::post('/customer/update',[Customer::class,'update'])->name('customer-update');
    Route::get('/customer/profile/{id}',[Customer::class,'profile'])->name('customer-profile');

    Route::get('/courses/list',[Course::class,'courses'])->name('course-list');
    Route::post('/course/save',[Course::class,'save'])->name('course-save');
    Route::post('/course/update',[Course::class,'update'])->name('course-update');
    Route::get('/courses/edit/{id}',[Course::class,'edit'])->name('course-edit');
    Route::get('/courses/remove/{id}',[Course::class,'remove'])->name('course-remove');

    Route::get('/classes/list',[Classes::class,'classes'])->name('classes-list');
    Route::post('/class/save',[Classes::class,'save'])->name('class-save');
    Route::get('/classes/by-course/{courseId}',[Classes::class,'getClasses'])->name('classes-by-course');
    Route::get('/class/edit/{id}',[Classes::class,'edit'])->name('class-edit');
    Route::post('/class/update',[Classes::class,'update'])->name('class-update');
    Route::get('/class/remove/{id}',[Classes::class,'remove'])->name('class-remove');
//    Route::get('/classes/course/{id}',[Classes::class,'courseClasses'])->name('course-classes');

    Route::get('/subject/list',[Subject::class,'subjects'])->name('subject-list');
    Route::get('/subject/add',[Subject::class,'add'])->name('subject-add');
    Route::post('/subject/save',[Subject::class,'save'])->name('subject-save');
    Route::post('/subject/search',[Subject::class,'getSubjects'])->name('subject-search');
    Route::get('/subject/edit/{id}',[Subject::class,'edit'])->name('subject-edit');
    Route::post('/subject/update',[Subject::class,'update'])->name('subject-update');
    Route::get('/subject/remove/{id}',[Subject::class,'remove'])->name('subject-remove');
    Route::get('/subject/class/{id}',[Subject::class,'subject1'])->name('class-subjects');

    Route::get('/chapter/list',[Chapters::class,'chapterList'])->name('chapter-list');
    Route::get('/chapter/add',[Chapters::class,'add'])->name('chapter-add');
    Route::post('/chapter/save',[Chapters::class,'save'])->name('chapter-save');
    Route::post('/chapter/search',[Chapters::class,'getChapters'])->name('chapter-search');
    Route::get('/chapter/edit/{id}',[Chapters::class,'edit'])->name('chapter-edit');
    Route::post('/chapter/update',[Chapters::class,'update'])->name('chapter-update');
    Route::get('/chapter/remove/{id}',[Chapters::class,'remove'])->name('chapter-remove');
    Route::get('/chapter/class/{id}',[Chapters::class,'chapters1'])->name('subject-chapters');

    Route::get('/topic/list',[Topics::class,'topicList'])->name('topic-list');
    Route::get('/topic/add',[Topics::class,'add'])->name('topic-add');
    Route::post('/topic/save',[Topics::class,'save'])->name('topic-save');
    Route::post('/topic/search',[Topics::class,'getTopics'])->name('topic-search');
    Route::get('/topic/edit/{id}',[Topics::class,'edit'])->name('topic-edit');
    Route::post('/topic/update',[Topics::class,'update'])->name('topic-update');
    Route::get('/topic/remove/{id}',[Topics::class,'remove'])->name('topic-remove');
    Route::get('/chapter/topics/{id}',[Topics::class,'topics1'])->name('chapter-topics');


    Route::get('/past/papers/list',[PastPaper::class,'papers'])->name('past-list');
    Route::get('/past/paper/add',[PastPaper::class,'add'])->name('past-add');
    Route::get('/get-paper/{id}',[PastPaper::class,'paperById'])->name('past-paper-get');
    Route::post('/past/paper/save',[PastPaper::class,'save'])->name('past-save');
    Route::post('/past/paper/search',[PastPaper::class,'search'])->name('past-search');
    Route::get('/past/paper/download/{id}',[PastPaper::class,'download'])->name('past-paper-download');
    Route::get('/past/paper/edit/{id}',[PastPaper::class,'edit'])->name('past-edit');
    Route::post('/past/paper/update',[PastPaper::class,'update'])->name('past-update');
    Route::get('/past/paper/remove/{id}',[PastPaper::class,'remove'])->name('past-remove');



    Route::get('/modals/list',[Extra::class,'extraList'])->name('extra-list');

    Route::post('/extra/add-board',[Extra::class,'addBoard'])->name('board-save');
    Route::get('/extra/get-board/{id}',[Extra::class,'editBoard'])->name('board-edit');
    Route::get('/extra/remove-board/{id}',[Extra::class,'removeBoard'])->name('board-remove');
    Route::post('/extra/update-board',[Extra::class,'updateBoard'])->name('board-update');

    Route::post('/extra/add-class',[Extra::class,'addClass'])->name('board-class-save');
    Route::get('/extra/edit-class/{id}',[Extra::class,'editClass'])->name('board-class-edit');
    Route::get('/extra/remove-class/{id}',[Extra::class,'removeClass'])->name('board-class-remove');
    Route::post('/extra/update-class',[Extra::class,'updateClass'])->name('board-class-update');

    Route::post('/extra/add-subject',[Extra::class,'addSubject'])->name('board-subject-save');
    Route::get('/extra/edit-subject/{id}',[Extra::class,'editSubject'])->name('board-subject-edit');
    Route::get('/extra/remove-subject/{id}',[Extra::class,'removeSubject'])->name('board-subject-remove');
    Route::post('/extra/update-subject',[Extra::class,'updateSubject'])->name('board-subject-update');

    Route::post('/extra/add-type',[Extra::class,'addType'])->name('type-save');
    Route::get('/extra/edit-type/{id}',[Extra::class,'editType'])->name('type-edit');
    Route::get('/extra/remove-type/{id}',[Extra::class,'removeType'])->name('type-remove');
    Route::post('/extra/update-type',[Extra::class,'updateType'])->name('type-update');

    Route::post('/extra/add-shift',[Extra::class,'addShift'])->name('shift-save');
    Route::get('/extra/edit-shift/{id}',[Extra::class,'editShift'])->name('shift-edit');
    Route::get('/extra/remove-shift/{id}',[Extra::class,'removeShift'])->name('shift-remove');
    Route::post('/extra/update-shift',[Extra::class,'updateShift'])->name('shift-update');


    Route::get('/prerequisites',[Prerequisite::class,'getList'])->name('pre-list');
    Route::post('/prerequisite/update',[Prerequisite::class,'update'])->name('pre-update');
    Route::post('/prerequisite/assign',[Prerequisite::class,'assignList'])->name('pre-assign');
    Route::post('/prerequisite/assign/save',[Prerequisite::class,'assign'])->name('pre-assign-save');
    Route::get('/prerequisite/edit/{id}/{type}',[Prerequisite::class,'edit'])->name('pre-edit');
    Route::get('/chapter/question-type/{id}',[Prerequisite::class,'questionTypes'])->name('chapter-QT');
    Route::get('/chapter/priority/{id}',[Prerequisite::class,'chPriorities'])->name('chapter-priority');


    Route::get('/question/add',[Question::class,'add'])->name('question-add');
    Route::post('/question/save',[Question::class,'save'])->name('question-save');
    Route::get('/questions/list',[Question::class,'searchQuestion'])->name('question-list');
    Route::post('/question/search',[Question::class,'search'])->name('question-search');
    Route::get('/question/remove/{id}',[Question::class,'remove'])->name('question-remove');
    Route::get('/question/edit/{id}',[Question::class,'edit'])->name('question-edit');
    Route::post('/question/update',[Question::class,'update'])->name('question-update');



    Route::get('/partial/fields/{type}/{lang}',[Partial::class,'shortOrLong'])->name('partial-fields');




    Route::get('/system/info',[System::class,'info'])->name('system-info');
    Route::post('/system/update',[System::class,'update'])->name('system-update');

});


Route::get('/',[ClientAuth::class,'login'])->name('client-login');
Route::post('/client/auth',[ClientAuth::class,'auth'])->name('client-auth');

Route::middleware('client')->group(function (){
    Route::get('/school/home',[ClientDashboard::class,'home'])->name('client-home');

    Route::get('/school/past-papers',[Past::class,'papers'])->name('client-past');
    Route::get('/school/past-papers/download/{paper}',[Past::class,'download'])->name('client-past-download');
    Route::post('/school/past-papers/search',[Past::class,'search'])->name('client-past-search');

    Route::get('/school/teachers',[Teacher::class,'teachers'])->name('client-teacher');
    Route::get('/school/my-profile',[Teacher::class,'profile'])->name('teacher-profile');
    Route::get('/school/new/teacher',[Teacher::class,'add'])->name('teacher-add');
    Route::post('/school/save/teacher',[Teacher::class,'save'])->name('teacher-save');
    Route::get('/school/edit/teacher/{id}',[Teacher::class,'edit'])->name('teacher-edit');
    Route::post('/school/update/teacher',[Teacher::class,'update'])->name('teacher-update');
    Route::get('/school/del/teacher/{id}',[Teacher::class,'remove'])->name('teacher-remove');
    Route::get('/school/change-password',[Teacher::class,'change'])->name('client-change-password');
    Route::post('/school/save-password',[Teacher::class,'password'])->name('client-save-password');
    Route::get('/school/logout',[Teacher::class,'logout'])->name('client-logout');

    Route::get('/generate/paper/getCourses',[Syllabus::class,'courses'])->name('client-courses');
    Route::post('/generate/paper/classes',[Syllabus::class,'classes'])->name('client-classes');
    Route::post('/generate/paper/subjects',[Syllabus::class,'subjects'])->name('client-subjects');
    Route::post('/generate/paper/chapters',[Syllabus::class,'chapters'])->name('client-chapter');

    Route::post('/generate/my-paper/',[Data::class,'questions'])->name('paper-generate');
    Route::get('/generate/paper-edit/{id}',[Data::class,'editPaper'])->name('edit-genPaper');

    Route::get('/generate/paper',[Generate::class,'index'])->name('my-paper-generate');
    Route::post('/paper/get-questions',[Generate::class,'generate'])->name('get-paper-question');
    Route::post('/paper/random-questions',[Generate::class,'randomQuestion'])->name('random-question');
    Route::post('/paper/select-question',[Generate::class,'selectQuestion'])->name('select-question');
    Route::post('/paper/add-question',[Generate::class,'addQuestion'])->name('add-question');
    Route::post('/paper/edit',[Generate::class,'edit'])->name('paper-edit');
    Route::post('/paper/cancel',[Generate::class,'cancel'])->name('paper-cancel');
    Route::post('/paper/remove-question',[Generate::class,'removeQuestion'])->name('remove-question');

    Route::get('/saved/papers',[Saved::class,'papers'])->name('saved-papers');
    Route::get('/paper/print/{paperId}',[Saved::class,'print'])->name('print-papers');
    Route::get('/paper/get-bubbles/{count}',[Saved::class,'bubbles'])->name('get-bubbles');
    
    Route::post('/paper/save-paper',[Saved::class,'save'])->name('save-paper');
    Route::post('/paper/paper-edit',[Saved::class,'edit'])->name('edit-saved-paper');
    Route::get('/paper/remove-paper/{paperId}',[Saved::class,'remove'])->name('remove-paper');
    Route::get('/show-paper/{paperId}',[Saved::class,'show'])->name('show-paper');
  


    Route::get('/school/setting',[Setting::class,'info'])->name('school-info');
    Route::post('/school/update',[Setting::class,'update'])->name('school-update');



});

