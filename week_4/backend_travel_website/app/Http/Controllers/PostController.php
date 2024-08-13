<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostServiceInterface;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = $this->postService->getPostBySlug($slug);
        if ($post) {
            return response()->json($post);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:posts',
            'content' => 'required|string',
        ]);

        $post = $this->postService->createPost($validated);
        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
            'slug' => 'nullable|string|unique:posts,slug,' . $id,
            'content' => 'nullable|string',
        ]);

        $post = $this->postService->updatePost($id, $validated);
        if ($post) {
            return response()->json($post);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }

    public function destroy($id)
    {
        if ($this->postService->deletePost($id)) {
            return response()->json(['message' => 'Post deleted']);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }

    public function storeDraft(Request $request, $slug)
    {
        $validated = $request->validate([
            'draft' => 'required|array',
        ]);

        $post = $this->postService->storeDraft($slug, $validated['draft']);

        if ($post) {
            return response()->json($post);
        }

        return response()->json(['message' => 'Post not found'], 404);
    }

    public function updateDraft(Request $request, $slug)
    {
        $validated = $request->validate([
            'draft' => 'required|array',
        ]);

        $post = $this->postService->updateDraft($slug, $validated['draft']);

        if ($post) {
            return response()->json($post);
        }

        return response()->json(['message' => 'Post not found'], 404);
    }
}
