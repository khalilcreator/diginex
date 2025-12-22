<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = \App\Models\Contact::latest()->paginate(10);
        return view('admin.contact.index', compact('contacts'));
    }

    public function destroy($id)
    {
        \App\Models\Contact::findOrFail($id)->delete();
        return back()->with('status', 'Message deleted successfully');
    }
}
