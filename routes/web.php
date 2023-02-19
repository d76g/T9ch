<?php

use App\Http\Controllers\CategoryList;
use App\Http\Controllers\Catergories;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\BlogCategory as AdminBlogCategory;
use App\Http\Livewire\Admin\Blogs;
use App\Http\Livewire\BlogCategory;
use App\Http\Livewire\Blogs\Index;
use App\Http\Livewire\Blogs\SingleBlog;
use App\Http\Livewire\Blogs\SingleCategory;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

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
// Guest Routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/blogs', Index::class)->name('blogs');
Route::get('/blog/{slug}', SingleBlog::class);
Route::get('category/{category}', SingleCategory::class);
// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/category', AdminBlogCategory::class)->name('category');
    Route::get('/blogs', Blogs::class)->name('adminBlogs');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});
// Other Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
