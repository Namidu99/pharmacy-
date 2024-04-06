<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
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
 
Route::get('/', function () {
    return view('home');
})->name('home');
 
Route::get('/about', [UserController::class, 'about'])->name('about');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
//Nomal user Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
});
 
//owner Routes List
Route::middleware(['auth', 'user-access:owner'])->group(function () {
    Route::get('/owner/home', [HomeController::class, 'OwnerHome'])->name('owner/home');
 
    Route::get('/owner/profile', [OwnerController::class, 'profilepage'])->name('owner/profile');
 
    Route::get('/owner/products', [ProductController::class, 'index'])->name('owner/products');
    Route::get('/owner/products/create', [ProductController::class, 'create'])->name('owner/products/create');
    Route::post('/owner/products/store', [ProductController::class, 'store'])->name('owner/products/store');
    Route::get('/owner/products/show/{id}', [ProductController::class, 'show'])->name('owner/products/show');
    Route::get('/owner/products/edit/{id}', [ProductController::class, 'edit'])->name('owner/products/edit');
    Route::put('/owner/products/edit/{id}', [ProductController::class, 'update'])->name('owner/products/update');
    Route::delete('/owner/products/destroy/{id}', [ProductController::class, 'destroy'])->name('owner/products/destroy');

    Route::get('/owner/customers', [CustomerController::class, 'index'])->name('owner/customers');
    Route::get('/owner/customers/create', [CustomerController::class, 'create'])->name('owner/customers/create');
    Route::post('/owner/customers/store', [CustomerController::class, 'store'])->name('owner/customers/store');
    Route::get('/owner/customers/show/{id}', [CustomerController::class, 'show'])->name('owner/customers/show');
    Route::get('/owner/customers/edit/{id}', [CustomerController::class, 'edit'])->name('owner/customers/edit');
    Route::put('/owner/customers/edit/{id}', [CustomerController::class, 'update'])->name('owner/customers/update');
    Route::delete('/owner/customers/destroy/{id}', [CustomerController::class, 'destroy'])->name('owner/customers/destroy');
});

//manager Routes List
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'ManagerHome'])->name('manager/home');
 
    Route::get('/manager/profile', [OwnerController::class, 'profilepage'])->name('manager/profile');
 
    Route::get('/manager/products', [ProductController::class, 'index'])->name('manager/products');
    Route::get('/manager/products/show/{id}', [ProductController::class, 'show'])->name('manager/products/show');
     

    Route::get('/manager/customers', [CustomerController::class, 'index'])->name('manager/customers');
    Route::get('/manager/customers/show/{id}', [CustomerController::class, 'show'])->name('manager/customers/show');
    Route::get('/manager/customers/edit/{id}', [CustomerController::class, 'edit'])->name('manager/customers/edit');
    Route::put('/manager/customers/edit/{id}', [CustomerController::class, 'update'])->name('manager/customers/update');
    Route::delete('/manager/customers/destroy/{id}', [CustomerController::class, 'destroy'])->name('manager/customers/destroy');
});

//Cashier Routes List
Route::middleware(['auth', 'user-access:cashier'])->group(function () {
    Route::get('/cashier/home', [HomeController::class, 'CashierHome'])->name('cashier/home');
 
    Route::get('/cashier/profile', [OwnerController::class, 'profilepage'])->name('cashier/profile');
 
    Route::get('/cashier/products', [ProductController::class, 'index'])->name('cashier/products');
    Route::get('/cashier/products/show/{id}', [ProductController::class, 'show'])->name('cashier/products/show');
    Route::get('/cashier/products/edit/{id}', [ProductController::class, 'edit'])->name('cashier/products/edit');
    Route::put('/cashier/products/edit/{id}', [ProductController::class, 'update'])->name('cashier/products/update');
    Route::delete('/cashier/products/destroy/{id}', [ProductController::class, 'destroy'])->name('cashier/products/destroy');

    Route::get('/cashier/customers', [CustomerController::class, 'index'])->name('cashier/customers');
    Route::get('/cashier/customers/show/{id}', [CustomerController::class, 'show'])->name('cashier/customers/show');
    
});