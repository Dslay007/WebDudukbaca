<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $query = Publisher::query();

        if ($request->has('search')) {
            $query->where('publisher_name', 'like', "%{$request->search}%");
        }

        $publishers = $query->orderBy('last_update', 'desc')->paginate(15);

        return view('admin.publisher.index', compact('publishers'));
    }

    public function create()
    {
        return view('admin.publisher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'publisher_name' => 'required|string|max:255',
        ]);

        $publisher = new Publisher();
        $publisher->publisher_name = $request->publisher_name;
        $publisher->input_date = now();
        $publisher->last_update = now();
        $publisher->save();

        return redirect()->route('admin.publisher.index')->with('success', 'Publisher added successfully.');
    }

    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('admin.publisher.edit', compact('publisher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'publisher_name' => 'required|string|max:255',
        ]);

        $publisher = Publisher::findOrFail($id);
        $publisher->publisher_name = $request->publisher_name;
        $publisher->last_update = now();
        $publisher->save();

        return redirect()->route('admin.publisher.index')->with('success', 'Publisher updated successfully.');
    }

    public function destroy($id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();
        return redirect()->route('admin.publisher.index')->with('success', 'Publisher deleted successfully.');
    }
}
