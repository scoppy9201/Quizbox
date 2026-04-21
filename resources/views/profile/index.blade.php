<x-layout>
    <x-slot:title>Profile – MovieBox</x-slot>

    <div class="flex flex-col h-screen overflow-hidden bg-muted/20">
        {{-- Header --}}
        <div class="px-4 py-3 border-b border-border flex items-center justify-between bg-background">
            <h1 class="text-lg font-semibold text-foreground">👤 Your Profile</h1>
            <span class="text-sm text-muted-foreground">Welcome, {{ auth()->user()->name }}</span>
        </div>

        {{-- Main Content --}}
        <div class="flex-1 overflow-y-auto p-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                {{-- Left Sidebar --}}
                <div class="space-y-4">
                    {{-- Account Info --}}
                    <div class="border border-border rounded-lg bg-card p-4 shadow-sm">
                        <h2 class="text-xs font-medium text-muted-foreground mb-2">Account Info</h2>
                        <ul class="text-sm text-foreground space-y-1">
                            <li><strong>Name:</strong> {{ auth()->user()->name }}</li>
                            <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                            <li><strong>Joined:</strong> {{ auth()->user()->created_at->format('M d, Y') }}</li>
                        </ul>
                    </div>

                    {{-- Reviews --}}
                    <div class="border border-border rounded-lg bg-card p-4 shadow-sm">
                        <h2 class="text-xs font-medium text-muted-foreground mb-3">💬 Your Reviews</h2>
                        <div class="space-y-4">
                            @forelse ($reviews as $review)
                                <div class="pb-4 border-b border-border last:border-0 last:pb-0">
                                    <p class="font-semibold text-foreground text-sm">{{ $review->movie->title }}</p>
                                    <p class="text-xs text-muted-foreground mt-1">
                                        <span class="font-bold">⭐ {{ $review->rating }}/10</span> —
                                        {{ $review->created_at->format('M d, Y') }}
                                    </p>
                                    <p class="text-sm mt-2">{{ $review->comment }}</p>
                                </div>
                            @empty
                                <p class="text-sm text-muted-foreground">No reviews yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Right Content --}}
                <div class="lg:col-span-2 border border-border rounded-lg bg-card p-4 shadow-sm">
                    <h2 class="text-xs font-medium text-muted-foreground mb-4">🎟️ Your Booked Shows</h2>

                    <div class="space-y-6">
                        @forelse ($bookings as $booking)
                            <div
                                class="flex flex-col sm:flex-row gap-4 pb-6 border-b border-border last:border-none last:pb-0">
                                {{-- Poster --}}
                                <div class="w-24 h-36 bg-muted rounded-md overflow-hidden flex-shrink-0">
                                    @if ($booking->show->movie->poster)
                                        <img src="{{ asset('/posters/' . $booking->show->movie->poster) }}"
                                            alt="{{ $booking->show->movie->title }}"
                                            class="w-full h-full object-cover" />
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center text-xs text-muted-foreground p-2 text-center">
                                            No Poster</div>
                                    @endif
                                </div>

                                {{-- Details --}}
                                <div class="flex-1 text-sm">
                                    <p class="text-base font-semibold text-foreground">
                                        {{ $booking->show->movie->title }}</p>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-1 gap-x-4 mt-2">
                                        <p><strong>📍 City:</strong> {{ $booking->show->city }}</p>
                                        <p><strong>📅 Date:</strong>
                                            {{ \Carbon\Carbon::parse($booking->show->show_date)->format('M d, Y') }}
                                        </p>
                                        <p><strong>⏰ Time:</strong>
                                            {{ \Carbon\Carbon::parse($booking->show->show_time)->format('h:i A') }}</p>
                                        <p><strong>🎫 Class:</strong> {{ $booking->class_type }}</p>
                                        <p><strong>💰 Total:</strong> Rs {{ $booking->total_price }}</p>
                                        <p><strong>🎟️ Qty:</strong> {{ $booking->quantity }}
                                            ({{ $booking->is_kid ? 'Kid' : 'Adult' }})
                                        </p>
                                    </div>
                                    <a href="{{ route('movies.detail', $booking->show->movie->slug) }}"
                                        class="inline-block mt-4 text-sm text-primary hover:underline">View Movie
                                        Details →</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-muted-foreground">You haven't booked any shows yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
