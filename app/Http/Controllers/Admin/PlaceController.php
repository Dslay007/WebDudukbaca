<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        $query = Place::query();

        if ($request->has('search')) {
            $query->where('place_name', 'like', "%{$request->search}%");
        }

        $places = $query->orderBy('last_update', 'desc')->paginate(15);

        return view('admin.place.index', compact('places'));
    }

    public function create()
    {
        return view('admin.place.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'place_name' => 'required|string|max:30',
        ]);

        $place = new Place();
        $place->place_name = $request->place_name;
        $place->input_date = now();
        $place->last_update = now();
        $place->save();

        return redirect()->route('admin.place.index')->with('success', 'Place added successfully.');
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);
        return view('admin.place.edit', compact('place'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'place_name' => 'required|string|max:30',
        ]);

        $place = Place::findOrFail($id);
        $place->place_name = $request->place_name;
        $place->last_update = now();
        $place->save();

        return redirect()->route('admin.place.index')->with('success', 'Place updated successfully.');
    }

    public function destroy($id)
    {
        $place = Place::findOrFail($id);
        $place->delete();
        return redirect()->route('admin.place.index')->with('success', 'Place deleted successfully.');
    }
}
