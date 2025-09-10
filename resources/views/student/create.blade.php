<x-layout title="Add Student">
  <!-- Include Alpine.js from a CDN -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <div class="w-full px-4 sm:px-8 mt-10 max-w-4xl mx-auto">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-10">
      <h1 class="text-3xl font-extrabold text-gray-900 mb-2 sm:mb-0">Add New Student</h1>
      <a href="/students"
        class="inline-flex items-center text-gray-600 hover:text-gray-800 transition-colors duration-300 group -mr-2 p-2 rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:-translate-x-1 transition-transform"
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Student List
      </a>
    </div>

    <div class="bg-white p-6 sm:p-12 rounded-2xl shadow-xl border border-gray-100">
      <form action='/student' method="POST" x-data="studentForm()" x-ref="studentForm">
        @csrf

        <!-- Personal Information Section -->
        <section class="border-b border-gray-200 pb-10 mb-10">
          <h2 class="text-2xl font-semibold leading-7 text-gray-900">Personal Information</h2>
          <p class="mt-2 text-base leading-6 text-gray-600">Provide the student's essential personal details.</p>

          <div class="mt-8 grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full Name</label>
              <div class="mt-2">
                <input type="text" name="name" id="name" autocomplete="name" placeholder="E.g., John Doe" class="block w-full rounded-md border-gray-300 py-2.5 text-gray-900 shadow-sm 
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm">
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" placeholder="E.g., john.doe@example.com" class="block w-full rounded-md border-gray-300 py-2.5 text-gray-900 shadow-sm 
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm">
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
              <div class="mt-2">
                <input type="tel" name="phone" id="phone" autocomplete="tel" placeholder="E.g., +1 (555) 123-4567" class="block w-full rounded-md border-gray-300 py-2.5 text-gray-900 shadow-sm 
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm">
              </div>
            </div>
          </div>
        </section>

        <!-- Course Information Section -->
        <section class="border-b border-gray-200 pb-10 mb-10">
          <h2 class="text-2xl font-semibold leading-7 text-gray-900">Course Enrollment</h2>
          <p class="mt-2 text-base leading-6 text-gray-600">
            Select the desired course and specify the enrollment date.
          </p>

          <div class="mt-8 grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-6">
            <!-- Course Selection -->
            <div class="sm:col-span-3">
              <label for="course" class="block text-sm font-medium leading-6 text-gray-900">
                Select Course
              </label>
              <div class="mt-2 relative">
                <select id="course" name="course" x-model="selectedCourseId" class="block w-full rounded-md border-gray-300 py-2.5 text-gray-900 shadow-sm
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm">
                  <option value="">-- Pick a Course --</option>
                  @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                  @endforeach
                </select>
              </div>
              <p class="mt-2 text-xs text-gray-500">Choose the training program for the student.</p>
            </div>

            <!-- Joining Date -->
            <div class="sm:col-span-3">
              <label for="joining_date" class="block text-sm font-medium leading-6 text-gray-900">
                Joining Date
              </label>
              <div class="mt-2">
                <input type="date" name="joining_date" id="joining_date" x-model="joiningDate" class="block w-full rounded-md border-gray-300 py-2.5 text-gray-900 shadow-sm
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm">
              </div>
              <p class="mt-2 text-xs text-gray-500">The official start date for the student's enrollment.</p>
            </div>
          </div>

          <!-- Course Summary Card -->
          <div x-show="selectedCourse" x-transition class="mt-12 sm:col-span-6">
            <div class="bg-gray-50 rounded-lg shadow-inner p-8 border border-gray-200">
              <h3 class="text-xl font-semibold text-gray-800 mb-6" x-text="selectedCourse.name"></h3>
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">

                <!-- Fee -->
                <div class="flex flex-col items-center justify-center p-5 bg-white rounded-lg shadow-sm border border-gray-100">
                  <span class="text-sm text-gray-500 mb-2">Course Fee</span>
                  <span class="text-2xl font-bold text-gray-800">₹<span x-text="selectedCourse.fees"></span></span>
                </div>

                <!-- Duration -->
                <div class="flex flex-col items-center justify-center p-5 bg-white rounded-lg shadow-sm border border-gray-100">
                  <span class="text-sm text-gray-500 mb-2">Duration</span>
                  <span class="text-2xl font-bold text-gray-800"><span x-text="selectedCourse.duration"></span>
                    Months</span>
                </div>

                <!-- End Date -->
                <div x-show="endDate" x-transition class="flex flex-col items-center justify-center p-5 bg-white rounded-lg shadow-sm border border-gray-100">
                  <span class="text-sm text-gray-500 mb-2">Estimated End Date</span>
                  <span class="text-2xl font-bold text-gray-800" x-text="endDate"></span>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Action Buttons -->
        <div class="mt-10 flex items-center justify-end gap-x-4">
          <button type="button" class="px-6 py-2.5 text-base font-medium leading-6 text-gray-700 rounded-md 
            hover:bg-gray-100 transition-colors duration-200">
            Cancel
          </button>
          <button @click.prevent="showConfirmationModal = true" type="button" class="rounded-md bg-gray-800 px-6 py-2.5 text-base font-semibold text-white shadow-sm 
            hover:bg-gray-900 focus-visible:outline focus-visible:outline-2 
            focus-visible:outline-offset-2 focus-visible:outline-gray-900 transition-colors duration-200">
            Save Student
          </button>
        </div>

        <!-- Confirmation Modal -->
        <div x-show="showConfirmationModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
          <div class="flex items-center justify-center min-h-screen px-4 py-8 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div x-show="showConfirmationModal" @click="showConfirmationModal = false"
              x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
              x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
              class="fixed inset-0 bg-gray-900 bg-opacity-70 transition-opacity"></div>

            <!-- Modal panel -->
            <div x-show="showConfirmationModal" x-transition:enter="ease-out duration-300"
              x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
              x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
              x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-middle bg-white rounded-xl text-left 
                  overflow-hidden shadow-2xl transform transition-all sm:max-w-lg sm:w-full">
              <div class="bg-white px-6 pt-7 pb-6 sm:p-8 sm:pb-6">
                <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex-shrink-0 flex items-center justify-center 
                              h-12 w-12 rounded-full bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 
                                    2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 
                                    0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                  </div>
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-xl leading-6 font-semibold text-gray-900">
                      Confirm Student Details
                    </h3>
                    <div class="mt-3">
                      <p class="text-base text-gray-600">
                        Please review all the entered information carefully before adding the new student.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 px-6 py-4 sm:flex sm:flex-row-reverse">
                <button value="submit" @click="$refs.studentForm.submit()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent 
                          shadow-sm px-6 py-2.5 bg-gray-800 text-base font-medium text-white 
                          hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 sm:ml-3 sm:w-auto sm:text-base">
                  Confirm and Save
                </button>
                <button  value="submit" @click="showConfirmationModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 
                          shadow-sm px-6 py-2.5 bg-white text-base font-medium text-gray-700 
                          hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:w-auto sm:text-base">
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>

  <!-- Alpine Component -->
  <script>
    function studentForm() {
      return {
        selectedCourseId: "",
        joiningDate: "",
        courses: @json($courses), // Laravel injects courses here
        showConfirmationModal: false,

        get selectedCourse() {
          return this.courses.find(c => c.id == this.selectedCourseId) || null;
        },

        get endDate() {
          if (!this.selectedCourse || !this.joiningDate) return null;
          let start = new Date(this.joiningDate);

          // Assume duration stored in months
          let durationMonths = parseInt(this.selectedCourse.duration) || 0;
          
          // Use UTC to avoid timezone issues when calculating month
          let end = new Date(Date.UTC(start.getFullYear(), start.getMonth() + durationMonths, start.getDate()));

          // Format to YYYY-MM-DD
          return end.toISOString().split("T")[0];
        }
      }
    }
  </script>
</x-layout>