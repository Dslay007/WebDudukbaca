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

        /* Footer */
        footer {
            background: white;
            padding: 4rem 2rem;
            text-align: center;
            margin-top: 6rem;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        /* Pagination Fixes (Laravel Tailwind Default) */
        nav[role="navigation"] { display: flex; justify-content: space-between; align-items: center; margin-top: 1rem; }
        nav[role="navigation"] div:first-child { display: none; }
        nav[role="navigation"] > div:nth-child(2) { display: flex; justify-content: center; gap: 0.5rem; }
        
        /* Active Page */
        span[aria-current="page"] > span {
            background: hsl(var(--primary)); color: white; border-color: hsl(var(--primary));
        }
        
        /* Links */
        nav[role="navigation"] a, nav[role="navigation"] span {
            padding: 0.5rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 99px; /* Rounded for OPAC */
            background: white;
            color: hsl(var(--text-muted));
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        nav[role="navigation"] a:hover {
            background: hsl(var(--primary-light));
            color: hsl(var(--primary));
            border-color: hsl(var(--primary-light));
        }

        /* Fix Huge Arrows */
        nav[role="navigation"] svg { 
            width: 1rem; height: 1rem; 
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ url('/') }}" class="brand">Dudukbaca.</a>
        <div class="nav-links">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="{{ route('content.show', 'news') }}" class="nav-link">News</a>
            
            @if(Auth::guard('member')->check())
                <a href="{{ route('member.dashboard') }}" class="nav-link">My Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn">Member Login</a>
            @endif
        </div>
    </nav>

    @yield('content')

    <footer>
        <h4 class="brand" style="font-size: 1.5rem; margin-bottom: 1rem;">Dudukbaca.</h4>
        <p style="color: hsl(var(--text-muted))">&copy; {{ date('Y') }} Library. All rights reserved.</p>
    </footer>
</body>
</html>
