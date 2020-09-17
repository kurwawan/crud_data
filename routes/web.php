<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;


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
//     return view('resume');
// });

// Route::get('/', 'ResumeController@index');
Route::get('/', [ResumeController::class, 'index']);
Route::get('/resumes/create', [ResumeController::class, 'create']);

Route::post('/resumes', [ResumeController::class, 'store']);

Route::get('/resumes/{id}/edit', [ResumeController::class, 'edit']);

Route::patch('/resumes/{id}', [ResumeController::class, 'update']);

Route::delete('/resumes/{id}', [ResumeController::class, 'destroy']);

Route::get('laporan-pdf', [ResumeController::class, 'pdf']);

