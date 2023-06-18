<?php

namespace App\Service\Post\Comment;

use App\Models\Comment;
use App\Models\Post;

class StoreService
{
    public function storeComment(Post $post, array $data): Comment|string {
        $data['post_id'] = $post->id;
        $data['user_id'] = auth("web")->user()->id;
        return Comment::create($data);
    }
}
