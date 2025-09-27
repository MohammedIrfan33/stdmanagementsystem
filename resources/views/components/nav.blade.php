<nav class="bg-blue-700 text-white p-4 sticky top-0 z-50">
  <ul class="flex gap-6">
    <x-navlink href="{{ route('home') }}" :linkapage="request()->routeIs('home')">Home</x-navlink>
    <x-navlink href="{{ route('course') }}" :linkapage="request()->routeIs('course')">Course</x-navlink>
    <x-navlink href="{{ route('payments') }}" :linkapage="request()->routeIs('payments')">Payments</x-navlink>
    <x-navlink href="{{ route('aboutus') }}" :linkapage="request()->routeIs('aboutus')">About</x-navlink>
  </ul>
</nav>
