<?php

namespace App\Services;

interface PostServiceInterface
{
    public function getAllPosts();
    public function getPostById($id);
    public function getPostBySlug($slug);
    public function createPost(array $data);
    public function updatePost($id, array $data);
    public function deletePost($id);
    public function storeDraft($slug, array $data);
    public function updateDraft($slug, array $data);
}
