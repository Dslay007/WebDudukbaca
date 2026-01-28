<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('member_name', 'like', "%{$search}%")
                  ->orWhere('member_id', 'like', "%{$search}%");
        }

        $members = $query->orderBy('last_update', 'desc')->paginate(15);

        return view('admin.member.index', compact('members'));
    }

    public function create()
    {
        return view('admin.member.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|unique:member,member_id',
            'member_name' => 'required',
            'passwd' => 'required|min:4',
            'member_email' => 'nullable|email',
            'gender' => 'required',
            'member_type_id' => 'required',
        ]);

        $member = new Member();
        $member->member_id = $validated['member_id'];
        $member->member_name = $validated['member_name'];
        // Default to SHA256 as per SLiMS standard or modern bcrypt?
        // Let's use SHA256 for compatibility with old checks, or Bcrypt if we updated login logic.
        // My MemberAuthController checks both. Let's use SHA256 to be "SLiMS native compatible".
        $member->mpasswd = hash('sha256', $validated['passwd']);
        $member->gender = $validated['gender'];
        $member->member_type_id = $validated['member_type_id'];
        $member->member_email = $validated['member_email'];
        $member->input_date = now();
        $member->last_update = now();
        $member->save();

        return redirect()->route('admin.member.index')->with('success', 'Member registered successfully!');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.member.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'member_name' => 'required',
            'member_email' => 'nullable|email',
            'gender' => 'required',
            'passwd' => 'nullable|min:4', // Password optional on update
        ]);

        $member->member_name = $validated['member_name'];
        $member->gender = $validated['gender'];
        $member->member_email = $validated['member_email'];
        
        if (!empty($validated['passwd'])) {
             $member->mpasswd = hash('sha256', $validated['passwd']);
        }

        $member->last_update = now();
        $member->save();

        return redirect()->route('admin.member.index')->with('success', 'Member updated successfully!');
    }

    public function destroy($id)
    {
        Member::destroy($id);
        return redirect()->route('admin.member.index')->with('success', 'Member deleted successfully!');
    }
}
