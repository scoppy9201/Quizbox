<x-layout>
    <x-slot:title>Đăng ký - {{ config('app.name') }}</x-slot>

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

            <h1 class="qb-auth__title">Tạo tài khoản mới</h1>
            <p class="qb-auth__desc">Đăng ký để bắt đầu ôn thi cùng {{ config('app.name') }}</p>

            @if ($errors->any())
                <div class="qb-auth__error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="qb-auth__form">
                @csrf

                <div class="qb-auth__field">
                    <label for="name">Họ và tên</label>
                    <input type="text" name="name" id="name"
                           value="{{ old('name') }}" required
                           placeholder="Nguyễn Văn A" />
                </div>

                <div class="qb-auth__field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                           value="{{ old('email') }}" required
                           placeholder="you@example.com" />
                </div>

                <div class="qb-auth__field">
                    <label for="date_of_birth">Ngày sinh</label>
                    <input type="date" name="date_of_birth" id="date_of_birth"
                           value="{{ old('date_of_birth') }}" required />
                </div>

                <div class="qb-auth__field">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password"
                           required placeholder="••••••••" />
                </div>

                <div class="qb-auth__field">
                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           required placeholder="••••••••" />
                </div>

                <button type="submit" class="qb-btn qb-btn--primary w-full justify-center mt-2">
                    Đăng ký
                </button>

                <p class="qb-auth__footer">
                    Đã có tài khoản?
                    <a href="{{ route('login') }}">Đăng nhập</a>
                </p>

            </form>
        </div>
    </div>
</x-layout>
