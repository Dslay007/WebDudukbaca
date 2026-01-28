@extends('layouts.modern_landing')

@section('content')

<div style="max-width: 1200px; margin: 0 auto; padding: 2rem 1rem;">
    <a href="{{ url('/') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 2rem; font-weight: 500; color: #64748b;">
        &larr; Back to Catalog
    </a>

    <div style="display: grid; grid-template-columns: 300px 1fr; gap: 3rem; align-items: start;">
        
        <!-- Sidebar: Image -->
        <div style="position: sticky; top: 100px;">
            <div style="background: white; padding: 1rem; border-radius: 0.75rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                @if($biblio->image)
                    <img src="{{ asset('images/' . $biblio->image) }}" alt="{{ $biblio->title }}" style="width: 100%; border-radius: 0.5rem;">
                @else
                    <div style="aspect-ratio: 2/3; background: #f1f5f9; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; font-size: 4rem; color: #94a3b8;">
                        📚
                    </div>
                @endif
            </div>

            @if($biblio->isbn_issn)
            <div style="margin-top: 1.5rem; padding: 1rem; background: #eff6ff; border-radius: 0.5rem; color: #1e40af; font-size: 0.9rem; font-weight: 500; text-align: center;">
                ISBN: {{ $biblio->isbn_issn }}
            </div>
            @endif
        </div>

        <!-- Main Content -->
        <div>
            <h1 style="font-size: 2.5rem; font-weight: 800; color: #1e293b; line-height: 1.2; margin-bottom: 1rem;">
                {{ $biblio->title }}
            </h1>

            <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
                @foreach($biblio->authors as $author)
                    <span style="background: #e2e8f0; padding: 0.25rem 0.75rem; border-radius: 99px; font-weight: 600; color: #475569;">
                        👤 {{ $author->author_name }}
                    </span>
                @endforeach
                <span style="display: flex; align-items: center; color: #64748b;">
                    📅 {{ $biblio->publish_year }}
                </span>
                <span style="display: flex; align-items: center; color: #64748b;">
                    🏢 {{ $biblio->publisher->publisher_name ?? 'Unknown Publisher' }}
                </span>
            </div>

            <!-- Description / Notes -->
            @if($biblio->notes)
            <div style="margin-bottom: 3rem;">
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #334155; margin-bottom: 0.75rem;">Description</h3>
                <div style="color: #475569; line-height: 1.8;">
                    {{ $biblio->notes }}
                </div>
            </div>
            @endif

            <!-- Availability Section -->
            <div style="margin-bottom: 3rem;">
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #334155; margin-bottom: 1rem;">Availability</h3>
                
                @if($biblio->items->count() > 0)
                <div style="background: white; border: 1px solid #e2e8f0; border-radius: 0.75rem; overflow: hidden;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <tr>
                                <th style="text-align: left; padding: 1rem; font-weight: 600; color: #475569;">Item Code</th>
                                <th style="text-align: left; padding: 1rem; font-weight: 600; color: #475569;">Location</th>
                                <th style="text-align: left; padding: 1rem; font-weight: 600; color: #475569;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($biblio->items as $item)
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 1rem; font-family: monospace; font-size: 1.1em;">{{ $item->item_code }}</td>
                                <td style="padding: 1rem; color: #64748b;">{{ $item->location_id ?? 'General Collection' }}</td>
                                <td style="padding: 1rem;">
                                    @if(optional($item->status)->item_status_name == 'Available' || $item->item_status_id == 'NL') 
                                    {{-- Assuming NL or null might mean available in some systems, adjusting based on actual data is key. standard SLiMS usually has specific codes --}}
                                        <span style="color: #16a34a; font-weight: 600; background: #dcfce7; padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.875rem;">
                                            Available
                                        </span>
                                    @else
                                        <span style="color: #d97706; font-weight: 600; background: #fef3c7; padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.875rem;">
                                            {{ optional($item->status)->item_status_name ?? 'Loaned / Unavailable' }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div style="padding: 1rem; background: #fff1f2; color: #be123c; border-radius: 0.5rem; border: 1px solid #fecdd3;">
                        No physical copies recorded in the system.
                    </div>
                @endif
            </div>

            <!-- Topics -->
            @if($biblio->topics->isNotEmpty())
            <div>
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #334155; margin-bottom: 1rem;">Topics</h3>
                <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                    @foreach($biblio->topics as $topic)
                        <a href="{{ route('opac.index', ['keywords' => $topic->topic]) }}" style="padding: 0.4rem 1rem; background: white; border: 1px solid #e2e8f0; border-radius: 0.5rem; color: #475569; text-decoration: none; transition: all 0.2s;">
                            # {{ $topic->topic }}
                        </a>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection
