<?php

use App\Data\ArticlesData;
use App\Http\Controllers\BlogsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

$blogs = ArticlesData::getArticles();
$categories = ArticlesData::getCategories();

Route::get('/', function (Request $request) use ($blogs, $categories) {
    return view('blogs.index', [
        'blogs' => $blogs,
        'categories' => $categories,
        'request' => $request
    ]);
})->name("home");

Route::get("/a-propos", function () use ($categories) {
    return view("blogs.about", [
        'categories' => $categories
    ]);
})->name("about");

// Register Admin Routes
Route::prefix('admin')->middleware('admin')->group(function () use ($blogs) {
    Route::get('/dashboard', function () use ($blogs) {
        return view("admin.dashboard", [
            'blogs' => $blogs
        ]);
    })->name("dashboard");

    Route::get('/profile', function () {
        return view("admin.profile");
    });

    Route::get('/articles/view/{slug}', function (Request $request) {
        $articleSlug = $request->slug;
        $blog = ArticlesData::getArticleBySlug($articleSlug);

        return view("admin.show", [
            'blog' => $blog
        ]);
    });
});


// Register Blogs Resource
Route::resource("blogs", BlogsController::class);
