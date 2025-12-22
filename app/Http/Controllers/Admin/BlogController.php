<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = \App\Models\Blog::with('category', 'user')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/blog', 'public');
        }

        \App\Models\Blog::create([
            'title' => $request->title,
            'slug' => \Illuminate\Support\Str::slug($request->slug),
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'status' => $request->status ? 1 : 0,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.blog.index')->with('status', 'Blog created successfully!');
    }

    public function edit(string $id)
    {
        $blog = \App\Models\Blog::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,'.$id,
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = \App\Models\Blog::findOrFail($id);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/blog', 'public');
            $blog->image = $imagePath;
        }

        $blog->title = $request->title;
        $blog->slug = \Illuminate\Support\Str::slug($request->slug);
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->category_id = $request->category_id;
        $blog->status = $request->status ? 1 : 0;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('status', 'Blog updated successfully!');
    }

    public function destroy(string $id)
    {
        $blog = \App\Models\Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('status', 'Blog deleted successfully!');
    }
}
