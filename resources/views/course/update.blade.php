<x-layout title="Edit Course">
  <div class="bg-gray-50 min-h-screen">
    <div class="w-full px-4 sm:px-8 py-10">

      <!-- Header -->
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2 sm:mb-0">Edit Course</h1>
        <a href="/courses"
          class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          Back to Course List
        </a>
      </div>

      <!-- Success message -->
      @if(session('success'))
        <div class="mb-4 rounded-md bg-green-50 p-4 text-green-700">
          {{ session('success') }}
        </div>
      @endif

      <!-- Form Card -->
      <div class="bg-white p-6 sm:p-8 rounded-xl shadow-lg max-w-2xl mx-auto">
        <form action="{{route('update-course', ['id' => $course['id'])}}" method="POST">
          @csrf
          @method('PATCH')

          <div class="space-y-6">

            <!-- Course Name -->
            <div>
              <label for="course_name" class="block text-sm font-medium leading-6 text-gray-900">Course Name</label>
              <div class="mt-2 relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd"
                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
                <input type="text" name="course_name" id="course_name" value="{{ old('course_name', $course['name']) }}"
                  class="block w-full rounded-md border-0 py-2 pl-10 text-gray-900 shadow-sm ring-1 ring-inset 
                    {{ $errors->has('course_name') ? 'ring-red-500' : 'ring-gray-300' }} 
                    placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                  aria-invalid="{{ $errors->has('course_name') ? 'true' : 'false' }}">
              </div>
              @error('course_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <!-- Duration -->
            <div>
              <label for="duration" class="block text-sm font-medium leading-6 text-gray-900">Duration</label>
              <input type="text" name="duration" id="duration" value="{{ old('duration', $course['duration']) }}"
                placeholder="e.g., 6 Months"
                class="mt-2 block w-full rounded-md border-0 py-2 pl-4 shadow-sm ring-1 ring-inset 
                  {{ $errors->has('duration') ? 'ring-red-500' : 'ring-gray-300' }} 
                  placeholder:text-gray-400 text-gray-900 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                aria-invalid="{{ $errors->has('duration') ? 'true' : 'false' }}">
              @error('duration')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
              <p class="mt-2 text-xs text-gray-500">e.g., "6 Months", "40 Hours"</p>
            </div>

            <!-- Fee -->
            <div>
              <label for="fee" class="block text-sm font-medium leading-6 text-gray-900">Fee</label>
              <div class="mt-2 relative rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <span class="text-gray-500 sm:text-sm">₹</span>
                </div>
                <input type="text" name="fee" id="fee" value="{{ old('fee', $course['fees']) }}" placeholder="15000"
                  class="block w-full rounded-md border-0 py-2 pl-7 pr-12 text-gray-900 ring-1 ring-inset 
                    {{ $errors->has('fee') ? 'ring-red-500' : 'ring-gray-300' }} 
                    placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
                  aria-invalid="{{ $errors->has('fee') ? 'true' : 'false' }}">
              </div>
              @error('fee')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
              <p class="mt-2 text-xs text-gray-500">Enter the total course fee.</p>
            </div>

            <!-- Status -->
            <div>
              <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
              <select id="status" name="status" class="mt-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset 
        {{ $errors->has('status') ? 'ring-red-500' : 'ring-gray-300' }} 
        focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6"
                aria-invalid="{{ $errors->has('status') ? 'true' : 'false' }}">
                <option value="1" {{ old('status', $course['status']) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $course['status']) == 0 ? 'selected' : '' }}>Inactive</option>
              </select>
              @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

          </div>

          <!-- Action Buttons -->
          <div class="mt-10 pt-6 border-t border-gray-200 flex items-center justify-end gap-x-6">
            <button type="button" onclick="window.location='/courses'"
              class="text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100 px-4 py-2 rounded-md transition-colors">
              Cancel
            </button>
            <button type="submit"
              class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors">
              Update Course
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>