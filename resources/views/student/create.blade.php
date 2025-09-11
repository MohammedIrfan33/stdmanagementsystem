<x-layout title="Add Student">
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
      <form action="{{ route('store') }}" method="POST" x-data="studentForm()" x-ref="studentForm">
        @csrf

        <!-- Personal Information Section -->
        <section class="border-b border-gray-200 pb-10 mb-10">
          <h2 class="text-2xl font-semibold text-gray-900">Personal Information</h2>
          <p class="mt-2 text-base text-gray-600">Provide the student's essential personal details.</p>

          <div class="mt-8 grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-6">

            <!-- Name -->
            <div class="sm:col-span-3">
              <label for="name" class="block text-sm font-medium text-gray-900">Full Name</label>
              <div class="mt-2">
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="E.g., John Doe"
                  class="block w-full rounded-md border border-gray-300 py-2.5 text-gray-900 shadow-sm
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('name') border-red-500 @enderror">
              </div>
              @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Email -->
            <div class="sm:col-span-3">
              <label for="email" class="block text-sm font-medium text-gray-900">Email Address</label>
              <div class="mt-2">
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="E.g., john@example.com"
                  class="block w-full rounded-md border border-gray-300 py-2.5 text-gray-900 shadow-sm
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('email') border-red-500 @enderror">
              </div>
              @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Phone -->
            <div class="sm:col-span-3">
              <label for="phone" class="block text-sm font-medium text-gray-900">Phone Number</label>
              <div class="mt-2">
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" placeholder="E.g., +1 555-123-4567"
                  class="block w-full rounded-md border border-gray-300 py-2.5 text-gray-900 shadow-sm
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('phone') border-red-500 @enderror">
              </div>
              @error('phone')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

          </div>
        </section>

        <!-- Course Information Section -->
        <section class="border-b border-gray-200 pb-10 mb-10">
          <h2 class="text-2xl font-semibold text-gray-900">Course Enrollment</h2>
          <p class="mt-2 text-base text-gray-600">Select the desired course and specify the enrollment date.</p>

          <div class="mt-8 grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-6">

            <!-- Course -->
            <div class="sm:col-span-3">
              <label for="course" class="block text-sm font-medium text-gray-900">Select Course</label>
              <div class="mt-2">
                <select id="course" name="course" x-model="selectedCourseId"
                  class="block w-full rounded-md border border-gray-300 py-2.5 text-gray-900 shadow-sm
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('course') border-red-500 @enderror">
                  <option value="">-- Pick a Course --</option>
                  @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course') == $course->id ? 'selected' : '' }}>
                      {{ $course->name }}
                    </option>
                  @endforeach
                </select>
              </div>
              @error('course')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Joining Date -->
            <div class="sm:col-span-3">
              <label for="joining_date" class="block text-sm font-medium text-gray-900">Joining Date</label>
              <div class="mt-2">
                <input type="date" name="joining_date" id="joining_date" x-model="joiningDate" value="{{ old('joining_date') }}"
                  class="block w-full rounded-md border border-gray-300 py-2.5 text-gray-900 shadow-sm
                  focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('joining_date') border-red-500 @enderror">
              </div>
              @error('joining_date')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
              @enderror
            </div>

          </div>

          <!-- Course Summary -->
          <div x-show="selectedCourse" x-transition class="mt-12 sm:col-span-6">
            <div class="bg-gray-50 rounded-lg shadow-inner p-8 border border-gray-200">
              <h3 class="text-xl font-semibold text-gray-800 mb-6" x-text="selectedCourse.name"></h3>
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                <div class="flex flex-col items-center justify-center p-5 bg-white rounded-lg shadow-sm border">
                  <span class="text-sm text-gray-500 mb-2">Course Fee</span>
                  <span class="text-2xl font-bold text-gray-800">₹<span x-text="selectedCourse.fees"></span></span>
                </div>
                <div class="flex flex-col items-center justify-center p-5 bg-white rounded-lg shadow-sm border">
                  <span class="text-sm text-gray-500 mb-2">Duration</span>
                  <span class="text-2xl font-bold text-gray-800"><span x-text="selectedCourse.duration"></span> Months</span>
                </div>
                <div x-show="endDate" class="flex flex-col items-center justify-center p-5 bg-white rounded-lg shadow-sm border">
                  <span class="text-sm text-gray-500 mb-2">Estimated End Date</span>
                  <span class="text-2xl font-bold text-gray-800" x-text="endDate"></span>
                </div>
              </div>
            </div>
          </div>

        </section>

        <!-- Action Buttons -->
        <div class="mt-10 flex items-center justify-end gap-x-4">
          <a href="/students" class="px-6 py-2.5 text-base font-medium text-gray-700 rounded-md hover:bg-gray-100 transition">Cancel</a>
          <button type="submit"
            class="rounded-md bg-gray-800 px-6 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-gray-900 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-gray-900">
            Save Student
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Alpine Component -->
  <script>
    function studentForm() {
      return {
        selectedCourseId: "{{ old('course') }}",
        joiningDate: "{{ old('joining_date') }}",
        courses: @json($courses),
        get selectedCourse() {
          return this.courses.find(c => c.id == this.selectedCourseId) || null;
        },
        get endDate() {
          if (!this.selectedCourse || !this.joiningDate) return null;
          let start = new Date(this.joiningDate);
          let durationMonths = parseInt(this.selectedCourse.duration) || 0;
          let end = new Date(Date.UTC(start.getFullYear(), start.getMonth() + durationMonths, start.getDate()));
          return end.toISOString().split("T")[0];
        }
      }
    }
  </script>
</x-layout>
