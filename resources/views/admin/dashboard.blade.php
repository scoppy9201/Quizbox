<x-admin-layout :title="'Admin Dashboard - MovieBox'">
    <section class="space-y-10">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6 border-b border-border pb-4">
            <h1 class="text-3xl font-bold text-primary tracking-tight">Admin Dashboard</h1>
            <span class="text-md text-muted-foreground">Welcome back, {{ Auth::user()->name }} 👋</span>
        </div>

        {{-- Stats Cards --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <x-admin.card title="Total Movies" :value="$moviesCount" />
            <x-admin.card title="Registered Users" :value="$usersCount" />
            <x-admin.card title="Total Shows" :value="$showsCount" />
            <x-admin.card title="Total Bookings" :value="$bookingsCount" />
            <x-admin.card title="Total Revenue" :value="'Rs ' . number_format($totalRevenue)" />
            <x-admin.card title="Movie Reviews" :value="$reviewsCount" />
        </div>

        {{-- Quick Actions --}}
        <div class="space-y-4">
            <h2 class="text-lg font-semibold text-foreground">⚡ Quick Actions</h2>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.movies.create') }}" class="btn btn-primary">➕ Add Movie</a>
                <a href="{{ route('admin.shows.create') }}" class="btn btn-primary">🎬 Add Show</a>
                <a href="{{ route('admin.movies.index') }}" class="btn btn-outline">📂 Manage Movies</a>
                <a href="{{ route('admin.shows.index') }}" class="btn btn-outline">🗓️ Manage Shows</a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline">👥 View Users</a>
                <a href="{{ route('admin.reviews.index') }}" class="btn btn-outline">⭐ Manage Reviews</a>
            </div>
        </div>

        {{-- Recent Bookings --}}
        @if ($recentBookings->count())
            <div class="space-y-4">
                <h2 class="text-lg font-semibold text-foreground">🕒 Recent Bookings</h2>
                <div class="overflow-x-auto rounded-xl border border-border bg-card shadow-sm">
                    <table class="w-full text-sm table-auto">
                        <thead class="bg-muted text-muted-foreground">
                            <tr>
                                <th class="px-4 py-3 text-left">User</th>
                                <th class="px-4 py-3 text-left">Movie</th>
                                <th class="px-4 py-3 text-left">Show Time</th>
                                <th class="px-4 py-3 text-left">Tickets</th>
                                <th class="px-4 py-3 text-left">Class</th>
                                <th class="px-4 py-3 text-left">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border">
                            @foreach ($recentBookings as $booking)
                                <tr>
                                    <td class="px-4 py-3">{{ $booking->user->name }}</td>
                                    <td class="px-4 py-3">{{ $booking->show->movie->title }}</td>
                                    <td class="px-4 py-3">
                                        {{ \Carbon\Carbon::parse($booking->show->show_date)->format('M d') }},
                                        {{ \Carbon\Carbon::parse($booking->show->show_time)->format('h:i A') }}
                                    </td>
                                    <td class="px-4 py-3">{{ $booking->quantity }}</td>
                                    <td class="px-4 py-3">{{ $booking->class_type }}</td>
                                    <td class="px-4 py-3">Rs {{ $booking->total_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Top Rated Movies --}}
        @if ($topMovies->count())
            <div class="space-y-4">
                <h2 class="text-lg font-semibold text-foreground">🏆 Top Rated Movies</h2>
                <ul class="grid sm:grid-cols-2 lg:grid-cols-3  xl:grid-cols-4 gap-6">
                    @foreach ($topMovies as $movie)
                        <li class="bg-card border border-border rounded-lg p-4 shadow-sm flex gap-4">
                            <img src="{{ asset('/posters/' . ($movie->poster ?? 'placeholder.png')) }}"
                                alt="{{ $movie->title }}"
                                class="w-16 h-24 object-cover rounded-md border border-border" />
                            <div class="text-sm w-full">
                                <h3 class="font-semibold text-foreground text-base">{{ $movie->title }}</h3>
                                <p class="text-muted-foreground text-xs">
                                    {{ $movie->category ?? 'General' }} · {{ $movie->language ?? 'English' }}<br>
                                    ⭐ {{ $movie->rating }}/10 · {{ $movie->year }}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </section>
</x-admin-layout>
