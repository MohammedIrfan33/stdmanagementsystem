<!-- Navbar -->
<nav class="bg-blue-700 text-white p-4">
    <ul class="flex gap-6">
      
      <x-navlink href="{{ route('home') }} " :linkapage='request()->is("/")' >Home</x-navlink>
      
      <x-navlink href="{{ route('course') }} " :linkapage='request()->is("course")' >Course</x-navlink>
      <x-navlink href="{{ route('aboutus') }} " :linkapage='request()->is("about")' >About</x-navlink>


    
    </ul>
  </nav>
