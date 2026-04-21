<x-layout>

    <x-slot:title>
        Browse Our Movie Collection - Movie Box
    </x-slot>

    <x-slot:section_title>
        🎬 Browse Our Movie Collection
    </x-slot>


    <ul class="flex flex-col gap-6">
        @foreach ($movies as $movie)
            <li>
                <div
                    class="flex flex-col sm:flex-row items-stretch bg-card text-card-foreground border border-border rounded-radius shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">

                    <div class="w-full sm:w-48 h-60 sm:h-auto bg-muted overflow-hidden">
                        @if ($movie->poster)
                            <img src="{{ asset('/posters/' . ($movie->poster ?? 'placeholder.png')) }}"
                                alt="{{ $movie->title }}" class="w-full h-full object-cover rounded-md shadow-sm" />
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center text-muted-foreground text-sm font-medium bg-muted">
                                No Poster
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col justify-between flex-1 p-5 space-y-3">
                        <div class="space-y-2">
                            <h2 class="text-2xl font-semibold leading-snug text-foreground">
                                {{ $movie->title }}
                            </h2>

                            <p class="text-sm text-muted-foreground line-clamp-2 leading-relaxed">
                                {{ $movie->description }}
                            </p>

                            <dl class="grid grid-cols-2 gap-x-4 gap-y-1 text-sm text-muted-foreground">
                                <div>
                                    <dt class="font-medium text-foreground">Category:</dt>
                                    <dd>{{ $movie->category ?? 'General' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-foreground">Language:</dt>
                                    <dd>{{ $movie->language ?? 'English' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-foreground">Year:</dt>
                                    <dd>{{ $movie->year ?? '2025' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-foreground">Duration:</dt>
                                    <dd>{{ $movie->duration ?? '120' }} min</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="pt-2 flex justify-between items-center">
                            <span class="inline-block text-sm font-medium text-yellow-500">
                                ⭐ {{ $movie->rating }}/10
                            </span>
                            <a href="{{ route('movies.detail', $movie->slug) }}"
                                class="inline-flex items-center px-4 py-2 bg-primary text-primary-foreground text-sm font-semibold rounded-radius hover:bg-primary/90 transition">
                                🎟 View Trailer
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>



    <div class="mt-10">
        {{ $movies->links() }}
    </div>

</x-layout>
