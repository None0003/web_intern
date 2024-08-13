<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::all();
    }

    public function findById($id)
    {
        return Post::find($id);
    }

    public function findBySlug($slug)
    {
        return Post::where('slug', $slug)->first();
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update($id, array $data)
    {
        $post = $this->findById($id);
        if ($post) {
            $post->update($data);
            return $post;
        }
        return null;
    }

    public function delete($id)
    {
        $post = $this->findById($id);
        if ($post) {
            $post->delete();
            return true;
        }
        return false;
    }

    public function storeDraft($slug, array $data)
    {
        $post = $this->findBySlug($slug);

        if ($post) {
            $post->draft = $data;
            $post->save();
            return $post;
        }

        return null;
    }

    public function updateDraft($slug, array $data)
    {
        $post = $this->findBySlug($slug);

        if ($post) {
            $post->draft = $data;
            $post->save();
            return $post;
        }

        return null;
    }
}
