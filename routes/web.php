<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\PadresController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\SeccionController;

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
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//modulo dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//modulo estudiantes
Route::get('/student', [EstudiantesController::class, 'index'])->name('student.index');

/////////////////////////////////MODULO PADRES DE FAMILIA//////////////////////////////////
Route::post('/parents/doc', [PadresController::class, 'savedocument'])->name('parents.documento');
Route::get('/parents/download/{archivo}', [PadresController::class, 'download'])->name('download.document');
Route::get('/delete/{id}', [PadresController::class, 'delete'])->name('delete.document');
///////////
Route::get('/parents', [PadresController::class, 'index'])->name('parents.index');
Route::get('/parents/create', [PadresController::class, 'create'])->name('parents.create');
Route::post('/parents/create', [PadresController::class, 'store'])->name('parents.guardar');
Route::post('/parents/switch/{id}', [PadresController::class, 'switch'])->name('parents.switch');
Route::get('/parents/{id}/edit', [PadresController::class, 'edit'])->name('parents.edit');
Route::post('/parents/{id}', [PadresController::class, 'update'])->name('parents.update');
Route::delete('/parents/delete/{id}', [PadresController::class, 'destroy'])->name('parents.destroy');

Route::get('/parents/{id}/view', [PadresController::class, 'show'])->name('parents.view');


//////////////////////////////////MODULO DOCENTES/////////////////////////////////////////
Route::post('/teacher/documento', [DocentesController::class, 'SaveDocumento'])->name('teacher.documentos');
Route::get('/teacher/download/{archivo}', [DocentesController::class, 'download'])->name('download.teacher');
Route::get('/delete_doc/{id}', [DocentesController::class, 'delete'])->name('delete.teacher');
/////////////////
Route::get('/teacher', [DocentesController::class, 'index'])->name('teacher.index');
Route::get('/teacher/create', [DocentesController::class, 'create'])->name('teacher.create');
Route::post('/teacher/create', [DocentesController::class, 'store'])->name('teacher.guardar');
Route::get('/teacher/{id}/edit', [DocentesController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/{id}', [DocentesController::class, 'update'])->name('teacher.update');
Route::post('/teacher/switch/{id}', [DocentesController::class, 'switch'])->name('teacher.switch');
Route::get('/teacher/{id}/view', [DocentesController::class, 'show'])->name('teacher.view');
Route::delete('/teacher/delete/{id}', [DocentesController::class, 'destroy'])->name('teacher.destroy');


//pdf docente
Route::get('/teacher/pdf', [DocentesController::class, 'pdf'])->name('descargarPDF');
//excel docente
Route::get('/teacher/excel', [DocentesController::class, 'excel'])->name('descargarEXCEL');

////////////////////////////////MODULO DE GRADO /////////////////////////////////////////////
Route::get('/grade', [GradoController::class, 'index'])->name('grade.index');
Route::get('/grade/create', [GradoController::class, 'create'])->name('grade.create');
Route::post('/grade/create', [GradoController::class, 'store'])->name('grade.guardar');



////////////////////////////////MODULO DE SECCION /////////////////////////////////////////////
Route::get('/section', [SeccionController::class, 'index'])->name('section.index');