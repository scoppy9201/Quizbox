<!DOCTYPE html>
<html lang="en" class="bg-background text-foreground">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Admin Panel' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-background text-foreground overflow-x-hidden">

    <header class="bg-card border-b border-border shadow-sm">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center relative">
            <!-- Logo -->
            <a href="{{ route('admin.dashboard') }}"
                class="text-xl font-bold text-primary hover:text-primary/80 transition-colors">
                Admin Panel
            </a>

            <!-- Hamburger (Mobile only) -->
            <button id="menu-toggle" class="sm:hidden text-foreground focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Mobile & Desktop Menu -->
            <div id="mobile-menu"
                class="absolute sm:static top-full left-0 w-full sm:w-auto bg-card sm:bg-transparent z-50 sm:flex sm:items-center sm:space-x-6 space-y-4 sm:space-y-0 px-4 sm:px-0 py-4 sm:py-0 hidden sm:flex-row flex-col mt-2 sm:mt-0 border-t sm:border-none border-border">

                <ul class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6 w-full sm:w-auto">
                    <li><a href="{{ route('admin.movies.index') }}"
                            class="btn btn-link w-full sm:w-auto text-left">Movies</a></li>
                    <li><a href="{{ route('admin.shows.index') }}"
                            class="btn btn-link w-full sm:w-auto text-left">Shows</a></li>
                    <li><a href="{{ route('admin.reviews.index') }}"
                            class="btn btn-link w-full sm:w-auto text-left">Reviews</a></li>
                    <li><a href="{{ route('admin.users.index') }}"
                            class="btn btn-link w-full sm:w-auto text-left">Customers</a></li>
                </ul>

                @auth
                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 sm:ml-6 w-full sm:w-auto">
                        <a href="{{ route('profile.index') }}"
                            class="btn btn-outline line-clamp-1  w-full sm:w-auto text-sm">
                            {{ Auth::user()->name }}
                        </a>
                        <a href="{{ route('admin.dashboard') }}"
                            class="btn btn-outline w-full sm:w-auto text-sm">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                            @csrf
                            <button type="submit" class="btn btn-destructive w-full sm:w-auto text-sm">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>
    </header>


    @if (session('success'))
        <div class="max-w-5xl mx-auto px-4 sm:px-6 mt-6">
            <div class="bg-green-100 text-green-800 text-sm p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (isset($section_title))
        <div class="max-w-5xl mx-auto px-4 sm:px-6 mt-10">
            <h1 class="text-3xl font-bold text-primary tracking-tight">
                {{ $section_title }}
            </h1>
        </div>
    @endif

    <main class="max-w-5xl min-h-[60vh] mx-auto px-4 sm:px-6 py-10 space-y-12">
        {{ $slot }}
    </main>


    <footer class="mt-12 py-6 border-t border-border text-center text-sm text-muted-foreground">
        &copy; {{ date('Y') }} Movie Box. All rights reserved.
    </footer>

    <script>
        const toggle = document.getElementById("menu-toggle");
        const menu = document.getElementById("mobile-menu");

        toggle.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>

</body>

</html>
