<x-admin-layout title="Add New Movie - Movie Box">
    <nav class="text-sm text-muted-foreground mb-6" aria-label="breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href={{ route('admin.dashboard') }} class="hover:text-primary transition-colors">Dashboard</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-foreground">Add New Movie</span>
            </li>
        </ol>
    </nav>

    <div class="bg-card border border-border rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-foreground mb-6">Enter Movie Details</h2>

        <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- Basic Info --}}
            <div>
                <h3 class="text-lg font-semibold text-foreground mb-4">Basic Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-sm font-medium text-muted-foreground mb-1">
                            Movie Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" autofocus required
                            class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary"
                            value="{{ old('title') }}" placeholder="e.g., The Matrix">
                        @error('title')
                            <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div>
                        <label for="category"
                            class="block text-sm font-medium text-muted-foreground mb-1">Category</label>
                        <input type="text" name="category" id="category"
                            class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3"
                            value="{{ old('category') }}" placeholder="e.g., Action, Thriller">
                        @error('category')
                            <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Language --}}
                    <div>
                        <label for="language"
                            class="block text-sm font-medium text-muted-foreground mb-1">Language</label>
                        <input type="text" name="language" id="language"
                            class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3"
                            value="{{ old('language') }}" placeholder="e.g., English, Urdu">
                        @error('language')
                            <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Duration --}}
                    <div>
                        <label for="duration" class="block text-sm font-medium text-muted-foreground mb-1">Duration
                            (minutes)</label>
                        <input type="number" name="duration" id="duration"
                            class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3"
                            value="{{ old('duration') }}" placeholder="e.g., 120">
                        @error('duration')
                            <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Year --}}
                    <div>
                        <label for="year" class="block text-sm font-medium text-muted-foreground mb-1">Release
                            Year</label>
                        <input type="number" name="year" id="year"
                            class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3"
                            value="{{ old('year', now()->year) }}" placeholder="e.g., 2024">
                        @error('year')
                            <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Rating --}}
                    <div>
                        <label for="rating" class="block text-sm font-medium text-muted-foreground mb-1">Rating (out
                            of 10) <span class="text-red-500">*</span></label>
                        <input type="number" step="0.1" min="1" max="10" name="rating" id="rating"
                            required
                            class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3"
                            value="{{ old('rating') }}" placeholder="e.g., 8.7">
                        @error('rating')
                            <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-muted-foreground mb-1">
                    Description <span class="text-red-500">*</span>
                </label>
                <textarea name="description" id="description" rows="4" maxlength="500"
                    class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 resize-y"
                    oninput="descCount.textContent = this.value.length + '/500'"
                    placeholder="Write a short description for the movie...">{{ old('description') }}</textarea>
                <p id="descCount" class="text-xs text-muted-foreground text-right">0/500</p>
                @error('description')
                    <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Media --}}
            <div>
                <h3 class="text-lg font-semibold text-foreground mb-4 mt-4">Media & Links</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Trailer URL --}}
                    <div>
                        <label for="trailer_url" class="block text-sm font-medium text-muted-foreground mb-1">Trailer
                            (YouTube Embed) <span class="text-red-500">*</span></label>
                        <input type="url" name="trailer_url" id="trailer_url" required
                            class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3"
                            value="{{ old('trailer_url') }}" placeholder="e.g., https://youtube.com/embed/abc123">
                        @error('trailer_url')
                            <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Movie Link --}}
                    <div>
                        <label for="link" class="block text-sm font-medium text-muted-foreground mb-1">Full Movie
                            Link (Optional)</label>
                        <input type="url" name="link" id="link"
                            class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3"
                            value="{{ old('link') }}" placeholder="e.g., https://example.com/watch">
                        <p class="text-xs text-muted-foreground mt-1">External link to the full movie (if any).</p>
                        @error('link')
                            <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Poster Upload --}}
            <div>
                <label for="poster" required class="block text-sm font-medium text-muted-foreground mb-1">Upload
                    Poster Image</label>
                <input type="file" name="poster" id="poster" accept="image/*"
                    class="block w-full text-sm text-foreground
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:bg-primary file:text-primary-foreground
                    hover:file:bg-primary/90 cursor-pointer transition"
                    onchange="document.getElementById('poster-preview').src = window.URL.createObjectURL(this.files[0])">

                <div class="mt-4">

                    <img id="poster-preview" class="rounded-lg w-40 h-auto hidden" alt="Preview" />
                    <span id="poster-placeholder" class="text-muted-foreground text-sm">No image selected</span>
                </div>
                @error('poster')
                    <p class="text-xs text-destructive mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full py-3 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition text-lg font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Add Movie
            </button>
        </form>
    </div>

    @if (old('poster'))
        <script>
            preview.src = "{{ asset('posters/' . old('poster')) }}";
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
        </script>
    @endif
    <script>
        // Character count init
        const descCount = document.getElementById('descCount');
        const description = document.getElementById('description');
        descCount.textContent = description.value.length + '/500';

        // Image preview fallback
        const preview = document.getElementById('poster-preview');
        const placeholder = document.getElementById('poster-placeholder');

        document.getElementById('poster').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                preview.src = URL.createObjectURL(this.files[0]);
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            } else {
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        });
    </script>
</x-admin-layout>
