<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCoursesController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ReportsController;

use App\Http\Livewire\courses\CourseStudents;
use App\Http\Livewire\periods\PeriodCourses;
use App\Http\Livewire\students\StudentsCourses;
use App\Http\Livewire\teachers\TeacherCourses;
use Illuminate\Support\Facades\Route;


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

Route::get('/', HomeController::class)->middleware('auth')->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('periods', PeriodController::class)->middleware('auth')->names('periods');

Route::get('period-courses/{period}', PeriodCourses::class)->middleware('auth')->name('period-courses');



Route::resource('courses', CourseController::class)->middleware('auth')->names('courses');

Route::get('course-students/{course}', CourseStudents::class)->middleware('auth')->name('course-students');



Route::resource('teachers', TeacherController::class)->middleware('auth')->names('teachers');

Route::get('teachers-courses/{teacher}', TeacherCourses::class)->middleware('auth')->name('teachers-courses');

Route::get('teachers-list-excel', [ReportsController::class, 'TeachersExcel'])->middleware('auth')->name('teachers-excel');




Route::resource('students', StudentController::class)->middleware('auth')->names('students');

Route::get('student-courses/{student}', StudentsCourses::class)->middleware('auth')->name('student-courses');

Route::get('students-list-excel', [ReportsController::class, 'StudentsExcel'])->middleware('auth')->name('students-excel');



Route::get('student-course/{student}/add', [StudentCoursesController::class, 'index'])->middleware('auth')->name('student-course-add');

Route::post('student-course/save', [StudentCoursesController::class, 'save'])->middleware('auth')->name('student-course-save');


//Route::get('course/{course}/add', StudentsAdd::class)->middleware('auth')->name('course-add');