<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController; //Sirve para indicar directorios de los cuales vayamos a usar archivos dentros suyos
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('contacto', 'contact')->name('contact');

/*Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::patch('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');*/

Route::resource('categories', CategoryController::class)
    ->names('categories')
    ->parameters(['categories' => 'category']);



Route::get('blog/my-posts', [PostController::class, 'myPosts'])->name('posts.my-posts');
        /*->middleware(function ($request, $next) {
            return (new CheckUserRole)->handle($request, $next);
        }); //Esto es para middleware anonimos que no estan registrados en el Kernel PHP*/

Route::resource('blog', PostController::class)
    ->names('posts')
    ->parameters(['blog' => 'post']);

Route::view('nosotros', 'about')->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
