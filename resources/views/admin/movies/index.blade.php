<x-admin-layout title="Movies List - Movie Box">
    {{-- Breadcrumb --}}
    <nav class="text-sm text-muted-foreground mb-6" aria-label="breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary transition-colors">Dashboard</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-foreground" aria-current="page">Movies</span>
            </li>
        </ol>
    </nav>

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h1 class="text-3xl font-bold text-primary tracking-tight">
            All Movies</h1>
        <a href="{{ route('admin.movies.create') }}" class="btn btn-primary w-full sm:w-auto">
            + Add New Movie
        </a>
    </div>

    @if ($movies->count())
        {{-- Responsive Table --}}
        <div class="overflow-x-auto bg-card border border-border rounded-xl shadow-sm">
            <table class="w-full min-w-[700px] text-sm text-left">
                <thead class="bg-muted text-muted-foreground">
                    <tr>
                        <th class="px-4 py-3">Poster</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Language</th>
                        <th class="px-4 py-3">Rating</th>
                        <th class="px-4 py-3">Year</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr class="border-t border-border hover:bg-muted/40 transition-colors">
                            <td class="px-4 py-3">
                                <img src="{{ asset('/posters/' . ($movie->poster ?? 'placeholder.png')) }}"
                                    alt="{{ $movie->title }}" class="w-14 h-20 object-cover rounded shadow-sm">
                            </td>
                            <td class="px-4 py-3 font-medium text-foreground max-w-[160px] truncate">
                                {{ $movie->title }}
                            </td>
                            <td class="px-4 py-3">{{ $movie->category ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $movie->language ?? '-' }}</td>
                            <td class="px-4 py-3">⭐ {{ $movie->rating }}/10</td>
                            <td class="px-4 py-3">{{ $movie->year }}</td>
                            <td class="px-4 py-3 text-right space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.movies.edit', $movie->slug) }}"
                                    class="btn btn-outline text-xs">Edit</a>
                                <form action="{{ route('admin.movies.destroy', $movie->slug) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this movie?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-destructive text-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $movies->links() }}
        </div>
    @else
        <div class="text-center text-muted-foreground mt-12">
            <p>No movies added yet.</p>
        </div>
    @endif
</x-admin-layout>
