<?php

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

Route::get('/', ['as' => 'index', 'uses' => 'App\Http\Controllers\ResumeBuilder@index']);

// Education

Route::post('/addeducation', ['as' => 'addeducation', 'uses' => 'App\Http\Controllers\ResumeBuilder@addEducation']);

Route::get('/geteducation', ['as' => 'geteducation', 'uses' => 'App\Http\Controllers\ResumeBuilder@getEducation']);

Route::get('/deleteeducation/{id}', ['as' => 'deleteeducation', 'uses' => 'App\Http\Controllers\ResumeBuilder@deleteEducation']);

// Experience

Route::post('/addexperience', ['as' => 'addexperience', 'uses' => 'App\Http\Controllers\ResumeBuilder@addExperience']);

Route::get('/getexperience', ['as' => 'getexperience', 'uses' => 'App\Http\Controllers\ResumeBuilder@getExperience']);

Route::get('/deleteexperience/{id}', ['as' => 'deleteexperience', 'uses' => 'App\Http\Controllers\ResumeBuilder@deleteExperience']);

// Resume

Route::get('/resume/{session}', ['as' => 'resume', 'uses' => 'App\Http\Controllers\ResumeBuilder@viewResume']);



