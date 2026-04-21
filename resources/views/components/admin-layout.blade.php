<!DOCTYPE html>
<html lang="vi" class="bg-background text-foreground">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Admin Panel' }} - {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-background text-foreground overflow-x-hidden">
<div class="qb-admin">

    {{-- ── Sidebar ── --}}
    <aside class="qb-sidebar" id="qb-sidebar">

        {{-- Logo --}}
        <div class="qb-sidebar__logo">
            <div class="qb-sidebar__logo-icon">
                <svg viewBox="0 0 40 40" fill="none" width="22" height="22">
                    <path d="M20 4 L26 16 L20 12 L14 16 Z" fill="white" opacity="0.9"/>
                    <path d="M20 36 L14 24 L20 28 L26 24 Z" fill="white" opacity="0.9"/>
                    <path d="M4 20 L16 14 L12 20 L16 26 Z" fill="white" opacity="0.7"/>
                    <path d="M36 20 L24 26 L28 20 L24 14 Z" fill="white" opacity="0.7"/>
                </svg>
            </div>
        </div>

        {{-- Nav items --}}
        <nav class="qb-sidebar__nav">
            <a href="{{ route('admin.dashboard') }}"
               class="qb-sidebar__item {{ request()->routeIs('admin.dashboard') ? 'qb-sidebar__item--active' : '' }}"
               title="Dashboard">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
            </a>
            <a href="{{ route('admin.movies.index') }}"
               class="qb-sidebar__item {{ request()->routeIs('admin.movies.*') ? 'qb-sidebar__item--active' : '' }}"
               title="Đề thi">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </a>
            <a href="{{ route('admin.shows.index') }}"
               class="qb-sidebar__item {{ request()->routeIs('admin.shows.*') ? 'qb-sidebar__item--active' : '' }}"
               title="Môn học">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>
            </a>
            <a href="{{ route('admin.users.index') }}"
               class="qb-sidebar__item {{ request()->routeIs('admin.users.*') ? 'qb-sidebar__item--active' : '' }}"
               title="Người dùng">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
            </a>
            <a href="{{ route('admin.reviews.index') }}"
               class="qb-sidebar__item {{ request()->routeIs('admin.reviews.*') ? 'qb-sidebar__item--active' : '' }}"
               title="Đánh giá">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            </a>
        </nav>

        {{-- Bottom --}}
        <div class="qb-sidebar__bottom">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="qb-sidebar__item" title="Đăng xuất">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                </button>
            </form>
        </div>
    </aside>

    {{-- ── Main area ── --}}
    <div class="qb-admin__main">

        {{-- Topbar --}}
        <header class="qb-topbar">
            <div class="qb-topbar__title">
                {{ $section_title ?? 'Dashboard' }}
            </div>
            <div class="qb-topbar__right">
                <a href="{{ route('home') }}" class="qb-topbar__btn" title="Về trang chủ">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                </a>
                @auth
                <div class="qb-topbar__user">
                    <div class="qb-topbar__avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="qb-topbar__user-info">
                        <span class="qb-topbar__user-name">{{ Auth::user()->name }}</span>
                        <span class="qb-topbar__user-role">{{ Auth::user()->isAdmin() ? 'Admin' : 'User' }}</span>
                    </div>
                </div>
                @endauth
            </div>
        </header>

        {{-- Content --}}
        <main class="qb-admin__content">
            {{ $slot }}
        </main>

        <footer class="qb-admin__footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </footer>
    </div>
</div>

<x-toast />
<x-confirm />

<script>
    const toggle = document.getElementById('menu-toggle');
    if (toggle) {
        toggle.addEventListener('click', () => {
            document.getElementById('qb-sidebar').classList.toggle('qb-sidebar--open');
        });
    }
</script>
</body>
</html>