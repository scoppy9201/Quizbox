<x-layout :title="$title" :section_title="$movie->title">

    <nav class="text-sm text-muted-foreground mb-6" aria-label="breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href="/" class="hover:text-primary transition-colors">Home</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <a href="{{ route('movies.index') }}" class="hover:text-primary transition-colors">Movies</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-foreground" aria-current="page">{{ $movie->title }}</span>
            </li>
        </ol>
    </nav>

    {{-- Hero Section: Movie Poster & Details --}}
    <section
        class="bg-card border border-border rounded-2xl shadow-lg p-8 flex flex-col md:flex-row items-start gap-8 mb-10">
        {{-- Poster --}}
        <div class="w-full md:w-80 h-auto md:h-[450px] bg-muted rounded-xl overflow-hidden flex-shrink-0 shadow-md">
            @if ($movie->poster)
                <img src="{{ asset('/posters/' . $movie->poster) }}" alt="{{ $movie->title }} Poster"
                    class="w-full h-full object-cover" loading="lazy" />
            @else
                <div class="w-full h-full flex items-center justify-center text-muted-foreground text-lg font-medium">
                    No Poster Available
                </div>
            @endif
        </div>

        <div class="flex-1 flex flex-col justify-between h-full">
            <div class="space-y-5">
                <h1 class="text-4xl font-extrabold text-primary leading-tight">{{ $movie->title }}</h1>
                <p class="text-md text-muted-foreground leading-relaxed">
                    {{ $movie->description ?? 'No description available for this movie yet.' }}
                </p>

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-3 text-sm text-muted-foreground">
                    <p><span class="font-semibold text-foreground">Category:</span> {{ $movie->category ?? 'General' }}
                    </p>
                    <p><span class="font-semibold text-foreground">Language:</span> {{ $movie->language ?? 'English' }}
                    </p>
                    <p><span class="font-semibold text-foreground">Duration:</span>
                        {{ $movie->duration ? $movie->duration . ' min' : 'N/A' }}</p>
                    <p><span class="font-semibold text-foreground">Year:</span> {{ $movie->year ?? 'TBA' }}</p>
                    <div class="flex items-center gap-2">
                        <span class="text-yellow-500 text-xl">⭐</span>
                        <span
                            class="text-lg font-bold text-foreground">{{ number_format($movie->rating, 1) ?? 'N/A' }}/10</span>
                    </div>
                </div>
            </div>

            @if ($movie->link)
                <a href="{{ $movie->link }}" target="_blank" rel="noopener noreferrer"
                    class="mt-8 py-3! btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-5 h-5 mr-2">
                        <path
                            d="M2.25 18.75a60.07 60.07 0 0 1 15.795 2.104c.207.093.344-.006.32-.223A8.96 8.96 0 0 0 18 6.477V4.243c0-1.077-.99-1.666-1.933-1.085L4.785 8.1A.75.75 0 0 0 4 8.854v5.392a4.5 4.5 0 0 0 2.25 3.894M18 4.243v4.471l4.172-2.39a.75.75 0 0 0 0-1.282L18 4.243Z" />
                    </svg>
                    Watch Full Movie
                </a>
            @endif
        </div>
    </section>

    @if ($movie->trailer_url)
        <section class="bg-card border border-border rounded-2xl shadow-lg overflow-hidden mb-10">
            <h2 class="px-6 pt-6 text-2xl font-bold text-foreground mb-4">Official Trailer</h2>
            <div class="aspect-video w-full bg-black">
                <iframe src="{{ $movie->trailer_url }}" title="{{ $movie->title }} Official Trailer"
                    class="w-full h-full" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen loading="lazy">
                </iframe>
            </div>
        </section>
    @endif

    {{-- Available Shows --}}
    <section class="mb-10">
        <h2 class="text-2xl font-bold text-foreground mb-5">Available Shows</h2>

        @if ($movie->shows->isEmpty())
            <p class="text-md text-muted-foreground bg-muted p-4 rounded-lg border border-border">
                No shows are scheduled for this movie yet. Please check back later!
            </p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($movie->shows as $show)
                    <form action="{{ route('bookings.store') }}" method="POST"
                        class="bg-card rounded-xl p-5 border border-border shadow-sm space-y-4 {{ Auth::check() ? '' : ' opacity-90' }}">
                        @csrf

                        <input type="hidden" name="show_id" value="{{ $show->id }}">
                        <input type="hidden" name="is_kid" value="{{ $isKid ? 1 : 0 }}">

                        <h3 class="text-xl font-semibold text-foreground mb-2">🎬 {{ $movie->title }}</h3>

                        <div class="text-sm text-muted-foreground space-y-1">
                            <p><span class="font-medium text-foreground">City:</span> {{ $show->city }}</p>
                            <p><span class="font-medium text-foreground">Location:</span>
                                {{ $show->location ?? 'N/A' }}</p>
                            <p><span class="font-medium text-foreground">Date:</span>
                                {{ \Carbon\Carbon::parse($show->show_date)->format('M d, Y') }}</p>
                            <p><span class="font-medium text-foreground">Time:</span>
                                {{ \Carbon\Carbon::parse($show->show_time)->format('h:i A') }}</p>
                        </div>

                        <div>
                            <label for="class_type" class="block text-sm font-medium text-muted-foreground mb-1">Select
                                Class</label>
                            <select name="class_type" id="class_type"
                                class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3">
                                <option value="Silver">Silver - Rs {{ $show->price_silver }}</option>
                                <option value="Gold">Gold - Rs {{ $show->price_gold }}</option>
                                <option value="Platinum">Platinum - Rs {{ $show->price_platinum }}</option>
                            </select>
                        </div>

                        <div>
                            <label for="quantity"
                                class="block text-sm font-medium text-muted-foreground mb-1">Tickets</label>
                            <input type="number" name="quantity" id="quantity" min="1" value="1"
                                class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3"
                                required>
                        </div>

                        <label class="inline-flex items-center space-x-2 text-sm text-muted-foreground">
                            <input type="checkbox" name="is_kid" value="1" class="rounded border-border">
                            <span>Booking for a kid (3–12 years)?</span>
                        </label>

                        @auth
                            <button type="submit" class="btn btn-primary w-full mt-2">Book Now</button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary w-full text-center">Login to Book</a>
                        @endauth
                    </form>
                @endforeach
            </div>
        @endif
    </section>

    {{-- Review Section --}}
    <section class="mb-10">
        <h2 class="text-2xl font-bold text-foreground mb-5">Reviews ({{ $movie->reviews->count() }})</h2>

        @auth
            <div class="bg-card border border-border rounded-2xl shadow-sm p-6 mb-8">
                <h3 class="text-xl font-semibold text-foreground mb-4">Leave Your Review</h3>
                <form method="POST" action="{{ route('reviews.store') }}" class="space-y-5">
                    @csrf
                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">

                    @if ($errors->any())
                        <div class="bg-destructive/10 border border-destructive text-destructive text-sm p-4 rounded-lg">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="rating" class="block text-sm font-medium text-muted-foreground mb-2">Your
                                Rating</label>
                            <select name="rating" id="rating" required
                                class="mt-1 block w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                                <option value="">Select a rating</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                        {{ $i }} / 10</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label for="comment" class="block text-sm font-medium text-muted-foreground mb-2">Your
                                Comment</label>
                            <textarea name="comment" id="comment" rows="4" required
                                class="mt-1 block w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-y"
                                placeholder="Share your thoughts about the movie...">{{ old('comment') }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-2! btn btn-primary">
                        Submit Review
                    </button>
                </form>
            </div>
        @else
            <p class="text-md text-muted-foreground bg-muted p-4 rounded-lg border border-border mb-8">
                <a href="{{ route('login') }}" class="text-primary hover:underline font-medium">Log in</a> to leave a
                review for this movie.
            </p>
        @endauth

        {{-- Reviews List --}}
        @if ($movie->reviews->isEmpty())
            <p class="text-md text-muted-foreground bg-muted p-4 rounded-lg border border-border">
                No reviews have been posted yet. Be the first to share your opinion!
            </p>
        @else
            <div class="space-y-6">
                @foreach ($movie->reviews as $review)
                    <div class="border border-border rounded-lg p-5 bg-card shadow-sm">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-3">
                            <span class="font-bold text-foreground text-lg">{{ $review->user->name }}</span>
                            <span class="text-yellow-500 text-md font-medium mt-1 sm:mt-0">
                                ⭐ {{ number_format($review->rating, 1) }}/10
                            </span>
                        </div>
                        <p class="text-foreground leading-relaxed">{{ $review->comment }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

</x-layout>
