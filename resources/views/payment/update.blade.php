<x-layout title="Edit Payments">

<div class="flex justify-center items-center min-h-screen">
    <div
        class="bg-white rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl p-8 max-w-lg w-full">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Edit Payment</h1>

        <form method="#" action="#" class="space-y-5">
           

            <!-- Student Input -->

            <div class="relative">
    <label class="block text-gray-700 font-medium mb-1">Student</label>
    
    <!-- Hidden input for student_id -->
    <input type="hidden" name="student_id" id="studentId" value="{{ old('student_id', $fee->student->id) }}">

    <!-- Searchable input -->
    <input type="text" name="student_name" id="search"
        value="{{ old('student_name', $fee->student->name) }}"
        class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        placeholder="Search student...">

    <!-- Dropdown card -->
    <div id="studentCard" class="absolute w-full bg-white border border-gray-300 rounded-lg shadow-lg mt-1 hidden z-50">
        <ul id="studentList" class="max-h-48 overflow-auto"></ul>
    </div>
</div>

            

            <input type="hidden" name="student_id" id="studentId" value="{{ old('student_id') }}">

            <!-- Amount -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Amount</label>
                <input type="number" name="amount" 
                    value="{{ old('amount', $fee->amount) }}" step="0.01"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    required>
            </div>

            <!-- Payment Date -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Payment Date</label>
                <input type="date" name="payment_date" 
                    value="{{ old('payment_date', $fee->payment_date) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    required>
            </div>

            <!-- Payment Mode -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Payment Mode</label>
                <select name="payment_mode"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    required>
                    <option value="">Select Payment Mode</option>
                    <option value="Card" {{ old('payment_mode', $fee->payment_mode) == 'Card' ? 'selected' : '' }}>Card</option>
                    <option value="UPI" {{ old('payment_mode', $fee->payment_mode) == 'UPI' ? 'selected' : '' }}>UPI</option>
                    <option value="Cash" {{ old('payment_mode', $fee->payment_mode) == 'Cash' ? 'selected' : '' }}>Cash</option>
                </select>
            </div>

            <!-- Note -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Note</label>
                <textarea name="note" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">{{ old('note', $fee->note) }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="flex space-x-3">
                <button type="submit"
                    class="flex-1 bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-xl">
                    Update Payment
                </button>
                <a href="#"
                    class="flex-1 bg-gray-400 text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-xl text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>


<script>
    const studentList = @json($students);
    const input = document.getElementById('search');
    const studentIdInput = document.getElementById('studentId');
    const studentCard = document.getElementById('studentCard');
    const studentListContainer = document.getElementById('studentList');

    // ✅ Pre-fill old student if validation failed
    const oldStudentId = "{{ old('student_id', $fee->student_id) }}";
    if (oldStudentId) {
        const selectedStudent = studentList.find(s => s.id == oldStudentId);
        if (selectedStudent) {
            input.value = selectedStudent.name;
            studentIdInput.value = selectedStudent.id;
        }
    }

    // ✅ Filter/search logic
    input.addEventListener('input', function () {
        const value = this.value.trim();
        studentListContainer.innerHTML = "";

        if (value !== "") {
            studentCard.classList.remove('hidden');
            const filteredStudents = studentList.filter(student =>
                student.name.toLowerCase().includes(value.toLowerCase())
            );

            if (filteredStudents.length > 0) {
                filteredStudents.forEach(student => {
                    const li = document.createElement('li');
                    li.textContent = student.name;
                    li.className = 'select-student px-3 py-2 hover:bg-gray-100 cursor-pointer flex items-center';
                    
                    // Optional icon
                    const icon = document.createElement('span');
                    icon.innerHTML = '👤';
                    icon.className = 'mr-2';
                    li.prepend(icon);

                    studentListContainer.appendChild(li);

                    li.addEventListener('click', () => {
                        input.value = student.name;
                        studentIdInput.value = student.id;
                        studentCard.classList.add('hidden');
                        studentListContainer.innerHTML = "";
                    });
                });
            } else {
                const li = document.createElement('li');
                li.textContent = "No students found";
                li.className = 'px-3 py-2 text-gray-500';
                studentListContainer.appendChild(li);
            }
        } else {
            studentCard.classList.add('hidden');
        }
    });

    // ✅ Hide dropdown if clicked outside
    document.addEventListener('click', function(e) {
        if (!studentCard.contains(e.target) && e.target !== input) {
            studentCard.classList.add('hidden');
        }
    });
</script>









</x-layout>
