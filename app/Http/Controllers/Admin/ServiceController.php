<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = \App\Models\Service::orderBy('position', 'asc')->get();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'icon' => 'nullable|image|max:2048'
        ]);

        $path = null;
        if($request->hasFile('icon')){
            $path = $request->file('icon')->store('uploads/services', 'public');
        }

        \App\Models\Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $path,
            'position' => \App\Models\Service::max('position') + 1
        ]);

        return redirect()->route('admin.service.index')->with('status', 'Service created successfully');
    }

    public function edit(string $id)
    {
        $service = \App\Models\Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'icon' => 'nullable|image|max:2048'
        ]);

        $service = \App\Models\Service::findOrFail($id);
        if($request->hasFile('icon')){
            $service->icon = $request->file('icon')->store('uploads/services', 'public');
        }
        $service->update($request->only('title', 'description', 'position'));

        return redirect()->route('admin.service.index')->with('status', 'Service updated successfully');
    }

    public function destroy(string $id)
    {
        \App\Models\Service::findOrFail($id)->delete();
        return redirect()->route('admin.service.index')->with('status', 'Service deleted successfully');
    }
}
