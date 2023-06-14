<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Redirect;

class UpdateController extends BaseController
{
    public function __invoke(PostRequest $request, Post $post)
    {
        $this->authorize('view', [auth("web")->user(), $post]);
        $data = $request->validated();
        $post = $this->service->updatePost($data, $post);
        if ($post instanceof Post) {
            return redirect()->route('post.show', $post->id);
        } else {
            return Redirect::back()->withErrors($post);
        }
    }
}
