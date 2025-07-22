<x-layout title="Edit Student">
  <!-- Include Alpine.js from a CDN -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <div class="w-full px-4 sm:px-8 mt-10">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-2 sm:mb-0">Edit Student</h1>
      <a href="/students" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Student List
      </a>
    </div>

    <div class="bg-white p-6 sm:p-8 rounded-xl shadow-lg">
      <!-- In a real app, the action would be something like `/students/1` and the method would be `POST` with a hidden `_method` field for `PUT` or `PATCH`. -->
      <form action="/students/1" method="POST" x-data="studentForm()" x-ref="studentForm">
        <!-- Personal Information Section -->
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-xl font-semibold leading-7 text-gray-900">Personal Information</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Update the student's personal details.</p>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full Name</label>
              <div class="mt-2">
                <input type="text" name="name" id="name" autocomplete="name" x-model="studentData.name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" x-model="studentData.email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
              <div class="mt-2">
                <input type="tel" name="phone" id="phone" autocomplete="tel" x-model="studentData.phone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
              </div>
            </div>
          </div>
        </div>

        <!-- Course Information Section -->
        <div class="border-b border-gray-900/10 pb-12 mt-10">
          <h2 class="text-xl font-semibold leading-7 text-gray-900">Course Information</h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">Update the course and enrollment details.</p>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="course" class="block text-sm font-medium leading-6 text-gray-900">Course</label>
              <div class="mt-2">
                <select id="course" name="course" x-model="selectedCourseId" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                  <option value="">Select a Course</option>
                  <template x-for="course in courses" :key="course.id">
                    <option :value="course.id" x-text="course.name"></option>
                  </template>
                </select>
              </div>
            </div>
            
            <div class="sm:col-span-3">
              <label for="joining_date" class="block text-sm font-medium leading-6 text-gray-900">Joining Date</label>
              <div class="mt-2">
                <input type="date" name="joining_date" id="joining_date" x-model="joiningDate" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <!-- Dynamic Course Details -->
            <div x-show="selectedCourse" class="sm:col-span-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-2">
                <label class="block text-sm font-medium leading-6 text-gray-900">Course Fee</label>
                <div class="mt-2">
                  <p class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 bg-gray-50 sm:text-sm sm:leading-6 px-3" x-text="selectedCourse.fee"></p>
                </div>
              </div>
              <div class="sm:col-span-2">
                <label class="block text-sm font-medium leading-6 text-gray-900">Duration</label>
                <div class="mt-2">
                  <p class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 bg-gray-50 sm:text-sm sm:leading-6 px-3" x-text="selectedCourse.duration"></p>
                </div>
              </div>
              <div class="sm:col-span-2" x-show="endDate">
                <label class="block text-sm font-medium leading-6 text-gray-900">End Date</label>
                <div class="mt-2">
                  <p class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 bg-gray-50 sm:text-sm sm:leading-6 px-3" x-text="endDate"></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button @click.prevent="showConfirmationModal = true" type="button" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Update Student</button>
        </div>

        <!-- Confirmation Modal -->
        <div x-show="showConfirmationModal" class="fixed inset-0 z-10 overflow-y-auto" style="display: none;">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showConfirmationModal" @click="showConfirmationModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        
                <div x-show="showConfirmationModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Update Student
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Are you sure you want to save the changes? This action cannot be undone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="$refs.studentForm.submit()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            Confirm and Update
                        </button>
                        <button @click="showConfirmationModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

      </form>
    </div>
  </div>

  <script>
    function studentForm() {
      // In a real application, this data would be fetched from your database for the specific student.
      const existingStudentData = {
          name: 'Irfan A P',
          email: 'irfan@example.com',
          phone: '+91 9876543210',
          courseId: 1, // Pre-selects 'Flutter Development'
          joiningDate: '2024-06-01'
      };

      return {
        studentData: existingStudentData,
        courses: [
          { id: 1, name: 'Flutter Development', fee: '₹15,000', duration: '3 Months' },
          { id: 2, name: 'React Development', fee: '₹20,000', duration: '4 Months' },
          { id: 3, name: 'Full Stack Development', fee: '₹35,000', duration: '6 Months' },
          { id: 4, name: 'Data Science', fee: '₹40,000', duration: '6 Months' },
          { id: 5, name: 'UI/UX Design', fee: '₹12,000', duration: '2 Months' }
        ],
        selectedCourseId: existingStudentData.courseId,
        joiningDate: existingStudentData.joiningDate,
        showConfirmationModal: false,
        get selectedCourse() {
          if (!this.selectedCourseId) return null;
          return this.courses.find(course => course.id == this.selectedCourseId);
        },
        get endDate() {
          if (!this.selectedCourse || !this.joiningDate) {
            return '';
          }
          
          const startDate = new Date(this.joiningDate);
          const [value, unit] = this.selectedCourse.duration.split(' ');
          const durationValue = parseInt(value, 10);
          
          if (unit.toLowerCase().startsWith('month')) {
            startDate.setMonth(startDate.getMonth() + durationValue);
          } else if (unit.toLowerCase().startsWith('day')) {
            startDate.setDate(startDate.getDate() + durationValue);
          }

          const joiningDay = new Date(this.joiningDate).getDate();
          if (startDate.getDate() != joiningDay) {
            startDate.setDate(0);
          }
          
          return startDate.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
        }
      }
    }
  </script>
</x-layout>