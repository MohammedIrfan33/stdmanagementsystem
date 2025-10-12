{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

<<<<<<< HEAD
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
=======
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-poppins bg-[#F6F7F9]">

<main class="flex flex-col md:flex-row h-screen w-full overflow-hidden">

    <!-- Left Image Section -->
    <section class="md:flex flex-1 items-center justify-center bg-[#f5f5f5] border-r border-gray-300 h-screen">
        <img 
            src="{{ asset('images/login_image.png') }}" 
            alt="Login illustration" 
            class="w-full h-full object-cover"
        />
    </section>

    <!-- Right Login Form Section -->
    <section class="flex flex-[1.1] items-center justify-center">
        <div class="w-11/12 max-w-lg px-4">

            <!-- Page heading -->
            <h1 class="text-5xl font-semibold text-center text-gray-800 mb-2">Welcome</h1>
            <h2 class="text-xl font-medium text-gray-600 text-center mb-6">Login to access your dashboard</h2>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        placeholder="Enter your email"
                        value="{{ old('email') }}"
                        required autofocus
                        class="w-full px-4 py-4 text-base  font-medium text-gray-800 border border-gray-300 rounded-xl focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200"
                    />
                    @error('email')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        placeholder="Enter your password"
                        required
                        class="w-full px-4 py-4 text-base font-medium text-gray-800 border border-gray-300 rounded-xl focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200"
                    />
                    @error('password')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot -->
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" id="remember_me" class="rounded border-gray-300 text-teal-600 shadow-sm focus:ring-teal-500">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-teal-600 hover:underline" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full py-4 bg-teal-800 text-white text-xl rounded-xl hover:bg-teal-900 transition">
                    Log in
                </button>

                <!-- Register Link -->
                @if (Route::has('register'))
                    <p class="text-center text-gray-600 text-sm mt-4">
                        Don’t have an account? 
                        <a href="{{ route('register') }}" class="text-teal-700 font-semibold hover:underline">
                            Create one
                        </a>
                    </p>
                @endif

            </form>
>>>>>>> refs/remotes/origin/main
        </div>
    </section>
</main>

<<<<<<< HEAD
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm
                    focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- 🔗 Add Sign Up link -->
    <div class="mt-4 text-center">
        <span class="text-sm text-gray-600 dark:text-gray-400">
            {{ __("Don't have an account?") }}
        </span>
        <a href="{{ route('register') }}"
           class="text-indigo-600 dark:text-indigo-400 hover:underline">
            {{ __('Sign up') }}
        </a>
    </div>
</x-guest-layout>
=======
</body>
</html>
>>>>>>> refs/remotes/origin/main
