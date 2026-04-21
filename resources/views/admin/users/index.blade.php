<x-admin-layout title="Customers Information - MovieBox">

    <nav class="text-sm text-muted-foreground mb-6" aria-label="breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary transition-colors">Dashboard</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-foreground" aria-current="page">Customers</span>
            </li>
        </ol>
    </nav>

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h1 class="text-3xl font-bold text-primary tracking-tight">Customers Information</h1>
    </div>

    <div class="bg-card border border-border rounded-2xl shadow-lg overflow-x-auto">
        @if ($users->count())
            <table class="w-full min-w-[700px] table-auto text-sm text-left">
                <thead class="bg-muted text-muted-foreground uppercase tracking-wide text-xs border-b border-border">
                    <tr>
                        <th class="px-4 py-3 whitespace-nowrap">Name</th>
                        <th class="px-4 py-3 whitespace-nowrap">Email</th>
                        <th class="px-4 py-3 whitespace-nowrap">Age</th>
                        <th class="px-4 py-3 whitespace-nowrap">Birthdate</th>
                        <th class="px-4 py-3 whitespace-nowrap">Total Spend</th>
                        <th class="px-4 py-3 whitespace-nowrap">Joined On</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @foreach ($users as $user)
                        <tr class="hover:bg-muted/50 transition-colors">
                            <td class="px-4 py-3 font-medium text-foreground">
                                {{ $user->name }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($user->date_of_birth)->age }}
                            </td>
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($user->date_of_birth)->format('M d, Y') }}
                            </td>
                            <td class="px-4 py-3">
                                Rs {{ number_format($user->bookings->sum('total_price') ?? 0) }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-sm text-muted-foreground p-6">No customers found yet.</p>
        @endif
    </div>
</x-admin-layout>
