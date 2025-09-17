<x-layout title="Edit Student">
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

      

      <form action="{{ route('update', ['id' => $student->id]) }}" method="POST" x-data="studentForm()" x-ref="studentForm">
        @csrf
        @method('PATCH')
      
        <!-- Personal Information Section -->
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-xl font-semibold text-gray-900">Personal Information</h2>
          <p class="mt-1 text-sm text-gray-600">Update the student's personal details.</p>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            
            <!-- Name -->
            <div class="sm:col-span-3">
              <label for="name" class="block text-sm font-medium text-gray-900">Full Name</label>
              <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}"
                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset 
                {{ $errors->has('name') ? 'ring-red-500' : 'ring-gray-300' }} 
                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
              @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <!-- Email -->
            <div class="sm:col-span-3">
              <label for="email" class="block text-sm font-medium text-gray-900">Email Address</label>
              <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}"
                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset 
                {{ $errors->has('email') ? 'ring-red-500' : 'ring-gray-300' }} 
                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
              @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <!-- Phone -->
            <div class="sm:col-span-3">
              <label for="phone" class="block text-sm font-medium text-gray-900">Phone Number</label>
              <input type="tel" name="phone" id="phone" value="{{ old('phone', $student->phone) }}"
                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset 
                {{ $errors->has('phone') ? 'ring-red-500' : 'ring-gray-300' }} 
                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
              @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>

        <!-- Course Information Section -->
        <div class="border-b border-gray-900/10 pb-12 mt-10">
          <h2 class="text-xl font-semibold text-gray-900">Course Information</h2>

          <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            
            <!-- Course -->
            <div class="sm:col-span-3">
              <label for="course" class="block text-sm font-medium text-gray-900">Course</label>
              <select id="course" name="course" x-model="selectedCourseId"
                class="mt-2 block w-full rounded-md border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset 
                {{ $errors->has('course') ? 'ring-red-500' : 'ring-gray-300' }} 
                focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm">
                @foreach ($courses as $course)
                  <option value="{{ $course->id }}" {{ old('course', $student->course_id) == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                  </option>
                @endforeach
              </select>
              @error('course')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <!-- Joining Date -->
            <div class="sm:col-span-3">
              <label for="joining_date" class="block text-sm font-medium text-gray-900">Joining Date</label>
              <input type="date" name="joining_date" id="joining_date" x-model="joiningDate"
                value="{{ old('joining_date', \Carbon\Carbon::parse($student->joining_date)->format('Y-m-d')) }}"
                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset 
                {{ $errors->has('joining_date') ? 'ring-red-500' : 'ring-gray-300' }} 
                focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm">
              @error('joining_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <!-- Course Summary -->
          <div x-show="selectedCourse" x-transition class="mt-10 sm:col-span-6">
            <div class="bg-gray-50 rounded-lg shadow-inner p-6 border border-gray-200">
              <h3 class="text-lg font-semibold text-gray-800 mb-4" x-text="selectedCourse.name"></h3>
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="text-center">
                  <span class="text-sm text-gray-500 block">Course Fee</span>
                  <span class="text-lg font-bold text-gray-800">₹<span x-text="selectedCourse.fees"></span></span>
                </div>
                <div class="text-center">
                  <span class="text-sm text-gray-500 block">Duration</span>
                  <span class="text-lg font-bold text-gray-800"><span x-text="selectedCourse.duration"></span> Months</span>
                </div>
                <div x-show="endDate" class="text-center">
                  <span class="text-sm text-gray-500 block">Estimated End Date</span>
                  <span class="text-lg font-bold text-gray-800" x-text="endDate"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 flex justify-end gap-x-4">
          <a href="{{ route('home') }}" class="px-6 py-2.5 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">Cancel</a>
          <button type="submit" class="rounded-md bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Update Student</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Alpine Component -->
  <script>
    function studentForm() {
      return {
        selectedCourseId: "{{ old('course', $student->course_id) }}",
        joiningDate: "{{ old('joining_date', \Carbon\Carbon::parse($student->joining_date)->format('Y-m-d')) }}",
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
