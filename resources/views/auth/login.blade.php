<x-guest-layout>
    <div class="min-h-screen bg-cover bg-center relative"
        style="background-image: url('{{ asset('assets/images/wall2.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-slate-700 opacity-75"></div>

        <div class="relative flex items-center justify-center text-gray-50">
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <x-validation-errors class="mb-4" />

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <x-label for="email" value="{{ __('الايميل') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('كلمة المرور') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('نسيت كلمة المرور؟') }}
                            </a>
                        @endif

                        <x-button class="ms-4">
                            {{ __('تسجيل الدخول') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>
    </div>
</x-guest-layout>
