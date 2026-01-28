@extends('layouts.admin')

@section('pageTitle', 'Edit Book')

@section('content')
<div style="background: white; padding: 2rem; border-radius: 0.5rem; border: 1px solid #e2e8f0; max-width: 800px;">
    <h3 style="font-weight: 700; color: #1e293b; margin-bottom: 2rem;">Edit Bibliographic Data</h3>

    <form action="{{ route('admin.biblio.update', $biblio->biblio_id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 1.5rem;">
            <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Title *</label>
            <input type="text" name="title" value="{{ old('title', $biblio->title) }}" required class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Edition</label>
                <input type="text" name="edition" value="{{ old('edition', $biblio->edition) }}" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
            </div>
            <div>
                 <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Series Title</label>
                <input type="text" name="series_title" value="{{ old('series_title', $biblio->series_title) }}" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Call Number</label>
                <input type="text" name="call_number" value="{{ old('call_number', $biblio->call_number) }}" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
            </div>
             <div>
                <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Classification</label>
                <input type="text" name="classification" value="{{ old('classification', $biblio->classification) }}" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">ISBN/ISSN</label>
                <input type="text" name="isbn_issn" value="{{ old('isbn_issn', $biblio->isbn_issn) }}" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
            </div>
            <div>
                <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Publisher</label>
                <select name="publisher_id" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
                    <option value="">-- Select Publisher --</option>
                    @foreach(\App\Models\Publisher::all() as $pub)
                        <option value="{{ $pub->publisher_id }}" {{ $biblio->publisher_id == $pub->publisher_id ? 'selected' : '' }}>
                            {{ $pub->publisher_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Publish Year</label>
                <input type="number" name="publish_year" value="{{ old('publish_year', $biblio->publish_year) }}" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
            </div>
            <div>
                <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Publish Place</label>
                <select name="publish_place_id" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
                    <option value="">-- Select Place --</option>
                    @foreach(\App\Models\Place::all() as $place)
                        <option value="{{ $place->place_id }}" {{ $biblio->publish_place_id == $place->place_id ? 'selected' : '' }}>{{ $place->place_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">GMD</label>
                <select name="gmd_id" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
                     @foreach(\App\Models\Gmd::all() as $gmd)
                        <option value="{{ $gmd->gmd_id }}" {{ $biblio->gmd_id == $gmd->gmd_id ? 'selected' : '' }}>
                            {{ $gmd->gmd_name }}
                        </option>
                    @endforeach
                </select>
            </div>
             <div>
                 <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Language</label>
                 <select name="language" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
                    <option value="en" {{ $biblio->language == 'en' ? 'selected' : '' }}>English</option>
                    <option value="id" {{ $biblio->language == 'id' ? 'selected' : '' }}>Indonesian</option>
                    <option value="ar" {{ $biblio->language == 'ar' ? 'selected' : '' }}>Arabic</option>
                </select>
            </div>
        </div>

        <div style="margin-bottom: 1.5rem;">
             <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Notes</label>
             <textarea name="notes" rows="3" class="input" style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">{{ old('notes', $biblio->notes) }}</textarea>
        </div>

        <div style="margin-bottom: 1.5rem;">
             <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Cover Image</label>
             @if($biblio->image)
                <div style="margin-bottom: 0.5rem;">
                    <img src="{{ asset('images/' . $biblio->image) }}" alt="Current Cover" style="height: 100px; border-radius: 0.375rem; border: 1px solid #cbd5e1;">
                    <div style="font-size: 0.75rem; color: #64748b;">Current: {{ $biblio->image }}</div>
                </div>
             @endif
             <input type="file" name="image" class="input" style="width: 100%; padding: 0.5rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; outline: none;">
        </div>

        <div style="margin-bottom: 2rem;">
            <label class="label" style="display: block; font-weight: 600; font-size: 0.875rem; color: #475569; margin-bottom: 0.5rem;">Authors</label>
            <div style="padding: 1rem; border: 1px solid #cbd5e1; border-radius: 0.375rem; max-height: 150px; overflow-y: auto;">
                 @php $selectedAuthors = $biblio->authors->pluck('author_id')->toArray(); @endphp
                 @foreach(\App\Models\Author::limit(50)->get() as $author)
                    <div style="margin-bottom: 0.25rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                            <input type="checkbox" name="author_id[]" value="{{ $author->author_id }}"
                                {{ in_array($author->author_id, $selectedAuthors) ? 'checked' : '' }}>
                            {{ $author->author_name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn" style="padding: 0.75rem 2rem; background: #3b82f6; color: white; border: none; border-radius: 0.375rem; font-weight: 600; cursor: pointer;">Update Book</button>
            <a href="{{ route('admin.biblio.index') }}" style="padding: 0.75rem 2rem; background: #e2e8f0; color: #475569; text-decoration: none; border-radius: 0.375rem; font-weight: 600;">Cancel</a>
        </div>
    </form>
</div>
@endsection
