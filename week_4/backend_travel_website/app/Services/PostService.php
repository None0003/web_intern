<?php

namespace App\Services;

use App\Repositories\PostRepositoryInterface;

class PostService implements PostServiceInterface
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        return $this->postRepository->all();
    }

    public function getPostById($id)
    {
        return $this->postRepository->findById($id);
    }

    public function getPostBySlug($slug)
    {
        return $this->postRepository->findBySlug($slug);
    }

    public function createPost(array $data)
    {
        return $this->postRepository->create($data);
    }

    public function updatePost($id, array $data)
    {
        return $this->postRepository->update($id, $data);
    }

    public function deletePost($id)
    {
        return $this->postRepository->delete($id);
    }
    public function storeDraft($slug, array $data)
    {
        return $this->postRepository->storeDraft($slug, $data);
    }

    public function updateDraft($slug, array $data)
    {
        return $this->postRepository->updateDraft($slug, $data);
    }
}
