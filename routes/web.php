<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
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
// Route::get('user', function () {
//     return '<h1>User!<h1>';
// }); 
// // Route::get('welcome/name','HelloController@showHello');
// Route::get('welcome/name', [HelloController::class, 'showHello']);
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [RestaurantController::class, 'index']);

//การสร้าง route
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/member',[MemberController::class,'index'])->name('member');
Route::get('/admin',[AdminController::class,'index'])->name('admin')->middleware('check');
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::post('/search', [RestaurantController::class, 'search']);
// Route::get('/member',function(){
//     return view('member.index');
// });
// Route::get('/admin',function(){
//     return view('admin.index');
// });

// Route::get('/test',function(){
//     echo "<h1>James Natthapong</h1>";
//     echo "Hello Laravel8";
// });
// Route::get('/users/{fname}/{lname}',function($fname,$lname){
//     echo "<h1>ชื่อจริง : $fname</h1>";
//     echo "<h1>นามสกุล : $lname</h1>";
// });

