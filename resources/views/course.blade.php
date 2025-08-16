<x-layout title="Course Listing">
  <div class="w-full px-4 sm:px-8 mt-10">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-2 sm:mb-0">Course Listing</h1>
      <a href="{{route('add-course') }}"
        class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd"
            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
            clip-rule="evenodd" />
        </svg>
        Add Course
      </a>
    </div>



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Course Card 1: Flutter Development -->
      @foreach ($courses as $course)

      <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform transform hover:-translate-y-1">
      <div class="p-6">
        <div class="flex justify-between items-start">
        <h3 class="text-xl font-bold text-gray-800 pr-4">{{ $course['name'] }}</h3>
        <span
          class="{{ $course['status']== 1 ? "bg-green-100 text-green-800" : "bg-gray-300 text-black-800" }} flex-shrink-0 inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold ">
          {{ucfirst($course['status']==1 ? 'active' : 'inactive' )  }}
        </span>
        </div>

        <div class="mt-4 border-t border-gray-200 pt-4">
        <div class="grid grid-cols-2 gap-4 text-sm">
          <div>
          <p class="text-gray-500 font-medium">Duration</p>
          <p class="text-gray-900 font-semibold">{{ $course['duration'] }}</p>
          </div>
          <div>
          <p class="text-gray-500 font-medium">Fee</p>
          <p class="text-gray-900 font-semibold">{{ $course['fees'] }}</p>
          </div>
        </div>
        </div>
      </div>
      <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3">
        <a   href="{{ route('edit-course',['id'=>$course['id']]) }}"
        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
        Edit
</a>
        <button
        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">
        Delete
        </button>
      </div>
      </div>


    @endforeach






    </div>
  </div>
</x-layout>