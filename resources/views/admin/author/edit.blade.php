@extends('layouts.admin')

@section('pageTitle', 'Edit Author')

@section('content')
<div style="background: white; padding: 2rem; border-radius: 0.5rem; border: 1px solid #e2e8f0; max-width: 600px;">
    <h3 style="font-weight: 700; color: #1e293b; margin-bottom: 2rem;">Edit Author</h3>

    <form action="{{ route('admin.author.update', $author->author_id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 1.5rem;">
            <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Author Name *</label>
            <input type="text" name="author_name" value="{{ old('author_name', $author->author_name) }}" required class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Birth Year (Optional)</label>
            <input type="text" name="author_year" value="{{ old('author_year', $author->author_year) }}" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;" placeholder="YYYY">
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn" style="padding: 0.75rem 2rem; background: #3b82f6; color: white; border: none; border-radius: 0.375rem; font-weight: 600; cursor: pointer;">Update Author</button>
            <a href="{{ route('admin.author.index') }}" style="padding: 0.75rem 2rem; background: #e2e8f0; color: #475569; text-decoration: none; border-radius: 0.375rem; font-weight: 600;">Cancel</a>
        </div>
    </form>
</div>
@endsection
