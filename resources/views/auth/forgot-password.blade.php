<x-guest-layout>
    {{-- SEO Meta --}}
    @section('title', 'Forgot Password | YourAppName')
    @section('meta_description', 'Forgot your password? Enter your email to receive a secure password reset link and regain access to your account.')

    <main class="flex h-screen w-1/2 justify-center items-center bg-white px-8 py-10">
        <div class="w-full max-w-md">
            <header class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-gray-800">
                    {{ __('Forgot Your Password?') }}
                </h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Enter your email address and we will send you a password reset link.') }}
                </p>
            </header>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4" aria-label="Password Reset Form">
                @csrf

               <!-- Email Address -->
<div class="mb-4">
  
    <div class="mt-1 relative rounded-md shadow-sm">
        <input 
            id="email" 
            name="email" 
            type="email" 
            value="{{ old('email') }}" 
            required 
            autofocus
            aria-required="true"
            placeholder="Enter your email"
            class="block w-full px-4 py-3 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
        />
    </div>
    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
</div>


                <div class="flex items-center justify-end">
                <div class="mt-4 w-full" >
    <button type="submit" 
        class="w-full py-4 bg-teal-800 text-white text-xl font-medium rounded-xl hover:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 transition duration-200">
        {{ __('Send Password Reset Link') }}
    </button>
</div>

                </div>
            </form>
        </div>
    </main>
</x-guest-layout>
