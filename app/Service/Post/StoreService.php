<?php

namespace App\Service\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class StoreService
{
    public function storePost(mixed $data): Post|string {

        $data = $this->validateImage($data);
        $tags = $this->validateTags($data);

        try {
            DB::beginTransaction();

            $userId = auth("web")->user()->id;
            $data['user_id'] = $userId;

            $post = Post::create($data);
            if(isset($tags)) $post->tags()->attach($tags);

            DB::commit();
            return $post;
        }
        catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function updatePost(mixed $data, Post $post): Post|string {

        $data = $this->validateImage($data);
        $tags = $this->validateTags($data);

        try {
            DB::beginTransaction();

            $post->update($data);
            if(isset($tags)) $post->tags()->sync($tags);

            DB::commit();
            return $post;
        }
        catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function destroyPost(Post $post) {
        $post->delete();
    }

    public function validateImage(mixed $data): mixed {
        if (isset($data['preview_image'])) $data['preview_image'] = Storage::disk('public')->put('', $data['preview_image']);
        return $data;
    }

    public function validateTags(mixed &$data): array|null {
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
            return $tags;
        }
        return null;
    }
}
