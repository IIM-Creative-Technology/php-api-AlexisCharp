<?php

use App\Http\Controllers\AuthController;
use App\Models\Mark;
use App\Models\Professor;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('jwt.auth')->group(function () {
    // SCHOOLYEARS

    Route::get('/schoolyears', function () {
        return SchoolYear::all();
    });

    Route::get('/schoolyears/{schoolyearId}', function ($schoolyearId) {
        return SchoolYear::findOrFail($schoolyearId);
    });

    Route::put('/schoolyears/{schoolyearId}', function ($schoolyearId, Request $request) {
        $schoolyear = SchoolYear::findOrFail($schoolyearId);
        $schoolyear->update($request->all());
        return $schoolyear;
    });


    // STUDENTS

    Route::get('/students', function (Request $request) {
        if ($request->school_year) {
            return Student::where('school_year_id', $request->school_year)->get();
        }
        return Student::all();
    });

    Route::get('/students/{studentId}', function ($studentId) {
        return Student::findOrFail($studentId);
    });

    Route::post('/students', function (Request $request) {
        return Student::create($request->all());
    });

    Route::put('/students/{studentId}', function ($studentId, Request $request) {
        $student = Student::findOrFail($studentId);
        $student->update($request->all());
        return $student;
    });

    Route::delete('/students/{studentId}', function ($studentId) {
        return Student::findOrFail($studentId)->delete();
    });


    // PROFESSORS

    Route::get('/professors', function () {
        return Professor::all();
    });

    Route::get('/professors/{professorId}', function ($professorId) {
        return Professor::findOrFail($professorId);
    });

    Route::post('/professors', function (Request $request) {
        return Professor::create($request->all());
    });

    Route::put('/professors/{professorId}', function ($professorId, Request $request) {
        $professor = Professor::findOrFail($professorId);
        $professor->update($request->all());
        return $professor;
    });


    //SUBJECTS

    Route::get('/subjects', function () {
        return Subject::all();
    });

    Route::get('/subjects/{subjectId}', function ($subjectId) {
        return Subject::findOrFail($subjectId);
    });

    Route::post('/subjects', function (Request $request) {
        return Subject::create($request->all());
    });

    Route::put('/subjects/{subjectId}', function ($subjectId, Request $request) {
        $subject = Subject::findOrFail($subjectId);
        $subject->update($request->all());
        return $subject;
    });

    Route::delete('/subjects/{subjectId}', function ($subjectId) {
        return Subject::findOrFail($subjectId)->delete();
    });


    // MARKS

    Route::get('/marks', function (Request $request) {
        if ($request->student_id) {
            return Mark::where('student_id', $request->student_id)->get();
        }
        return Mark::all();
    });

    Route::get('/marks/{markId}', function ($markId) {
        return Mark::findOrFail($markId);
    });

    Route::post('/marks', function (Request $request) {
        return Mark::create($request->all());
    });

    Route::put('/marks/{markId}', function ($markId, Request $request) {
        $mark = Mark::findOrFail($markId);
        $mark->update($request->all());
        return $mark;
    });
});
