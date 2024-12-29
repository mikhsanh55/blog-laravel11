<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Blog::with('user')->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $blog = Blog::create($validated);

        return response()->json(['message' => 'Blog created successfully', 'blog' => $blog], 201);
    }

    public function show($id)
    {
        $blog = Blog::with('user')->findOrFail($id);
        return response()->json($blog, 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update($validated);

        return response()->json(['message' => 'Blog updated successfully', 'blog' => $blog], 200);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json(['message' => 'Blog deleted successfully'], 200);
    }
}
