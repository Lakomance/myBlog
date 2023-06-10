<?php

namespace App\Service\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class StoreService
{
    public function storePost(mixed $data): Post|string {

        if (isset($data['preview_image'])) $data['preview_image'] = Storage::disk('public')->put('', $data['preview_image']);

        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        try {
            DB::beginTransaction();

            $userId = auth("web")->user()->id;
            $data['user_id'] = $userId;

            $post = Post::create($data);
            if(isset($tags)) $post->tags()->attach($tags);

            DB::commit();
            return $post;
        }
        catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
