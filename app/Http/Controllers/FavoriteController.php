<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggle(Request $request)
    {
        $blogId = $request->blog_id;
        $userId = auth()->id();

        $favorite = Favorite::where('user_id', $userId)->where('blog_id', $blogId)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'removed', 'message' => 'Removed from favorites']);
        } else {
            Favorite::create(['user_id' => $userId, 'blog_id' => $blogId]);
            return response()->json(['status' => 'added', 'message' => 'Added to favorites']);
        }
    }
}
