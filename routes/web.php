

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DropdownController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentAdminController;
// use App\Http\Controllers\Admin\DocumentAdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/add', function () {
    return view('employee.add');
});

// BACKOFFICE
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/list/{id}/options', [DashboardController::class, 'list'])->middleware(['auth'])->name('list.services');
Route::get('/show/{id}/option', [DashboardController::class, 'show'])->middleware(['auth'])->name('show.service');

//download
Route::get('/users/{id}/cv/download', [UserController::class, 'download'])->name('users.cv.download');

Route::get('department/{id}', [DropdownController::class, 'department']);

Route::middleware('auth')->group(function () {
    // Gestion des données
    Route::resource('/admin/users', UserController::class);
    Route::patch('status/{user}', [UserController::class, 'updateStatus'])->name('admin.users.status');
    Route::resource('/admin/documents', DocumentAdminController::class);
    //download
    Route::get('/documents/{id}/file/download', [DocumentController::class, 'download'])->name('front.documents.download');
   
   
    Route::view('admin/categories/','admin.categories.index')->name('admin.categories.list');
    Route::view('admin/departments/','admin.departments.index')->name('admin.departments.list');
    Route::view('admin/options/','admin.options.index')->name('admin.options.list');

    // Route::resource('users', UserController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ____________________________________________________________

// FrontOFFICE
// employee section

Route::controller(DocumentController::class)->group(function () {
    Route::get('/', 'index')->name('welcome');
    Route::post('/search', 'search')->name('search');
    Route::get('documents/{document:slug}', 'show')->name('details');
});
//dropddown dependant
Route::get('dropdownlist/searchYourdepartment/{id}', [EmployeeController::class, 'searchYourDepartment']);


require __DIR__ . '/auth.php';
