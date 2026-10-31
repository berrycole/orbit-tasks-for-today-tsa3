<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Orbit Tasks for Today keeps daily store work in view.">
    <title>@yield('title') · Orbit Tasks for Today</title>
    <link rel="icon" href="{{ asset('assets/logo.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('assets/orbit.css') }}">
</head>
<body>
    <a class="skip" href="#main">Skip to content</a>
    <aside>
        <a class="brand" href="{{ route('home') }}" aria-label="Orbit Tasks home">
            <img src="{{ asset('assets/logo.svg') }}" alt="" width="40" height="40">
            <span>orbit<span class="brand-sub">TASKS FOR TODAY</span></span>
        </a>
        <p class="nav-label">TASK WORKSPACE</p>
        <nav aria-label="Main navigation">
            @foreach (['home' => 'Today', 'tasks' => 'Task List', 'profile' => 'Profile', 'about' => 'About'] as $name => $label)
                <a href="{{ route($name) }}" class="{{ request()->routeIs($name) ? 'active' : '' }}" @if (request()->routeIs($name)) aria-current="page" @endif>
                    <span class="nav-dot"></span>{{ $label }}
                </a>
            @endforeach
        </nav>
        <div class="sidebar-foot"><span class="live-dot"></span> A clearer view of the day.<small>IT0049 · Laravel TSA3</small></div>
    </aside>
    <div class="workspace">
        <header><span>ORBIT / <b>@yield('title')</b></span><span class="demo">Task workspace <span class="avatar">OD</span></span></header>
        <main id="main">@yield('content')</main>
        <footer><span>© {{ date('Y') }} Orbit Devices</span><span>IT0049 · Tasks for Today</span></footer>
    </div>
</body>
</html>
