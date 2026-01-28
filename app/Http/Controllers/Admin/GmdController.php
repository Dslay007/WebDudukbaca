<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gmd;

class GmdController extends Controller
{
    public function index(Request $request)
    {
        $query = Gmd::query();

        if ($request->has('search')) {
            $query->where('gmd_name', 'like', "%{$request->search}%")
                  ->orWhere('gmd_code', 'like', "%{$request->search}%");
        }

        $gmds = $query->orderBy('last_update', 'desc')->paginate(15);

        return view('admin.gmd.index', compact('gmds'));
    }

    public function create()
    {
        return view('admin.gmd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gmd_code' => 'required|string|max:15|unique:mst_gmd,gmd_code',
            'gmd_name' => 'required|string|max:30',
        ]);

        $gmd = new Gmd();
        $gmd->gmd_code = $request->gmd_code;
        $gmd->gmd_name = $request->gmd_name;
        // input_date and last_update handled by model/seeder logic usually, 
        // but explicit assignment doesn't hurt if timestamps disabled
        $gmd->input_date = now();
        $gmd->last_update = now();
        $gmd->save();

        return redirect()->route('admin.gmd.index')->with('success', 'GMD added successfully.');
    }

    public function edit($id)
    {
        $gmd = Gmd::findOrFail($id);
        return view('admin.gmd.edit', compact('gmd'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gmd_code' => 'required|string|max:15|unique:mst_gmd,gmd_code,'.$id.',gmd_id',
            'gmd_name' => 'required|string|max:30',
        ]);

        $gmd = Gmd::findOrFail($id);
        $gmd->gmd_code = $request->gmd_code;
        $gmd->gmd_name = $request->gmd_name;
        $gmd->last_update = now();
        $gmd->save();

        return redirect()->route('admin.gmd.index')->with('success', 'GMD updated successfully.');
    }

    public function destroy($id)
    {
        $gmd = Gmd::findOrFail($id);
        $gmd->delete();
        return redirect()->route('admin.gmd.index')->with('success', 'GMD deleted successfully.');
    }
}
