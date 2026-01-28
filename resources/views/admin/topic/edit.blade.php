@extends('layouts.admin')

@section('pageTitle', 'Edit Subject')

@section('content')
<div style="background: white; padding: 2rem; border-radius: 0.5rem; border: 1px solid #e2e8f0; max-width: 600px;">
    <h3 style="font-weight: 700; color: #1e293b; margin-bottom: 2rem;">Edit Subject</h3>

    <form action="{{ route('admin.topic.update', $topic->topic_id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 1.5rem;">
            <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Subject/Topic *</label>
            <input type="text" name="topic" value="{{ old('topic', $topic->topic) }}" required class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Topic Type</label>
            <select name="topic_type" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
                <option value="t" {{ $topic->topic_type == 't' ? 'selected' : '' }}>Topic</option>
                <option value="g" {{ $topic->topic_type == 'g' ? 'selected' : '' }}>Geographic</option>
                <option value="n" {{ $topic->topic_type == 'n' ? 'selected' : '' }}>Name</option>
                <option value="s" {{ $topic->topic_type == 's' ? 'selected' : '' }}>Temporal</option>
                <option value="o" {{ $topic->topic_type == 'o' ? 'selected' : '' }}>Occupation</option>
            </select>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn" style="padding: 0.75rem 2rem; background: #3b82f6; color: white; border: none; border-radius: 0.375rem; font-weight: 600; cursor: pointer;">Update Subject</button>
            <a href="{{ route('admin.topic.index') }}" style="padding: 0.75rem 2rem; background: #e2e8f0; color: #475569; text-decoration: none; border-radius: 0.375rem; font-weight: 600;">Cancel</a>
        </div>
    </form>
</div>
@endsection
