<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;

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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=> ['auth']], function(){
    //Panel de control
    Route::get('/home', [App\Hppt\Controllers\HomeController::class, 'index'])->name('home');
    //Products product
    // Route::resource('products', ProductController::class);
    // Route::get('changestatusproduct', [ProductController::class, 'changestatusproduct'])->name('changestatusproduct');
    //Customers customer
    Route::resource('customers', CustomerController::class);
    //Route::get('changestatuscustomer', [CustomerController::class, 'changestatuscustomer'])->name('changestatuscustomer');
    //Orders order
    // Route::resource('orders', OrderController::class);
    // Route::get('changestatusoder', [OrderController::class, 'changestatusorder'])->name('changestatusorder');
});

Route::get('/about', function () { 
    return 'Acerca de nosotros'; 
});

Route::get('/user/{id}', function ($id) { 
    return 'ID de usuario: ' . $id; 
});

Route::get('/contacto', function () { 
    return 'Página de contacto'; 
})->name('contacto');

Route::get('/usuario/{id}', function ($id) {
    return 'ID de usuario: ' . $id;
})->where('id', '[0-9]{3}');

Route::prefix('admin')->group(function () { 
    Route::get('/', function () { 
        return 'Panel de administración'; 
    }); 
    Route::get('/users', function () { 
        return 'Lista de usuarios'; 
    }); 
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test-db', function () {
    try {
        \DB::connection()->getPdo();
        return 'Conexión a la base de datos exitosa!';
    } catch (\Exception $e) {
        return 'No se pudo conectar a la base de datos: ' . $e->getMessage();
    }
});