<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
    public function all();
    public function findById($id);
    public function findBySlug($slug);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function storeDraft($slug, array $data);
    public function updateDraft($slug, array $data);
}
