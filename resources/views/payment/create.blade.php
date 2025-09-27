<x-layout title="Payments">

  <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div
      class="bg-white rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl p-8 max-w-lg w-full">
      <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Add Payment</h1>

      <form action="{{ route('store-payments') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Student Input & Dropdown -->
        <div class="relative">
          <label for="studentSearch" class="block text-gray-700 font-medium mb-1">Select Student</label>
          <input type="text" id="search" placeholder="Type to search..."
            class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">

          @error('student_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror

          <input type="hidden" name="student_id" id="studentId" value="{{ old('student_id') }}">

          <div id="studentCard" class="bg-white shadow-lg rounded-lg mb-4 hidden">
            <h2 class="text-xl font-bold text-gray-900 mb-2" id="studentName"></h2>
            <ul class="divide-y divide-gray-200" id="studentList"></ul>
          </div>
        </div>

        <!-- Amount -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Amount</label>
          <input type="number" name="amount" value="{{ old('amount') }}" step="0.01" placeholder="Enter amount"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
            required>
          @error('amount')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Payment Date -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Payment Date</label>
          <input type="date" name="payment_date" value="{{ old('payment_date') }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
            required>
          @error('payment_date')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Payment Mode -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Payment Mode</label>
          <select name="payment_mode"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
            required>
            <option value="">Select Payment Mode</option>
            <option value="Card" {{ old('payment_mode') == 'Card' ? 'selected' : '' }}>Card</option>
            <option value="UPI" {{ old('payment_mode') == 'UPI' ? 'selected' : '' }}>UPI</option>
            <option value="Cash" {{ old('payment_mode') == 'Cash' ? 'selected' : '' }}>Cash</option>
          </select>
          @error('payment_mode')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Note -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Note</label>
          <textarea name="note" placeholder="Optional note" rows="3"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">{{ old('note') }}</textarea>
        </div>

        <!-- Submit -->
        <button type="submit"
          class="w-full bg-black text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-xl">
          Add Payment
        </button>
      </form>
    </div>
  </div>

  <!-- Student Search JS -->
  <script>
    const studentList = @json($students);
    const input = document.getElementById('search');
    const studentIdInput = document.getElementById('studentId');
    const studentCard = document.getElementById('studentCard');
    const studentListContainer = document.getElementById('studentList');

    // ✅ Pre-fill old student name if validation failed
    const oldStudentId = "{{ old('student_id') }}";
    if (oldStudentId) {
        const selectedStudent = studentList.find(s => s.id == oldStudentId);
        if (selectedStudent) {
            input.value = selectedStudent.name;
            studentIdInput.value = selectedStudent.id;
        }
    }

    // ✅ Filter/search logic
    input.addEventListener('input', function () {
        if (this.value != "") {
            studentListContainer.innerHTML = "";
            studentCard.classList.remove('hidden');

            const filteredStudents = studentList.filter(student =>
                student.name.toLowerCase().includes(this.value.toLowerCase())
            );

           if(filteredStudents.length>0){
             filteredStudents.forEach(student => {
                const li = document.createElement('li');
                li.textContent = student.name;
                li.className = 'select-student pl-3 py-2 hover:bg-gray-100';
                studentListContainer.appendChild(li);

                li.addEventListener('click', () => {
                    studentCard.classList.add('hidden');
                    input.value = student.name;
                    studentIdInput.value = student.id;
                    studentListContainer.innerHTML = "";
                });
            });
           }else{
            const li = document.createElement('li');
            li.textContent = "No students found";
            li.className = 'pl-3 py-2 text-gray-500';
            studentListContainer.appendChild(li);
           }
        } else {
            studentCard.classList.add('hidden');
        }
    });
  </script>
</x-layout>
