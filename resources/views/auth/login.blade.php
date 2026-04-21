<x-layout>
    <x-slot:title>Đăng nhập - {{ config('app.name') }}</x-slot>

    <div class="qb-auth">
        <div class="qb-auth__blob qb-auth__blob--1"></div>
        <div class="qb-auth__blob qb-auth__blob--2"></div>

        <div class="qb-auth__card">

            {{-- Logo --}}
            <div class="qb-auth__logo">
                <svg viewBox="0 0 40 40" fill="none" width="32" height="32">
                    <path d="M20 4 L26 16 L20 12 L14 16 Z" fill="white" opacity="0.9"/>
                    <path d="M20 36 L14 24 L20 28 L26 24 Z" fill="white" opacity="0.9"/>
                    <path d="M4 20 L16 14 L12 20 L16 26 Z" fill="white" opacity="0.7"/>
                    <path d="M36 20 L24 26 L28 20 L24 14 Z" fill="white" opacity="0.7"/>
                </svg>
            </div>

            <h1 class="qb-auth__title">Chào mừng trở lại</h1>
            <p class="qb-auth__desc">Đăng nhập vào tài khoản {{ config('app.name') }} của bạn</p>

            @if ($errors->any())
                <div class="qb-auth__error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="qb-auth__form">
                @csrf

                <div class="qb-auth__field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                           value="{{ old('email') }}" required
                           placeholder="you@example.com" />
                </div>

                <div class="qb-auth__field">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password"
                           required placeholder="••••••••" />
                </div>

                <button type="submit" class="qb-btn qb-btn--primary w-full justify-center mt-2">
                    Đăng nhập
                </button>

                <p class="qb-auth__footer">
                    Chưa có tài khoản?
                    <a href="{{ route('register') }}">Đăng ký ngay</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>