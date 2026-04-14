<x-layout title="Dashboard">
  <div class="px-6 py-8 h-full bg-gray-50/50">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900">Dashboard Overview</h1>
        <p class="text-gray-500 mt-1">Welcome back! Here's what's happening with your students and financials today.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

        <!-- Total Students -->
        <a href="{{ route('students') }}" class="block bg-white rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border border-gray-100 hover:-translate-y-1 transition-transform duration-300">
          <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Students</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $totalStudents }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-xl shadow-inner">
                <i class="fa-solid fa-users"></i>
            </div>
          </div>
        </a>

        <!-- Course Count -->
        <a href="{{ route('course') }}" class="block bg-white rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border border-gray-100 hover:-translate-y-1 transition-transform duration-300">
          <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Courses</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $courseCount }}</h3>
            </div>
            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center text-xl shadow-inner">
                <i class="fa-solid fa-book-open"></i>
            </div>
          </div>
        </a>

        <!-- Students with Due Fees -->
        <a href="{{ route('students') }}" class="block bg-white rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border border-gray-100 hover:-translate-y-1 transition-transform duration-300">
          <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Students (Due Balance)</p>
                <h3 class="text-3xl font-bold text-red-600">{{ $dueStudentsCount }}</h3>
            </div>
            <div class="w-12 h-12 bg-red-50 text-red-600 rounded-full flex items-center justify-center text-xl shadow-inner">
                <i class="fa-solid fa-user-clock"></i>
            </div>
          </div>
        </a>

        <!-- Students Completed Fees -->
        <a href="{{ route('students') }}" class="block bg-white rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border border-gray-100 hover:-translate-y-1 transition-transform duration-300">
          <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Students (Paid Full)</p>
                <h3 class="text-3xl font-bold text-green-600">{{ $completedStudentsCount }}</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 text-green-600 rounded-full flex items-center justify-center text-xl shadow-inner">
                <i class="fa-solid fa-user-check"></i>
            </div>
          </div>
        </a>

        <!-- Total Fees Collected --> 
        <a href="{{ route('payments') }}" class="block bg-white rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border border-gray-100 hover:-translate-y-1 transition-transform duration-300 xl:col-span-2">

          <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Fees Collected</p>
                <h3 class="text-4xl font-extrabold text-teal-600">₹{{ number_format($totalFeesCollected, 0) }}</h3>
            </div>
            <div class="w-14 h-14 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center text-2xl shadow-inner">
                <i class="fa-solid fa-wallet"></i>
            </div>
          </div>
        </a>

        <!-- Total Due Amount -->

        <a href="{{ route('payments') }}" class="block bg-white rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border border-gray-100 hover:-translate-y-1 transition-transform duration-300 xl:col-span-2">
          <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Due Market</p>
                <h3 class="text-4xl font-extrabold text-rose-600">₹{{ number_format($totalDueAmount, 0) }}</h3>
            </div>
            <div class="w-14 h-14 bg-rose-50 text-rose-600 rounded-full flex items-center justify-center text-2xl shadow-inner">
                <i class="fa-solid fa-chart-line"></i>
            </div>
          </div>
        </a>

    </div>

    <!-- Lists Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
        
        <!-- Due Students List -->
        <div class="bg-white rounded-2xl p-0 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border border-gray-100 overflow-hidden flex flex-col">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                <div class="flex flex-row items-center gap-2">
                    <i class="fa-solid fa-list text-red-600"></i>
                    <h3 class="text-lg font-bold text-gray-800">Students with Due Fees</h3>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-800">{{ $dueStudentsList->count() }}</span>
            </div>
            <div class="overflow-y-auto max-h-[400px]">
                <ul class="divide-y divide-gray-100">
                    @forelse($dueStudentsList as $student)
                        <li class="px-6 py-4 hover:bg-red-50/30 transition-colors duration-150 grid grid-cols-3 items-center">
                            <!-- Left: Student Info -->
                            <div class="flex flex-col text-left">
                                <span class="text-sm font-semibold text-gray-900">{{ $student->name }}</span>
                                <span class="text-xs text-gray-500 mt-0.5">{{ $student->phone }}</span>
                            </div>
                            
                            <!-- Center: Due Amount -->
                            <div class="text-center flex flex-col items-center">
                                <span class="text-sm font-bold text-red-600">₹{{ number_format($student->due_payment, 0) }}</span>
                                <span class="text-xs text-gray-500 mt-0.5">{{ $student->course ? $student->course->name : 'N/A' }}</span>
                            </div>
                            
                            <!-- Right: Action Button -->
                            <div class="text-right flex justify-end">
                                <a href="{{ route('add-payment', ['student_id' => $student->id]) }}" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold py-1.5 px-3 rounded shadow transition-colors" title="Add Payment">
                                    Pay
                                </a>
                            </div>
                        </li>
                    @empty
                        <li class="px-6 py-10 flex flex-col items-center justify-center text-gray-400">
                            <i class="fa-regular fa-face-smile text-3xl mb-2 text-gray-300"></i>
                            <span class="text-sm font-medium">No pending dues. Great job!</span>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>


        
        <!-- Completed Course Students List -->
        <div class="bg-white rounded-2xl p-0 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border border-gray-100 overflow-hidden flex flex-col">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                <div class="flex flex-row items-center gap-2">
                    <i class="fa-solid fa-graduation-cap text-indigo-600"></i>
                    <h3 class="text-lg font-bold text-gray-800">Course Duration Completed <span class="text-sm font-normal text-gray-500">(This Week)</span></h3>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-100 text-indigo-800">{{ $completedCourseStudentsList->count() }}</span>
            </div>
            <div class="overflow-y-auto max-h-[400px]">
                <ul class="divide-y divide-gray-100">
                    @forelse($completedCourseStudentsList as $student)
                        <li class="px-6 py-4 hover:bg-indigo-50/30 transition-colors duration-150 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-gray-900">{{ $student->name }}</span>
                                <span class="text-xs text-gray-500 mt-0.5">Ended: {{ $student->end_date }}</span>
                            </div>
                            <div class="text-right flex flex-col items-end">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-green-100 text-green-800 mb-1">
                                    Concluded
                                </span>
                                <span class="text-xs text-gray-500 font-medium opacity-75">{{ $student->balance_day }}</span>
                            </div>
                        </li>
                    @empty
                        <li class="px-6 py-10 flex flex-col items-center justify-center text-gray-400">
                            <i class="fa-solid fa-box-open text-3xl mb-2 text-gray-300"></i>
                            <span class="text-sm font-medium">No completed courses found.</span>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>

    </div>
  </div>
</x-layout>
