<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Dudukbaca') }}</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Ultra Modern HSL Palette */
            --primary: 220 50% 40%;    /* Deep Blue */
            --primary-light: 220 80% 98%; 
            --accent: 330 80% 60%;     /* Vibrant Pink/Red */
            --surface: 0 0% 100%;
            --bg: 220 20% 97%;
            --text-main: 220 40% 15%;
            --text-muted: 220 20% 45%;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: 'Outfit', sans-serif;
            background-color: hsl(var(--bg));
            color: hsl(var(--text-main));
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        a { text-decoration: none; color: inherit; transition: 0.2s; }

        /* Modern Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.9);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        
        .brand { 
            font-size: 1.75rem; 
            font-weight: 800; 
            background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--accent)));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.05em;
        }

        .nav-links { display: flex; gap: 2.5rem; align-items: center; }
        .nav-link { 
            font-weight: 600; 
            color: hsl(var(--text-muted)); 
            font-size: 0.95rem;
        }
        .nav-link:hover { color: hsl(var(--primary)); }
        
        .btn {
            background: hsl(var(--primary));
            color: white;
            padding: 0.7rem 1.7rem;
            border-radius: 99px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .btn:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
        }

        /* Active Nav Link */
        .nav-link {
            padding: 0.5rem 1rem;
            border-radius: 99px;
            transition: all 0.2s;
        }
        .nav-link.active {
            background: rgba(15, 23, 42, 0.05);
            color: hsl(var(--primary));
        }

        /* Footer */
        footer {
            background: white;
            padding: 4rem 2rem;
            text-align: center;
            margin-top: 6rem;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        /* Pagination Fixes */
        nav[role="navigation"] {
             display: flex;
             justify-content: center;
             margin-top: 2rem;
        }
        
        /* Hide the mobile "Previous / Next" text links */
        nav[role="navigation"] > div:first-child {
            display: none !important;
        }
        
        /* The Desktop Container: Force it visible on all screens (override Tailwind 'hidden') */
        nav[role="navigation"] > div:nth-child(2) {
             display: flex !important;
             flex-direction: column;
             align-items: center;
             gap: 1rem;
             width: 100%;
        }

        /* The "Showing X to Y results" text container */
        nav[role="navigation"] > div:nth-child(2) > div:first-child {
             text-align: center;
             width: 100%;
        }
        nav[role="navigation"] > div:nth-child(2) > div:first-child p {
             font-size: 0.95rem;
             color: hsl(var(--text-muted));
        }

        /* The Links Container */
        nav[role="navigation"] > div:nth-child(2) > div:last-child {
             box-shadow: none !important;
             display: flex;
             justify-content: center;
        }

        /* Individual Links */
        nav[role="navigation"] .relative {
            border: none !important;
            padding: 0.5rem 0.75rem !important;
            border-radius: 8px !important; /* Slightly rounded squares/rects */
            margin: 0 0.15rem !important;
            font-weight: 600 !important;
            box-shadow: none !important;
            background: transparent !important;
            color: hsl(var(--text-muted)) !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2rem;
            height: 2rem;
        }
        nav[role="navigation"] .relative:hover {
            background: #f1f5f9 !important;
            color: hsl(var(--primary)) !important;
        }
        nav[role="navigation"] span[aria-current="page"] .relative {
            background: hsl(var(--primary)) !important;
            color: white !important;
        }
        
        /* Arrows */
        nav[role="navigation"] svg { 
            width: 1rem; 
            height: 1rem;
            display: inline-block;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ url('/') }}" class="brand">Dudukbaca.</a>
        <div class="nav-links">
            <a href="{{ route('landing') }}" class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('page.struktur') }}" class="nav-link {{ request()->routeIs('page.struktur') ? 'active' : '' }}">Struktur Komunitas</a>
            <a href="{{ route('page.jurnal') }}" class="nav-link {{ request()->routeIs('page.jurnal') ? 'active' : '' }}">Jurnal Lapak</a>
            <a href="{{ route('opac.index') }}" class="nav-link {{ request()->routeIs('opac.*') ? 'active' : '' }}" style="{{ request()->routeIs('opac.*') ? '' : 'color: hsl(var(--accent));' }}">Perpustakaan (OPAC)</a>
            
            @if(Auth::guard('member')->check())
                <a href="{{ route('member.dashboard') }}" class="btn">Dashboard Saya</a>
            @else
                <a href="{{ route('login') }}" class="btn">Login Member</a>
            @endif
        </div>
    </nav>

    @yield('content')

    <footer>
        <h4 class="brand" style="font-size: 1.5rem; margin-bottom: 0.5rem;">Dudukbaca.</h4>
        
        <!-- Social Media Icons -->
        <div style="display: flex; justify-content: center; gap: 1.5rem; margin-bottom: 2rem;">
            <a href="https://instagram.com/dudukbaca" target="_blank" title="Instagram" style="color: hsl(var(--text-muted)); padding: 0.5rem; border-radius: 50%; background: #f1f5f9; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.background='#be185d'; this.style.color='white'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='#f1f5f9'; this.style.color='hsl(var(--text-muted))'; this.style.transform='translateY(0)'">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
            </a>
            <a href="https://twitter.com/dudukbaca" target="_blank" title="Twitter / X" style="color: hsl(var(--text-muted)); padding: 0.5rem; border-radius: 50%; background: #f1f5f9; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.background='black'; this.style.color='white'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='#f1f5f9'; this.style.color='hsl(var(--text-muted))'; this.style.transform='translateY(0)'">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4l11.733 16h4.267l-11.733 -16z"/><path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"/></svg>
            </a>
            <a href="https://linktr.ee/dudukbaca" target="_blank" title="Linktree" style="color: hsl(var(--text-muted)); padding: 0.5rem; border-radius: 50%; background: #f1f5f9; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.background='#43e55e'; this.style.color='white'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='#f1f5f9'; this.style.color='hsl(var(--text-muted))'; this.style.transform='translateY(0)'">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
            </a>
        </div>

        <p style="color: hsl(var(--text-muted))">&copy; {{ date('Y') }} Komunitas Literasi Malang. All rights reserved.</p>
        <div style="margin-top: 1rem; font-size: 0.9rem; color: #94a3b8;">
            <a href="{{ route('page.struktur') }}" style="margin: 0 0.5rem;">Struktur</a> &middot;
            <a href="{{ route('page.jurnal') }}" style="margin: 0 0.5rem;">Jurnal</a> &middot;
            <a href="{{ route('opac.index') }}" style="margin: 0 0.5rem;">OPAC</a>
        </div>
    </footer>
</body>
</html>
