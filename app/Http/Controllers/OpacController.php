<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biblio;

class OpacController extends Controller
{
    public function index(Request $request)
    {
        $query = Biblio::query();

        if ($request->has('keywords')) {
            $query->where('title', 'like', '%' . $request->keywords . '%');
        }

        // Filter out hidden opac items
        $query->where('opac_hide', 0);

        $biblios = $query->with(['publisher', 'authors'])
            ->orderBy('last_update', 'desc')
            ->paginate(8);

        return view('opac.index', compact('biblios'));
    }

    public function show($id)
    {
        $biblio = Biblio::with(['publisher', 'authors', 'topics', 'items.status'])
            ->findOrFail($id);

        return view('opac.show', compact('biblio'));
    }
}
