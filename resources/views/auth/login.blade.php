<x-guest-layout>
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
        </div>
    </section>
</x-guest-layout>