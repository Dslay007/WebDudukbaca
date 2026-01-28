<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MemberRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('member.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|string|max:50|unique:member,member_id',
            'member_name' => 'required|string|max:255',
            'member_email' => 'required|string|email|max:255|unique:member,member_email',
            'nik' => 'required|string|size:16|unique:member,nik',
            'member_phone' => 'required|string|max:20',
            'member_address' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $member = new Member();
        $member->member_id = $validated['member_id'];
        $member->member_name = $validated['member_name'];
        $member->member_email = $validated['member_email'];
        $member->nik = $validated['nik'];
        $member->member_phone = $validated['member_phone'];
        $member->member_address = $validated['member_address'];
        //$member->mpasswd = Hash::make($validated['password']); // Use Laravel default hashing if compatible
        // SLiMS usually uses SHA256. Sticking to SHA256 for consistency with other controllers.
        $member->mpasswd = hash('sha256', $validated['password']); 
        
        $member->member_type_id = 1; // Default to Standard Member
        $member->member_image = 'person.png'; // Default image
        $member->gender = 1; // Default or add to form? Added 1 as placeholder or make nullable. Let's add gender to form later or just default it for now. Actually, let's keep it simple as per request unless gender was asked. Request: "Nama, NIK, HP, Email, Alamat". Gender not strictly requested but good to have. I'll default to 1 (Male) or 0 (Female) or null if possible. 
        // Checking schema: gender creates usually required? 
        // In MemberController store: 'gender' => 'required'
        // So I should add gender to the form.
        
        $member->input_date = now();
        $member->last_update = now();
        
        // Handling gender if not in form:
        if ($request->has('gender')) {
            $member->gender = $request->gender;
        } else {
            $member->gender = 1; // Default
        }

        $member->save();

        // Auto login after registration
        Auth::guard('member')->login($member);

        return redirect()->route('member.dashboard')->with('success', 'Registration successful! Welcome to DudukBaca.');
    }
}
