<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/dashboard', function () {
    return view('dashbord_layout');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/addcategoryPage', [CategoryController::class, 'create'])->name("addCategoryUi");
Route::post('addcategoryPage',[CategoryController::class, 'store'])->name('addCategoryOnTable');
Route::get('/allCategory', [CategoryController::class, 'index'])->name("getallCategory");
Route::delete('/deleteCategory/{id}', [CategoryController::class, 'destroy'])->name("deleteCategroy");
Route::get('/editCateorgy/{id}', [CategoryController::class, 'edit'])->name("editPageUi");
Route::put('/updateCategorye/{id}', [CategoryController::class, 'update'])->name("updateCategory");



require __DIR__.'/auth.php';
