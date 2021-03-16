<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
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
    return view('welcome');
});
Route::get('dog', function () {
    return view('dog');
});
Route::get('randombreed', function () {
    return view('randombreed');
});
Route::get('savebreed', function () {
    return view('savebreed');
});
Route::get('userbreed',[ DogController::class,'userBSelect'])->name('userbreed');
Route::get('selectbreedimage', [DogController::class, 'getbreedlist'])->name('breed.list');
Route::post('dog/list', [DogController::class, 'index'])->name('dog.list');
Route::post('dog/random', [DogController::class, 'randomBreed'])->name('dog.random');
Route::post('dog/image', [DogController::class, 'selectBreedImage'])->name('dog.image');
Route::post('dog/save', [DogController::class, 'saveBreed'])->name('dog.save');
Route::post('user/breed/save', [DogController::class, 'saveBUser'])->name('user.breed.save');


