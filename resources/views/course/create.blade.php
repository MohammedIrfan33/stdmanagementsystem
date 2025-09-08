<x-layout title="Add Course">
  <div class="w-full px-4 sm:px-8 mt-10">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-24">
  <h1 class="text-3xl font-bold text-gray-800 mb-2 sm:mb-0">Add New Course</h1>
  <a href="/courses"
     class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300">
     <!-- SVG icon -->
     Back to Course List
  </a>
</div>



    <!-- Form Card -->
    <div class="bg-white p-6 sm:p-8 rounded-xl shadow-lg max-w-2xl mx-auto">
      <form action="/courses" method="POST">
        @csrf
        <div class="space-y-6">

          <!-- Course Name -->
          <div>
            <label for="course_name" class="block text-sm font-medium leading-6 text-gray-900">Course Name</label>
            <input value="{{ old('course_name') }}" type="text" name="course_name" id="course_name"
              placeholder="e.g., Flutter Development"
              class="mt-2 block w-full rounded-md border-0 py-2 pl-4 shadow-sm ring-1 ring-inset 
                {{ $errors->has('course_name') ? 'ring-red-500' : 'ring-gray-300' }} 
                placeholder:text-gray-400 text-gray-900 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
              aria-invalid="{{ $errors->has('course_name') ? 'true' : 'false' }}">
            @error('course_name')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Duration -->
          <div>
            <label for="duration" class="block text-sm font-medium leading-6 text-gray-900">Duration</label>
            <input value="{{ old('duration') }}" type="text" name="duration" id="duration" placeholder="e.g., 3 Months"
              class="mt-2 block w-full rounded-md border-0 py-2 pl-4 shadow-sm ring-1 ring-inset 
                {{ $errors->has('duration') ? 'ring-red-500' : 'ring-gray-300' }} 
                placeholder:text-gray-400 text-gray-900 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
              aria-invalid="{{ $errors->has('duration') ? 'true' : 'false' }}">
            @error('duration')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Fee -->
          <div>
            <label for="fee" class="block text-sm font-medium leading-6 text-gray-900">Fee</label>
            <p class="text-xs text-gray-500 mb-1">Enter the course fee in INR</p>
            <div class="mt-2 relative rounded-md shadow-sm">
              <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-500 sm:text-sm">₹</span>
              </div>
              <input type="text" name="fee" id="fee" placeholder="15000" value="{{ old('fee') }}" class="block w-full rounded-md border-0 py-2 pl-7 pr-12 text-gray-900 ring-1 ring-inset 
                  {{ $errors->has('fee') ? 'ring-red-500' : 'ring-gray-300' }} 
                  placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                aria-invalid="{{ $errors->has('fee') ? 'true' : 'false' }}">
            </div>
            @error('fee')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Status -->
          <div>
            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
            <select id="status" name="status" class="mt-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset
        {{ $errors->has('status') ? 'ring-red-500' : 'ring-gray-300' }}
        focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6"
              aria-invalid="{{ $errors->has('status') ? 'true' : 'false' }}">
              <option value="1" {{ old('status', $course['status'] ?? 1) == 1 ? 'selected' : '' }}>Active</option>
              <option value="0" {{ old('status', $course['status'] ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>


        </div>

        <!-- Action Buttons -->
        <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-end gap-x-6">
          <button type="button" onclick="window.location='/courses'"
            class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700">Cancel</button>
          <button type="submit"
            class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
            Save Course
          </button>
        </div>
      </form>
    </div>
  </div>
</x-layout>