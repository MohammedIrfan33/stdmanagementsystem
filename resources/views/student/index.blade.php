<x-layout title="Student Records">
    <div class="w-full px-4 sm:px-8 mt-10">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2 sm:mb-0">Student Management</h1>
            <a href="{{ route('add-student') }}"
               class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                          clip-rule="evenodd"/>
                </svg>
                Add Student
            </a>
        </div>

        <div class="bg-white p-4 sm:p-6 rounded-xl shadow-lg">
            <div class="overflow-x-auto max-h-[70vh]">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">#</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Name</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Email</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Phone</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Course</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Duration</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Joining Date</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">End Date</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Balance Days</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Total Fees</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Balance</th>
                            <th class="sticky top-0 bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Status</th>
                            <th class="sticky top-0 bg-gray-50 relative px-6 py-3 whitespace-nowrap">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($students as $student)
                            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500 align-middle">{{ $student->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800 align-middle">{{ $student->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">{{ $student->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">{{ $student->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800 align-middle">
                                    {{ $student->course ? $student->course->name : 'No Course' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">
                                    {{ $student->course ? $student->course->duration : 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">{{ $student->joining_date_formatted }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">{{ $student->end_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium align-middle opacity-70">{{ $student->balance_day }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 align-middle">₹{{ $student->course->fees }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-600 align-middle">₹5,000</td>
                                <td class="px-6 py-4 whitespace-nowrap align-middle">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <svg class="w-2.5 h-2.5 mr-1.5" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3"/>
                                        </svg>
                                        {{ $student->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium align-middle">
                                    <div class="flex items-center justify-end space-x-4">
                                        <a href="{{route('edit-student',['id' => $student->id ])}}">
                                            <button class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L14.732 3.732z"/>
                                            </svg>
                                            Edit
                                        </button>
                                            
                                        </a>
                                        
                                        <button id="std-btn-del" data-id="{{ $student->id }}" class="text-red-600 hover:text-red-900 transition-colors duration-200 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="px-6 py-4 text-center text-sm text-gray-500">
                                    No students found. <a href="{{ route('add-student') }}" class="text-blue-600 hover:underline">Add one</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            // Setup CSRF for AJAX
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $(document).on('click', '#std-btn-del', function () {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Delete user?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const deleteUrl = "{{ route('delete-student', ['id' => 'USER_ID']) }}".replace('USER_ID', id);

                        $.ajax({
                            url: deleteUrl,
                            type: 'DELETE',
                            success: function (res) {
                                Swal.fire('Deleted!', res.message, 'success').then(() => {
                                    location.reload();
                                });
                            },
                            error: function () {
                                Swal.fire('Error', 'Could not delete', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
</x-layout>
