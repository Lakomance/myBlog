<?php

namespace App\Http\Controllers\Post\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = Post::all()->where('category_id', '=', $category->id);
        return view('post.category.index', compact('posts', 'category'));
    }
}
