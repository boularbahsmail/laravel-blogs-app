<?php

namespace App\Http\Controllers;

use App\Data\ArticlesData;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = ArticlesData::getArticles();
        return view('blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    public function show($slug)
    {
        $blog = ArticlesData::getArticleBySlug($slug);
        $categories = ArticlesData::getCategories();
        if (!$blog) {
            abort(404);
        }
        return view('blogs.show', [
            'blog' => $blog,
            'categories' => $categories
        ]);
    }
}
