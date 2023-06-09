<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(PostRequest $request)
    {
        $data = $request->validated();
        $post = $this->service->storePost($data);
        if ($post instanceof Post) {
            return redirect()->route('post.show', $post->id);
        } else {
            return redirect()->withErrors($post);
        }
    }
}
