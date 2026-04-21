<x-layout>
    <x-slot:title>
        Log In - Movie Box
    </x-slot>

    <div class="max-w-md mx-auto mt-14 bg-card border border-border shadow-md rounded-2xl p-8 space-y-6">

        <h1 class="text-3xl font-bold text-center text-primary tracking-tight">Welcome Back</h1>
        <p class="text-center text-muted-foreground text-sm">Log in to your Movie Box account</p>

        @if ($errors->any())
            <div class="bg-destructive/10 border border-destructive text-destructive text-sm p-4 rounded-lg">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-muted-foreground mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-muted-foreground mb-1">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition">
            </div>

            <button type="submit"
                class="w-full btn btn-primary py-3 text-base font-semibold rounded-lg transition-colors">
                Log In
            </button>

            <p class="text-center text-sm text-muted-foreground mt-4">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-primary hover:underline font-medium">Register</a>
            </p>
        </form>
    </div>
</x-layout>
