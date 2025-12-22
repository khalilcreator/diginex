<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $services = \App\Models\Service::orderBy('position')->take(6)->get(); // Show top 6
        $blogs = \App\Models\Blog::where('status', 1)->latest()->take(3)->get();
        return view('welcome', compact('services', 'blogs'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function services()
    {
        $services = \App\Models\Service::orderBy('position')->get();
        return view('front.services', compact('services'));
    }

    public function blogIndex(Request $request)
    {
        $query = \App\Models\Blog::where('status', 1);

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $blogs = $query->latest()->paginate(9);
        $categories = \App\Models\Category::all();

        return view('front.blog', compact('blogs', 'categories'));
    }

    public function blogShow($slug)
    {
        $blog = \App\Models\Blog::where('slug', $slug)->where('status', 1)->firstOrFail();
        
        // Increment view count with throttling (5 minutes per IP per blog)
        $cacheKey = 'blog_view_' . $blog->id . '_' . request()->ip();
        
        if (!\Illuminate\Support\Facades\Cache::has($cacheKey)) {
            $blog->increment('views');
            // Cache for 5 minutes (300 seconds)
            \Illuminate\Support\Facades\Cache::put($cacheKey, true, 300);
        }
        
        $relatedBlogs = \App\Models\Blog::where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        return view('front.blog_show', compact('blog', 'relatedBlogs'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'captcha' => 'required|numeric|in:8' // 3 + 5 = 8
        ], [
            'captcha.in' => 'Anti-bot verification failed. Please try again.'
        ]);

        \App\Models\Contact::create($request->all());

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
