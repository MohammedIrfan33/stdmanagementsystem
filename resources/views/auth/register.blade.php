{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- jQuery + SweetAlert (optional for alerts) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-poppins bg-[#F6F7F9]">

<main class="flex flex-col md:flex-row h-screen w-full overflow-hidden">

    <!-- Left Image Section -->
    <section class="md:flex flex-1 items-center justify-center bg-[#f5f5f5] border-r border-gray-300 h-screen">
        <img 
            src="{{ asset('images/login_image.png') }}" 
            alt="Register illustration" 
            class="w-full h-full object-cover"
        />
    </section>

    <!-- Right Form Section -->
    <section class="flex flex-[1.1] items-center justify-center">
        <div class="w-11/12 max-w-lg px-4">

            <!-- Heading -->
            <h1 class="text-5xl font-semibold text-center text-gray-800 mb-2">Create Account</h1>
            <h2 class="text-xl font-medium text-gray-600 text-center mb-6">Register to get started</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        placeholder="Enter your name" 
                        value="{{ old('name') }}"
                        required autofocus
                        class="w-full px-4 py-4 text-base  font-medium text-gray-800 border border-gray-300 rounded-xl focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200"
                    />
                    @error('name')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        placeholder="Enter your email" 
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-4 text-base font-medium  text-gray-800 border border-gray-300 rounded-xl focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200"
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
                        class="w-full px-4 py-4 text-base font-medium  text-gray-800 border border-gray-300 rounded-xl focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200"
                    />
                    @error('password')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        placeholder="Confirm your password" 
                        required
                        class="w-full px-4 py-4 text-base font-medium text-gray-800 border border-gray-300 rounded-xl focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200"
                    />
                    @error('password_confirmation')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Register Button -->
                <div class="flex items-center justify-between mt-6">
                 

                    <button type="submit" class="w-full bg-teal-800 hover:bg-teal-900 text-white px-6 py-3 rounded-xl text-lg transition">
                        Register
                    </button>
                </div>


            </form>

            <div class="text-center mt-4">
    <a href="{{ route('login') }}" class="text-sm text-teal-600 hover:underline">
        Already have an account?
    </a>
</div>

        </div>
    </section>
</main>

</body>
</html>
