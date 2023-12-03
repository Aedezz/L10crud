<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AdddNisController;
use App\Http\Controllers\AddKelasController;
// use App\Http\Controllers\AddPetugasController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

// routes/web.php

Auth::routes();

// Define the 'user.dashboard' route
// Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');
// Your existing routes
Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

// Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// LOGIN
// Route::middleware(['isLogin'])->group(function () {
//     // route yang diinginkan
//     Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [AuthController::class, 'login']);
//     });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['isLogin'])->group(function () {
    Route::get('user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    // Add other authenticated routes here
});
// // Admin Routes
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::delete('/admin/posts/{postId}', [AdminController::class, 'deletePost']);
//     Route::get('/admin/posts/{postId}/edit', [AdminController::class, 'editPost']);
//     Route::get('/admin/posts/{postId}', [AdminController::class, 'viewPost']);
// });

// // User Routes
// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
// });

// BOOK/DATA TRANSAKSI
Route::resource('book', BookController::class);
Route::post('/books/getfield', [BookController::class, 'getfield'])->name('books.getfield');

Route::match(['get', 'post'], '/book/search', [BookController::class, 'search'])->name('search.books');

// NIS
Route::resource('/addnis', AdddNisController::class);

// KELAS
Route::resource('/addkelas', AddKelasController::class);


Route::get('/dashboard',[DashboardController::class, 'index']);


// Route::get('/book/add', [BookController::class]);