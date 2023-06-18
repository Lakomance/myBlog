<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Post $post, Request $request)
    {
        $data = $request->validate(['message' => 'required|string']);
        $comment = $this->service->storeComment($post, $data);

        if ($comment instanceof Comment) {
            return redirect()->route('post.show', $post->id);
        }
        else {
            return redirect()->withErrors($post);
        }
    }
}
