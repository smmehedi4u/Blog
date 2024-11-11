<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    // Display a listing of the posts
    public function index()
    {

        $posts = Post::where('user_id', Auth::id())->get(); // Only show posts by logged-in user
        return view('home.user.index', compact('posts'));
    }


    // Show the form for creating a new post
    public function create()
    {
        return view('home.user.create');
    }

    // Store a newly created post in the database
    public function store(Request $request, Post $posts)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        // Create a new post
        $posts->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'name' => Auth::user()->name,
            'user_type' => 'user',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    // Display a specific post
    public function show(Post $post)
    {
        return view('home.user.show', compact('post'));
    }

    // Show the form for editing the specified post
    public function edit(Post $post)
    {
        return view('home.user.edit', compact('post'));
    }

    // Update the specified post in the database
    public function update(Request $request, Post $post)
    {

    $request->validate([
        'title' => 'required|max:255',
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

    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
 }

    // Remove the specified post from the database
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
     }
}
