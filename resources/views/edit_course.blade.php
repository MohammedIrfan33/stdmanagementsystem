<x-layout title="Edit Course">
  <div class="w-full px-4 sm:px-8 mt-10">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-2 sm:mb-0">Edit Course</h1>
      <a href="/courses" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Course List
      </a>
    </div>

    <div class="bg-white p-6 sm:p-8 rounded-xl shadow-lg max-w-2xl mx-auto">
      <!-- In a real application, the form action would point to an update route -->
      <form action="/courses/1" method="POST">
        <!-- You would typically include a hidden input for the POST method, e.g., <input type="hidden" name="_method" value="PUT"> -->
        
        <div class="space-y-8">
          
          <!-- Course Name -->
          <div>
            <label for="course-name" class="block text-sm font-medium leading-6 text-gray-900">Course Name</label>
            <div class="mt-2">
              <input type="text" name="course-name" id="course-name" value="Flutter Development" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <!-- Duration -->
          <div>
            <label for="duration" class="block text-sm font-medium leading-6 text-gray-900">Duration</label>
            <div class="mt-2">
              <input type="text" name="duration" id="duration" value="3 Months" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <!-- Fee -->
          <div>
            <label for="fee" class="block text-sm font-medium leading-6 text-gray-900">Fee</label>
            <div class="mt-2">
              <div class="relative rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <span class="text-gray-500 sm:text-sm">₹</span>
                </div>
                <input type="text" name="fee" id="fee" value="15000" class="block w-full rounded-md border-0 py-2 pl-7 pr-12 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
              </div>
            </div>
          </div>

          <!-- Status -->
          <div>
            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
            <div class="mt-2">
              <select id="status" name="status" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                <option value="active" selected>Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
          </div>

        </div>

        <!-- Action Buttons -->
        <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Update Course</button>
        </div>
      </form>
    </div>
  </div>
</x-layout>