<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'name' => Auth::user()->name,
            'user_id' => Auth::id(),
            'post_status' => 'published',
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Fetch all posts
        $posts = Post::all();
        // dd($posts);

        // Pass posts data to the view
        return view('admin.posts_index', compact('posts'));
    }


    public function details(Post $post)
    {
        return view('home.posts_details', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
         // Validate the input
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image update
        $imageName = $post->image; // Keep the old image by default

            if ($request->hasFile('image')) {
            // If the user uploaded a new image, delete the old one and upload the new image
            if ($post->image) {
                if (file_exists(public_path('images/' . $post->image))) {
                    unlink(public_path('images/' . $post->image));
                }
            }

            // Store new image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        // Update post
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete the post image from storage (if exists)
        if ($post->image && File::exists(public_path('images/' . $post->image))) {
            File::delete(public_path('images/' . $post->image));
        }

        // Delete the post
        $post->delete();

        // Redirect back with a success message
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');

    }

    public function acceptPost(Post $post)
    {
        $post->update(['post_status' => 'published']);
        return redirect()->route('admin.posts.index')->with('success', 'Post accepted successfully!');
    }

    public function rejectPost(Post $post)
    {
        $post->update(['post_status' => 'draft']);
        return redirect()->route('admin.posts.index')->with('success', 'Post rejected successfully!');
    }


}
