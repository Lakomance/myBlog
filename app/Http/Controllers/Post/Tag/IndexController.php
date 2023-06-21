<?php

namespace App\Http\Controllers\Post\Tag;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $postIds = DB::table('post_tags')->where('tag_id', '=', $tag->id)->get()->pluck('post_id');
        $posts = Post::find($postIds);
        return view('post.tag.index', compact('posts', 'tag'));
    }
}
