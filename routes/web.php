<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DetailSelectionController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\SelectionController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('verificarCredenciales');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/customers', [CustomerController::class, 'index'])->name('listaCliente');
Route::post('/customers', [CustomerController::class, 'createOrUpdate'])->name('crearEditarCliente');

Route::get('/products', [ProductController::class, 'index'])->name('listaProducto');
Route::post('/products', [ProductController::class, 'createOrUpdate'])->name('crearEditarProducto');

Route::get('/qualitys', [QualityController::class, 'index'])->name('listaCalidad');
Route::post('/qualitys', [QualityController::class, 'createOrUpdate'])->name('crearEditarCalidad');

Route::get('/selections', [SelectionController::class, 'index'])->name('listaSelecciones');
Route::post('/selections-by-status/{id}', [SelectionController::class, 'getSelections'])->name('obtieneSelecciones');

Route::post('/selections/store', [SelectionController::class, 'store'])->name('crearSelecciones');
Route::get('/selections/edit/{id}', [SelectionController::class, 'edit'])->name('editarSeleccion');
Route::post('/selections/update/{id}', [SelectionController::class, 'update'])->name('actualizarSeleccion');

Route::post('/selections/details/store', [DetailSelectionController::class, 'store'])->name('crearDetalleSeleccion');
Route::get('/selections/details/{id}', [DetailSelectionController::class, 'show'])->name('verDetalleSeleccion');

Route::get('/loadView', [FilesController::class, 'loadView'])->name('loadView');
Route::post('/storeFile', [FilesController::class, 'storeFile'])->name('storeFile');
Route::get('/descargar/{name}', [FilesController::class, 'downloadFile'])->name('download');
Route::get('/seeFile/{name}', [FilesController::class, 'seeFile'])->name('seeFile');



Route::get('/register', function () {
    return view('authentication.signUp');
})->name('register');


// Route::get('/customers', function () {
//     return view('customers');
// })->name('customers');

Route::get('/dashq', function () {
    return view('dash-qualtum');
})->name('dashq');

// Route::get('/products', function () {
//     return view('products');
// })->name('products');

// Route::get('/requests', function () {
//     return view('requests');
// })->name('requests');

// Route::get('/requestsp', function () {
//     return view('requests_');
// })->name('requests_');

Route::get('/users', function () {
    return view('users');
})->name('users');

Route::get('/weblogs', function () {
    return view('weblogs');
})->name('weblogs');

// Route::get('/qconcerns', function () {
//     return view('quality-concern');
// })->name('qconcerns');
