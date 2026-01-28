<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemStatus;

class ItemStatusController extends Controller
{
    public function index(Request $request)
    {
        $query = ItemStatus::query();

        if ($request->has('search')) {
            $query->where('item_status_name', 'like', "%{$request->search}%")
                  ->orWhere('item_status_id', 'like', "%{$request->search}%");
        }

        $statuses = $query->orderBy('last_update', 'desc')->paginate(15);

        return view('admin.item_status.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.item_status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_status_id' => 'required|string|max:3|unique:mst_item_status,item_status_id',
            'item_status_name' => 'required|string|max:30',
        ]);

        $status = new ItemStatus();
        $status->item_status_id = $request->item_status_id;
        $status->item_status_name = $request->item_status_name;
        $status->no_loan = 0; // Default allow loan? SLiMS specific logic might differ. 1 = no loan.
        $status->skip_stock_take = 0;
        $status->input_date = now();
        $status->last_update = now();
        $status->save();

        return redirect()->route('admin.item_status.index')->with('success', 'Item Status added successfully.');
    }

    public function edit($id)
    {
        $status = ItemStatus::findOrFail($id);
        return view('admin.item_status.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_status_id' => 'required|string|max:3|unique:mst_item_status,item_status_id,'.$id.',item_status_id',
            'item_status_name' => 'required|string|max:30',
        ]);

        $status = ItemStatus::findOrFail($id);
        $status->item_status_id = $request->item_status_id;
        $status->item_status_name = $request->item_status_name;
        $status->last_update = now();
        $status->save();

        return redirect()->route('admin.item_status.index')->with('success', 'Item Status updated successfully.');
    }

    public function destroy($id)
    {
        $status = ItemStatus::findOrFail($id);
        $status->delete();
        return redirect()->route('admin.item_status.index')->with('success', 'Item Status deleted successfully.');
    }
}
