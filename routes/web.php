<?php

use function Pest\Laravel\get;

use App\Http\Controllers\LocalizationController;
use App\Http\Livewire\Admin\Blogs;
use App\Http\Livewire\Blogs\Index;
use App\Http\Livewire\Pages\AboutMe;
use App\Http\Livewire\Admin\EditBlog;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Blogs\SingleBlog;
use App\Http\Livewire\Blogs\SingleHashtag;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Blogs\SingleCategory;
use App\Http\Livewire\Admin\Pages\Achievements;

use App\Http\Livewire\Admin\AboutMe as AdminAboutMe;
use App\Http\Livewire\Admin\BlogCategory as AdminBlogCategory;
use App\Http\Livewire\Admin\Pages\CurrentCourse;
use App\Http\Livewire\Admin\Pages\Edit\EditProfile;
use App\Http\Livewire\Admin\Pages\Profile;
use App\Http\Livewire\Admin\Pages\Skills;
use App\Http\Livewire\Admin\Pages\WorkExperience;
use App\Http\Livewire\Pages\AllCategories;
use App\Http\Livewire\Pages\AllHashtags;

// Guest Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/blogs', Index::class)->name('blogs');
Route::get('/blog/{slug}', SingleBlog::class);
Route::get('category/{slug:slug}', SingleCategory::class);
Route::get('hashtag/{hashtag:name}', SingleHashtag::class)->name('hashtag');
Route::get('/all-categories', AllCategories::class)->name('allCategories');
Route::get('/all-hashtags', AllHashtags::class)->name('allHashtags');
Route::get('/about', AboutMe::class)->name('about');
// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/category', AdminBlogCategory::class)->name('category');
    Route::get('/about-me', AdminAboutMe::class)->name('aboutMe');
    Route::get('/about-me/profile', Profile::class)->name('myProfile');
    Route::get('/about-me/profile/{id}/edit', EditProfile::class)->name('editMyProfile');
    Route::get('/about-me/work-experience', WorkExperience::class)->name('myWorkExperience');
    Route::get('/about-me/achievements', Achievements::class)->name('myAchievements');
    Route::get('/about-me/skills', Skills::class)->name('mySkills');
    Route::get('/about-me/current-course', CurrentCourse::class)->name('myCourses');
    Route::get('/blogs', Blogs::class)->name('adminBlogs');
    Route::get('/blog/{id}/edit', EditBlog::class)->name('editBlog');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});
// Other Routes
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
