<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Item;
use App\Models\Loan;
use Carbon\Carbon;

class CirculationController extends Controller
{
    public function index()
    {
        return view('admin.circulation.index');
    }

    public function start(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:member,member_id'
        ]);

        return redirect()->route('admin.circulation.transaction', $request->member_id);
    }

    public function transaction($member_id)
    {
        $member = Member::findOrFail($member_id);
        
        // Active loans for this member
        $loans = Loan::where('member_id', $member_id)
            ->where('is_return', 0)
            ->with(['item.biblio'])
            ->get();

        return view('admin.circulation.transaction', compact('member', 'loans'));
    }

    public function storeLoan(Request $request, $member_id)
    {
        $request->validate([
            'item_code' => 'required|exists:item,item_code'
        ]);

        $item = Item::where('item_code', $request->item_code)->first();

        // Check availability
        $activeLoan = Loan::where('item_code', $request->item_code)->where('is_return', 0)->first();
        if ($activeLoan) {
            return back()->withErrors(['item_code' => 'Item is currently on loan to ' . $activeLoan->member_id]);
        }

        // Create Loan
        $loan = new Loan();
        $loan->item_code = $request->item_code;
        $loan->member_id = $member_id;
        $loan->loan_date = now()->toDateString();
        // Default 7 days loan
        $loan->due_date = Carbon::now()->addDays(7)->toDateString();
        $loan->is_return = 0;
        $loan->input_date = now();
        $loan->last_update = now();
        $loan->save();

        return back()->with('success', 'Item loaned successfully.');
    }

    public function returnLoan($loan_id)
    {
        $loan = Loan::findOrFail($loan_id);
        $loan->is_return = 1;
        $loan->return_date = now()->toDateString();
        $loan->last_update = now();
        $loan->save();

        return back()->with('success', 'Item returned successfully.');
    }
}
