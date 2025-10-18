{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

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

</body>
</html>
