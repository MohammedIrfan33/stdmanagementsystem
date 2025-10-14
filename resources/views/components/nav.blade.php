<nav style="background-color: #015C61;" class="text-white  sticky top-0 z-50 h-screen w-[15vw]">

<div class="flex flex-col items-center mt-12 mb-10">
  <div class="w-28 h-28 rounded-full border-2 border-white flex items-center justify-center">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 rounded-full object-cover">
  </div>
</div>



<ul class="flex flex-col gap-4 w-full mt-10">
    <x-navlink href="{{ route('dashboard') }}" :linkapage="request()->routeIs('dashboard')" icon="fa-solid fa-house">Home</x-navlink>
    <x-navlink href="{{ route('course') }}" :linkapage="request()->routeIs('course')" icon="fa-solid fa-book-open">Course</x-navlink>
    <x-navlink href="{{ route('payments') }}" :linkapage="request()->routeIs('payments')" icon="fa-solid fa-credit-card">Payments</x-navlink>
    <x-navlink href="{{ route('aboutus') }}" :linkapage="request()->routeIs('aboutus')" icon="fa-solid fa-circle-info">About</x-navlink>

</ul>



</nav>
