<x-layout>
    <x-slot:title>
        MovieBox | Book Tickets Online
    </x-slot>

    {{-- Hero Section --}}
    <section id="hero" class="flex relative flex-auto -mb-16 mt-[-4.75rem] overflow-hidden pb-32 pt-[4.75rem]">
        <div class="block">
            {{-- Background Image --}}
            <div
                class="absolute  hidden h-full max-h-[calc(100vh-57px)] w-full items-start justify-center overflow-hidden md:flex">
                <picture class="h-full w-full">
                    <source srcset="https://img.popcorntime.app/o/gzhOqRcWHE0gkMbgBH93.webp" media="(min-width: 960px)"
                        type="image/webp" />
                    <source srcset="https://img.popcorntime.app/o/gzhOqRcWHE0gkMbgBH93@960.webp" type="image/webp" />
                    <source srcset="https://img.popcorntime.app/o/gzhOqRcWHE0gkMbgBH93.jpg" media="(min-width: 960px)"
                        type="image/jpeg" />
                    <source srcset="https://img.popcorntime.app/o/gzhOqRcWHE0gkMbgBH93@960.jpg" type="image/jpeg" />
                    <img src="https://img.popcorntime.app/o/gzhOqRcWHE0gkMbgBH93.jpg" alt="MovieBox Hero"
                        class="aspect-[16/9] h-full w-full object-cover" loading="eager" fetchpriority="high" />
                </picture>

                <div
                    class="inset-0 hidden opacity-100 before:absolute before:inset-0 before:h-full before:w-full before:from-background before:via-background/90 before:to-transparent before:content-[''] landscape:block ltr:before:bg-gradient-to-r rtl:before:bg-gradient-to-l">
                </div>
                <div
                    class="absolute bottom-0 h-32 w-full bg-gradient-to-t from-background to-transparent ltr:left-0 rtl:right-0">
                </div>
                <div
                    class="absolute top-0 hidden h-32 w-full bg-gradient-to-b from-background to-transparent landscape:block ltr:left-0 rtl:right-0">
                </div>
            </div>

            {{-- Hero Content --}}
            <div class="relative flex flex-col px-4 sm:px-6 lg:px-10 landscape:min-h-[calc(100vh-108px)]">
                <div class="relative mb-6 flex flex-grow flex-row flex-wrap items-end justify-between">
                    <div
                        class="relative mt-6 flex w-full flex-row flex-wrap items-end justify-between sm:max-w-3xl xl:max-w-4xl">
                        <div class="flex w-full flex-col gap-3 overflow-hidden">
                            <div class="mt-10 max-w-lg md:mt-0 md:max-w-xl xl:max-w-2xl">
                                <h2
                                    class="font-display inline bg-gradient-to-r from-indigo-200 via-sky-400 to-indigo-200 bg-clip-text text-5xl tracking-tight text-transparent">
                                    Your Gateway to Movies, Shows
                                    <span class="whitespace-nowrap font-thin italic text-sky-400">and more...</span>
                                </h2>
                                <p class="mt-3 text-2xl leading-10 tracking-tight text-muted-foreground">
                                    Discover the latest movies, stream trailers, and book your favorite shows — all in
                                    one place.
                                </p>
                                <a title="Browse Shows" href="{{ route('shows.index') }}"
                                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-accent text-accent-foreground shadow-sm hover:bg-accent/80 h-9 px-4 mt-6 py-6 text-2xl">
                                    🎟 Browse Shows
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Now Showing --}}
    <section class="py-16 px-6 bg-background">
        <h2 class="text-3xl font-bold mb-6 text-foreground">🎬 Now Showing</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($nowShowing as $movie)
                <div
                    class="group bg-card rounded-xl shadow-md overflow-hidden border border-border hover:shadow-lg transition duration-200">
                    <div class="relative">
                        <img src="{{ asset('/posters/' . ($movie->poster ?? 'placeholder.png')) }}"
                            alt="{{ $movie->title }}"
                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-[1.02]" />
                        <div
                            class="absolute top-2 left-2 bg-primary text-primary-foreground text-xs font-medium px-2 py-1 rounded">
                            ⭐ {{ $movie->rating }}/10
                        </div>
                    </div>
                    <div class="p-4 space-y-2">
                        <h3 class="text-lg font-semibold text-foreground">{{ $movie->title }}</h3>
                        <p class="text-sm text-muted-foreground line-clamp-2">{{ Str::limit($movie->description, 90) }}
                        </p>
                        <div class="flex justify-between items-center pt-2">
                            <span class="text-xs text-muted-foreground">
                                {{ $movie->duration ?? 120 }} min · {{ $movie->language ?? 'English' }}
                            </span>
                            <a href="{{ route('movies.detail', $movie->slug) }}"
                                class="text-sm text-primary hover:underline font-medium">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Top Rated --}}
    @if ($topRatedMovies->count())
        <section class="py-16 px-6 bg-muted/20">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold mb-6 text-foreground">🔥 Top Rated Movies</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($topRatedMovies as $movie)
                        <div
                            class="group bg-card rounded-xl shadow-md overflow-hidden border border-border hover:shadow-lg transition duration-200">
                            <div class="relative">
                                <img src="{{ asset('/posters/' . ($movie->poster ?? 'placeholder.png')) }}"
                                    alt="{{ $movie->title }}"
                                    class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-[1.02]" />
                                <div
                                    class="absolute top-2 left-2 bg-primary text-primary-foreground text-xs font-medium px-2 py-1 rounded">
                                    ⭐ {{ $movie->rating }}/10
                                </div>
                            </div>
                            <div class="p-4 space-y-2">
                                <h3 class="text-lg font-semibold text-foreground">{{ $movie->title }}</h3>
                                <p class="text-sm text-muted-foreground line-clamp-2">
                                    {{ Str::limit($movie->description, 90) }}</p>
                                <div class="flex justify-between items-center pt-2">
                                    <span class="text-xs text-muted-foreground">
                                        {{ $movie->duration ?? 120 }} min · {{ $movie->language ?? 'English' }}
                                    </span>
                                    <a href="{{ route('movies.detail', $movie->slug) }}"
                                        class="text-sm text-primary hover:underline font-medium">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layout>
