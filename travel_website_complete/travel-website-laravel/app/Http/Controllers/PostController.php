<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function showByID($id)
    {
        $post = Post::findOrFail($id);

        return response()->json([
            'status_code' => 200,
            'post' => $post
        ]);
    }

    public function showBySlug($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return response()->json([
            'status_code' => 200,
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'content' => 'nullable|string',
            'status' => 'required|array',
            'status.*' => 'integer|in:1,2,4', // Ensure each status is valid
            'image' => 'nullable|string|max:255',
        ]);

        // Convert status array to bitwise value
        $statusValue = 0;
        foreach ($validatedData['status'] as $status) {
            $statusValue |= $status;
        }

        // Create a new post
        $post = Post::create([
            'category_id' => $validatedData['category_id'],
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'content' => $validatedData['content'],
            'status' => $statusValue, // Save status as bitwise value
            'image' => $validatedData['image'] ?? '',
            'draft' => json_encode([
                'category_id' => $validatedData['category_id'],
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'content' => $validatedData['content'],
                'status' => $statusValue
            ]),
        ]);

        return response()->json([
            'status_code' => 201,
            'message' => 'Post created successfully',
            'post' => $post,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $id,
            'content' => 'nullable|string',
            'status' => 'required|array',
            'status.*' => 'integer|in:1,2,4', // Ensure each status is valid
            'image' => 'nullable|string|max:255',
        ]);

        // Convert status array to bitwise value
        $statusValue = 0;
        foreach ($validatedData['status'] as $status) {
            $statusValue |= $status;
        }

        // Update the post
        $post->update([
            'category_id' => $validatedData['category_id'],
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'content' => $validatedData['content'],
            'status' => $statusValue, // Save status as bitwise value
            'image' => $validatedData['image'] ?? '',
            'draft' => json_encode([
                'category_id' => $validatedData['category_id'],
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'],
                'content' => $validatedData['content'],
                'status' => $statusValue
            ]),
        ]);

        return response()->json([
            'status_code' => 200,
            'message' => 'Post updated successfully',
            'post' => $post,
        ]);
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();

        return response()->json([
            'status_code' => 200,
            'message' => 'Post deleted successfully',
        ]);
    }
}
