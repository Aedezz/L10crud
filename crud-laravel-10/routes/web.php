<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AdddNisController;
use App\Http\Controllers\AddKelasController;
use App\Http\Controllers\AddPetugasController;
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
Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');

// Your existing routes
Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);



Route::resource('book', BookController::class);
Route::post('/books/getfield', [BookController::class, 'getfield'])->name('books.getfield');

Route::match(['get', 'post'], '/book/search', [BookController::class, 'search'])->name('search.books');

// NIS
Route::resource('/addnis', AdddNisController::class);

// KELAS
Route::resource('/addkelas', AddKelasController::class);


Route::get('/dashboard',[DashboardController::class, 'index']);


// Route::get('/book/add', [BookController::class]);