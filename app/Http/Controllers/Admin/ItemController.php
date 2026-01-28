<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Biblio;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with('biblio'); // Eager load book info

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('item_code', 'like', "%{$search}%")
                  ->orWhereHas('biblio', function($q) use ($search) {
                      $q->where('title', 'like', "%{$search}%");
                  });
        }

        $items = $query->orderBy('last_update', 'desc')->paginate(20);

        return view('admin.item.index', compact('items'));
    }

    public function printBarcodes(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*' => 'exists:item,item_id'
        ]);

        $items = Item::with('biblio')
                     ->whereIn('item_id', $request->items)
                     ->get();

        return view('admin.item.barcodes', compact('items'));
    }
}
