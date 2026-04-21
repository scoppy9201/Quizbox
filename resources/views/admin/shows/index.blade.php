<x-admin-layout title="Shows List - Movie Box">
    {{-- Breadcrumb --}}
    <nav class="text-sm text-muted-foreground mb-6" aria-label="breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary transition-colors">Dashboard</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-foreground" aria-current="page">Shows</span>
            </li>
        </ol>
    </nav>



    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h1 class="text-3xl font-bold text-primary tracking-tight">
            Shows List
        </h1>
        <a href="{{ route('admin.shows.create') }}" class="btn btn-primary w-full sm:w-auto">
            + Add New Show
        </a>
    </div>

    @if ($shows->count())
        <div class="overflow-x-auto bg-card border border-border rounded-xl shadow-sm">
            <table class="w-full min-w-[700px] table-auto text-sm text-left">
                <thead class="bg-muted text-muted-foreground">
                    <tr>
                        <th class="px-4 py-3 whitespace-nowrap">Movie</th>
                        <th class="px-4 py-3 whitespace-nowrap">City</th>
                        <th class="px-4 py-3 whitespace-nowrap">Location</th>
                        <th class="px-4 py-3 whitespace-nowrap">Show Date</th>
                        <th class="px-4 py-3 whitespace-nowrap">Show Time</th>
                        <th class="px-4 py-3 whitespace-nowrap text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shows as $show)
                        <tr class="border-t border-border hover:bg-muted/40 transition-colors">
                            <td class="px-4 py-3 font-medium text-foreground">
                                {{ $show->movie->title }}
                            </td>
                            <td class="px-4 py-3">{{ $show->city }}</td>
                            <td class="px-4 py-3">{{ $show->location ?? '-' }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($show->show_date)->format('d M Y') }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($show->show_time)->format('h:i A') }}</td>
                            <td class="px-4 py-3 space-x-2 text-right whitespace-nowrap">
                                <a href="{{ route('admin.shows.edit', $show->id) }}"
                                    class="btn btn-outline text-xs">Edit</a>

                                <form action="{{ route('admin.shows.destroy', $show->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this show?');">
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

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $shows->links() }}
        </div>
    @else
        <div class="text-center text-muted-foreground mt-12">
            <p>No shows added yet.</p>
        </div>
    @endif
</x-admin-layout>
