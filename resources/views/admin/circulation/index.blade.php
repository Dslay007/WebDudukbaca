@extends('layouts.admin')

@section('pageTitle', 'Circulation Service')

@section('content')
<div style="background: white; padding: 3rem; border-radius: 0.5rem; border: 1px solid #e2e8f0; max-width: 500px; margin: 2rem auto; text-align: center;">
    <h3 style="font-weight: 700; color: #1e293b; margin-bottom: 2rem; font-size: 1.5rem;">Start Transaction</h3>

    <form action="{{ route('admin.circulation.start') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 2rem;">
            <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem; text-align: left;">Enter Member ID</label>
            <input type="text" name="member_id" required autofocus
                style="width: 100%; padding: 1rem; border: 2px solid #cbd5e1; border-radius: 0.5rem; outline: none; font-size: 1.1rem; text-align: center; letter-spacing: 0.05em;"
                placeholder="Scan or Type Member ID">
            @error('member_id')
                <div style="color: #ef4444; font-size: 0.875rem; margin-top: 0.5rem; text-align: left;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn" style="width: 100%; padding: 1rem; background: #3b82f6; color: white; border: none; border-radius: 0.5rem; font-weight: 700; font-size: 1rem; cursor: pointer;">Start Circulation</button>
    </form>
</div>
@endsection
