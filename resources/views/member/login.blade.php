@extends('layouts.modern_landing')

@section('content')
<div class="container" style="min-height: 60vh;">
    <div style="max-width: 400px; margin: 4rem auto; position: relative;">
        <!-- Back Button -->
        <a href="javascript:history.back()" style="position: absolute; top: -40px; left: 0; color: #64748b; font-weight: 600; text-decoration: none; display: flex; align-items: center; font-size: 0.9rem;">
            &larr; Kembali
        </a>
        <div style="background: white; padding: 2rem; border-radius: 0.75rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
            <h1 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem; text-align: center; color: #1e293b;">Member Login</h1>
            
            <form action="{{ route('member.login') }}" method="POST">
                @csrf
                <div style="margin-bottom: 1rem;">
                    <label for="member_id" style="display: block; font-weight: 500; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Member ID</label>
                    <input type="text" name="member_id" id="member_id" required 
                        style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.5rem; outline: none; transition: border-color 0.2s;">
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label for="password" style="display: block; font-weight: 500; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Password</label>
                    <input type="password" name="password" id="password" required 
                        style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.5rem; outline: none; transition: border-color 0.2s;">
                </div>

                @if($errors->any())
                <div style="margin-bottom: 1.5rem; padding: 0.75rem; background: #fee2e2; color: #b91c1c; border-radius: 0.5rem; font-size: 0.875rem;">
                    {{ $errors->first() }}
                </div>
                @endif

                <button type="submit" class="btn" style="width: 100%; justify-content: center; display: flex;">
                    Login
                </button>
                
                <div style="margin-top: 1.5rem; text-align: center; font-size: 0.875rem;">
                    <span style="color: #64748b;">Belum punya akun?</span> 
                    <a href="{{ route('member.register') }}" style="color: #3b82f6; font-weight: 600;">Daftar disini</a>
                </div>

                <div style="margin-top: 1rem; text-align: center; font-size: 0.8rem; border-top: 1px solid #f1f5f9; padding-top: 1rem;">
                    <a href="{{ route('admin.login') }}" style="color: #64748b; text-decoration: none;">
                        Access for <span style="font-weight: 600; color: #475569;">Librarians</span> &rarr;
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
