<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::where('role', 0)->get();
        return view('admin.user.index', compact('users'));
    }

    public function destroy(string $id)
    {
        \App\Models\User::findOrFail($id)->delete();
        return redirect()->back()->with('status', 'User deleted successfully!');
    }
    
    // Toggle Block Status
    public function toggleBlock(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->is_blocked = !$user->is_blocked;
        $user->save();
        return redirect()->back()->with('status', $user->is_blocked ? 'User blocked!' : 'User unblocked!');
    }
}
