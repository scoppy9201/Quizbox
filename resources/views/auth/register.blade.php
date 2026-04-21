<x-layout>
    <x-slot:title>
        Register - Movie Box
    </x-slot>

    <div class="max-w-md mx-auto mt-12 bg-card border border-border shadow-md rounded-2xl p-8 space-y-6">

        <h1 class="text-3xl font-bold text-center text-primary tracking-tight">
            Create Your Account
        </h1>

        @if ($errors->any())
            <div class="bg-destructive/10 border border-destructive text-destructive text-sm p-4 rounded-lg">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-muted-foreground mb-1">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition"
                    required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-muted-foreground mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition"
                    required>
            </div>

            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-muted-foreground mb-1">Date of
                    Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}"
                    class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition"
                    required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-muted-foreground mb-1">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition"
                    required>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-muted-foreground mb-1">Confirm
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full rounded-lg border border-border bg-background text-foreground py-2 px-3 focus:ring-2 focus:ring-primary focus:border-primary transition"
                    required>
            </div>

            <button type="submit"
                class="w-full btn btn-primary py-3 text-base font-semibold rounded-lg transition-colors">
                Register
            </button>
        </form>

        <p class="text-center text-sm text-muted-foreground">
            Already have an account?
            <a href="{{ route('login') }}" class="text-primary hover:underline font-medium">Log in</a>
        </p>
    </div>
</x-layout>
