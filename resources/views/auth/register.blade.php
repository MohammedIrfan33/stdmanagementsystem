<x-guest-layout>
    <!-- Right Form Section -->
    <section class="flex flex-[1.1] items-center justify-center">
        <div class="w-11/12 max-w-lg px-4">

            <!-- Heading -->
            <h1 class="text-5xl font-semibold text-center text-gray-800 mb-2">Create Account</h1>
            <h2 class="text-xl font-medium text-gray-600 text-center mb-6">Register to get started</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4" enctype="multipart/form-data">
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
                        class="w-full px-4 py-4 text-base font-medium text-gray-800 border border-gray-300 rounded-xl focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200"
                    />
                    @error('name')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Institute Name (Optional) -->
                <div class="mt-4">
                    <input 
                        id="institute_name" 
                        type="text" 
                        name="institute_name" 
                        placeholder="Enter your institute name" 
                        value="{{ old('institute_name') }}"
                        class="w-full px-4 py-4 text-base font-medium text-gray-800 border border-gray-300 rounded-xl focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200"
                    />
                    @error('institute_name')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        placeholder="Enter your email" 
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-4 text-base font-medium text-gray-800 border border-gray-300 rounded-xl focus:outline-none focus:border-teal-700 focus:ring-2 focus:ring-teal-200"
                    />
                    @error('email')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
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

                <!-- Confirm Password -->
                <div class="mt-4">
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

                <!-- Logo Upload -->
                <div class="mt-4 border-2 rounded-lg p-3 hover:border-teal-500 transition duration-200 flex items-center justify-between">
                    <!-- File name display -->
                    <span id="logoFileName" class="text-gray-600 text-sm">No file chosen</span>

                    <!-- Hidden input -->
                    <input 
                        id="logo"
                        type="file"
                        name="logo"
                        accept="image/*"
                        required
                        class="hidden"
                        onchange="document.getElementById('logoFileName').textContent = this.files[0]?.name || 'No file chosen';"
                    >

                    <!-- Custom button -->
                    <label 
                        for="logo"
                        class="cursor-pointer inline-flex items-center gap-2 px-4 py-2 bg-teal-800 text-white text-sm font-medium rounded-md hover:bg-teal-700 transition"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v12m0 0l-4-4m4 4l4-4M4 20h16" />
                        </svg>
                        Upload Logo
                    </label>

                    @error('logo')
                        <p class="mt-2 text-red-600 text-sm w-full">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Register Button -->
                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="w-full bg-teal-800 hover:bg-teal-900 text-white px-6 py-3 rounded-xl text-lg transition">
                        Register
                    </button>
                </div>
            </form>

            <!-- Already have an account -->
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-teal-600 hover:underline">
                    Already have an account?
                </a>
            </div>

        </div>
    </section>
</x-guest-layout>
