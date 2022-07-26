<?php
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\VetHomeController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\VerifyVetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
  
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
  
Route::get('/', function () {
    return view('index');
});
Route::get('/verifyvet', [VerifyVetController::class, 'index']);
Route::put('/verifyvet', [VerifyVetController::class, 'verifyVet'])->name('verify.vet');
Route::get('/admin/login', [LoginController::class, 'adminLoginView']);
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
// Auth::routes();
Auth::routes(['verify' => true]);


// Route::post('/login', [LoginController::class, 'userLogin'])->name('userLogin');
// Route::post('userLogin', [ 'as' => 'login', 'uses' => 'LoginController@userLogin']);
// Route::post('/login', [LoginController::class, 'vetLogin'])->name('vetLogin');
// Route::post('/login', [LoginController::class, 'adminLogin'])->name('adminLogin');
// Route::post('/register', [RegisterController::class, 'createUser'])->name('createUser');
// Route::post('/register', [RegisterController::class, 'createVet'])->name('createVet');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/edit', [EditController::class, 'index'])->name('edit');
    Route::put('/edit', [EditController::class, 'updateProfile'])->name('edit.updateProfile');
});
  

/*------------------------------------------
--------------------------------------------
All Vet Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:vet','vet-verify'])->group(function () {
    Route::get('/vet/show/{user_id}', [ShowController::class, 'userProfile']);
    Route::get('/vet/home', [VetHomeController::class, 'index'])->name('vet.home');
});


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::post('/admin/home', [VerifyVetController::class, 'invokeVerify'])->name('invoke.verify_action');
});
  

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
