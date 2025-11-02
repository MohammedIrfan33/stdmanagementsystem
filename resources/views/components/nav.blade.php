<nav style="background-color: #015C61;" class="text-white sticky top-0 z-50 h-screen w-[15vw] flex flex-col">

    <div class="flex flex-col items-center mt-12 mb-10">
        <div class="w-28 h-28 rounded-full border-2 border-white flex items-center justify-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 rounded-full object-cover">
        </div>
    </div>

    <ul class="flex flex-col gap-4 w-full mt-10">
        <x-navlink href="{{ route('dashboard') }}" :linkapage="request()->routeIs('dashboard')" icon="fa-solid fa-house">Home</x-navlink>
        <x-navlink href="{{ route('course') }}" :linkapage="request()->routeIs('course')" icon="fa-solid fa-book-open">Course</x-navlink>
        <x-navlink href="{{ route('payments') }}" :linkapage="request()->routeIs('payments')" icon="fa-solid fa-credit-card">Payments</x-navlink>
        <x-navlink href="#" :linkapage="request()->routeIs('profile')" icon="fa-solid fa-user">Profile</x-navlink>
        <x-navlink href="{{ route('aboutus') }}" :linkapage="request()->routeIs('aboutus')" icon="fa-solid fa-circle-info">About</x-navlink>
    </ul>





    <form id="logoutForm" method="POST" action="{{ route('logout') }}"  class="mt-auto  w-full mb-2  font-semibold text-lg">
    @csrf


     <!-- Logout at bottom -->
     <div class="">
      <button id="logoutBtn" class="w-full text-left flex items-center gap-2 px-4 py-2 hover:bg-black/20 ">
          <i class="fa-solid fa-right-from-bracket"></i>
          Logout
      </button>

    </div>




    </form>


   

    <script>
document.getElementById('logoutBtn').addEventListener('click', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, logout!'
    }).then((result) => {
        if (result.isConfirmed) {
          
            document.getElementById('logoutForm').submit();
        }
    });
});
</script>


</nav>
