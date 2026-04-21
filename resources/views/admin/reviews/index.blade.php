<x-admin-layout title="Reviews List - MovieBox">

    <nav class="text-sm text-muted-foreground mb-6" aria-label="breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary transition-colors">Dashboard</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-foreground" aria-current="page">Reviews</span>
            </li>
        </ol>
    </nav>

    <h1 class="text-3xl font-bold text-primary tracking-tight mb-6">
        Movie Reviews
    </h1>

    @if ($reviews->count())
        <div class="overflow-x-auto bg-card border border-border rounded-xl shadow-sm">
            <table class="w-full min-w-[800px] table-auto text-sm text-left">
                <thead class="bg-muted text-muted-foreground">
                    <tr>
                        <th class="px-4 py-3 whitespace-nowrap">User</th>
                        <th class="px-4 py-3 whitespace-nowrap">Movie</th>
                        <th class="px-4 py-3 whitespace-nowrap">Rating</th>
                        <th class="px-4 py-3 whitespace-nowrap">Comment</th>
                        <th class="px-4 py-3 whitespace-nowrap">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr class="border-t border-border hover:bg-muted/40 transition-colors">
                            <td class="px-4 py-3 font-medium text-foreground">
                                {{ $review->user->name }}
                            </td>
                            <td class="px-4 py-3"><a href="{{ route('movies.detail', $review->movie->slug) }}"
                                    class='btn p-0! m-0! btn-link'>{{ $review->movie->title }}</a>
                            </td>
                            <td class="px-4 py-3">⭐ {{ $review->rating }}/10</td>
                            <td class="px-4 py-3 text-muted-foreground max-w-[300px] truncate">
                                {{ $review->comment }}
                            </td>
                            <td class="px-4 py-3">{{ $review->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    @else
        <div class="text-center text-muted-foreground mt-12">
            <p>No reviews posted yet.</p>
        </div>
    @endif

</x-admin-layout>
