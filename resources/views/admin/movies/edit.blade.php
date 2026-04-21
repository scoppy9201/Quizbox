<x-admin-layout :title="'Edit Movie - Movie Box'">
    <nav class="text-sm text-muted-foreground mb-6" aria-label="breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href={{ route('admin.dashboard') }} class="hover:text-primary transition-colors">Dashboard</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <a href="{{ route('admin.movies.index') }}" class="hover:text-primary transition-colors">Movies</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <a href="{{ route('admin.movies.edit', $movie->slug) }}" class="hover:text-primary transition-colors">
                    <span class="text-foreground" aria-current="page">Edit Movie</span>
                </a>
            </li>
        </ol>
    </nav>

    <div class="bg-card border border-border rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-foreground mb-6">Edit Movie Details</h2>

        <form action="{{ route('admin.movies.update', $movie->slug) }}" method="POST" class="space-y-6"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="bg-destructive/10 border border-destructive text-destructive text-sm p-4 rounded-lg">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="hidden" name="old_poster" value="{{ $movie->poster }}">

            <div class="grid
                grid-cols-1 md:grid-cols-2 gap-6">
                <x-form.input label="Movie Title" name="title" required :value="$movie->title"
                    placeholder="e.g., The Matrix" />
                <x-form.input label="Category" name="category" :value="$movie->category" placeholder="e.g., Sci-Fi, Action" />
                <x-form.input label="Language" name="language" :value="$movie->language" placeholder="e.g., English" />
                <x-form.input label="Duration (minutes)" name="duration" type="number" :value="$movie->duration"
                    placeholder="e.g., 120" />
                <x-form.input label="Release Year" name="year" type="number" :value="$movie->year"
                    placeholder="e.g., 2024" />
                <x-form.input label="Rating (out of 10)" name="rating" type="number" step="0.1" min="0"
                    max="10" required :value="$movie->rating" placeholder="e.g., 8.7" />
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-muted-foreground mb-2">Description <span
                        class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="5"
                    class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-y"
                    required>{{ old('description', $movie->description) }}</textarea>
            </div>

            {{-- Links --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form.input label="Full Movie Link (Optional)" name="link" type="url" :value="$movie->link"
                    placeholder="https://example.com/movie" />
                <x-form.input label="Trailer URL (YouTube Embed)" name="trailer_url" type="url" required
                    :value="$movie->trailer_url" placeholder="https://youtube.com/embed/..." />
            </div>

            {{-- Poster --}}
            <div>
                <label for="poster" class="block text-sm font-medium text-muted-foreground mb-2">Update Poster
                    Image</label>
                <input type="file" name="poster" id="poster" accept="image/*"
                    class="block w-full text-sm text-foreground
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:text-sm file:font-semibold
                    file:bg-primary file:text-primary-foreground
                    hover:file:bg-primary/90 transition-colors cursor-pointer"
                    onchange="document.getElementById('poster-preview').src = window.URL.createObjectURL(this.files[0])">
                <p class="mt-1 text-xs text-muted-foreground">Leave blank to keep current image.</p>

                <div
                    class="mt-4 w-48 bg-muted rounded-lg overflow-hidden flex items-center justify-center border border-border shadow-sm">
                    <img id="poster-preview" src="{{ asset($movie->poster ?? 'path/to/placeholder.jpg') }}"
                        alt="Current Poster" class="w-full h-auto object-cover">
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full py-3 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors duration-200 ease-in-out font-semibold text-lg focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                Update Movie
            </button>
        </form>
    </div>
</x-admin-layout>
