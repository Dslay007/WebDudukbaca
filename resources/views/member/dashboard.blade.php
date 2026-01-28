@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 2rem;">
    <div style="display: flex; gap: 2rem; align-items: start;">
        
        <!-- Sidebar profile -->
        <div style="width: 250px; background: white; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid #e2e8f0;">
            <div style="text-align: center; margin-bottom: 1.5rem;">
                <div style="width: 80px; height: 80px; background: #e0f2fe; color: #0369a1; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1rem;">
                    👤
                </div>
                <h3 style="font-size: 1.1rem; font-weight: 700; color: #1e293b;">{{ $member->member_name }}</h3>
                <p style="color: #64748b; font-size: 0.9rem;">{{ $member->member_id }}</p>
            </div>
            
            <form action="{{ route('member.logout') }}" method="POST">
                @csrf
                <button type="submit" style="width: 100%; padding: 0.5rem; background: #fee2e2; color: #b91c1c; border: 1px solid #fecdd3; border-radius: 0.5rem; cursor: pointer; font-weight: 600;">LOGOUT</button>
            </form>
        </div>

        <!-- Main Dashboard -->
        <div style="flex: 1;">
            <h1 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin-bottom: 1.5rem;">My Active Loans</h1>

            @if($loans->count() > 0)
                <div style="display: grid; gap: 1rem;">
                    @foreach($loans as $loan)
                    <div style="background: white; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid #e2e8f0; display: flex; gap: 1rem; align-items: center;">
                        <div style="flex: 1;">
                            <h4 style="font-weight: 600; font-size: 1.1rem; margin-bottom: 0.25rem;">
                                {{ optional(optional($loan->item)->biblio)->title ?? 'Unknown Title' }}
                            </h4>
                            <p style="color: #64748b; font-size: 0.9rem; font-family: monospace;">
                                Item Code: {{ $loan->item_code }}
                            </p>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 0.8rem; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;">Due Date</div>
                            <div style="color: {{ \Carbon\Carbon::parse($loan->due_date)->isPast() ? '#dc2626' : '#1e293b' }}; font-weight: 700; font-size: 1.1rem;">
                                {{ \Carbon\Carbon::parse($loan->due_date)->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div style="padding: 3rem; text-align: center; background: white; border-radius: 0.75rem; border: 1px dashed #cbd5e1; color: #64748b;">
                    <p>You have no books currently on loan.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
