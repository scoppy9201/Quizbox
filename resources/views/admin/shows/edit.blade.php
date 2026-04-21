<x-admin-layout title="Edit Show - Movie Box">
    <nav class="text-sm text-muted-foreground mb-6" aria-label="breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-primary">Dashboard</a><span
                    class="mx-2">/</span>
            </li>
            <li><a href="{{ route('admin.shows.index') }}" class="hover:text-primary">Shows</a><span
                    class="mx-2">/</span></li>
            <li class="text-foreground" aria-current="page">Edit Show</li>
        </ol>
    </nav>

    <div class="bg-card border border-border rounded-xl p-8 shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-foreground">Update Show</h2>

        <form action="{{ route('admin.shows.update', $show->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="bg-destructive/10 border border-destructive text-destructive text-sm p-4 rounded-lg">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2 text-muted-foreground">Movie</label>
                    <select name="movie_id" required
                        class="w-full bg-background border border-border rounded-lg py-2 px-3 text-foreground focus:ring-2 focus:ring-primary">
                        @foreach ($movies as $movie)
                            <option value="{{ $movie->id }}" @selected($show->movie_id == $movie->id)>
                                {{ $movie->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-px">
                        <label for="price_silver" class="block text-sm font-semibold text-muted-foreground mb-1">
                            Silver Class <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-sm text-muted-foreground">Rs</span>
                            <input type="number" name="price_silver" id="price_silver" step="5" min="500"
                                value="500"
                                class="w-full pl-10 pr-3 py-2 rounded-lg border border-border bg-background text-foreground focus:ring-2 focus:ring-primary"
                                value="{{ old('price_silver') }}" required />
                        </div>
                    </div>

                    {{-- Gold --}}
                    <div class="p-px">
                        <label for="price_gold" class="block text-sm font-semibold text-muted-foreground mb-1">
                            Gold Class <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-sm text-muted-foreground">Rs</span>
                            <input type="number" name="price_gold" id="price_gold" step="5" min="800"
                                value="800"
                                class="w-full pl-10 pr-3 py-2 rounded-lg border border-border bg-background text-foreground focus:ring-2 focus:ring-primary"
                                value="{{ old('price_gold') }}" required />
                        </div>
                    </div>

                    {{-- Platinum --}}
                    <div class="p-px">
                        <label for="price_platinum" class="block text-sm font-semibold text-muted-foreground mb-1">
                            Platinum Class <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-sm text-muted-foreground">Rs</span>
                            <input type="number" name="price_platinum" id="price_platinum" step="5"
                                min="1200" value="1200"
                                class="w-full pl-10 pr-3 py-2 rounded-lg border border-border bg-background text-foreground focus:ring-2 focus:ring-primary"
                                value="{{ old('price_platinum') }}" required />
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-muted-foreground">City</label>
                    <input type="text" name="city" value="{{ $show->city }}"
                        class="w-full bg-background border border-border rounded-lg py-2 px-3 text-foreground focus:ring-2 focus:ring-primary"
                        required />
                </div>




                <div>
                    <label class="block text-sm font-medium mb-2 text-muted-foreground">Location</label>
                    <input type="text" name="location" value="{{ $show->location }}"
                        class="w-full bg-background border border-border rounded-lg py-2 px-3 text-foreground focus:ring-2 focus:ring-primary" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-muted-foreground">Show Date</label>
                    <input type="date" name="show_date" value="{{ $show->show_date }}"
                        class="w-full bg-background border border-border rounded-lg py-2 px-3 text-foreground focus:ring-2 focus:ring-primary"
                        required />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-muted-foreground">Show Time</label>
                    <input type="time" name="show_time" value="{{ $show->show_time }}"
                        class="w-full bg-background border border-border rounded-lg py-2 px-3 text-foreground focus:ring-2 focus:ring-primary"
                        required />
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-full text-base">
                Update Show
            </button>
        </form>
    </div>
</x-admin-layout>
