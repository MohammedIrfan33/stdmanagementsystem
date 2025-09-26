<x-layout title="Payments">
  <div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="bg-white rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl p-8 max-w-lg w-full">
      <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Add Payment</h1>
      
      <form action="#" method="POST" class="space-y-5">

        <!-- Student Input & Dropdown (UI only) -->
        <div class="relative">
          <label for="studentSearch" class="block text-gray-700 font-medium mb-1">Select Student</label>
          <input type="text" id="search" placeholder="Type to search..." 
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">

             <div id="studentCard" class="bg-white shadow-lg rounded-lg p-6 mb-4 hidden">
    <h2 class="text-xl font-bold text-gray-900 mb-2" id="studentName"></h2>
    <p class="text-gray-700" id="studentInfo">Student details will appear here.</p>
  </div>
          <select name="student_id" id="studentSelect" 
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            <option value="">Select a student</option>
            <option value="1">Alice Johnson</option>
            <option value="2">Bob Smith</option>
            <option value="3">Charlie Brown</option>
            <option value="4">David Lee</option>
            <option value="5">Eva Green</option>
          </select>
        </div>

        <!-- Amount -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Amount</label>
          <input type="number" name="amount" step="0.01" placeholder="Enter amount" 
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
        </div>

        <!-- Payment Date -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Payment Date</label>
          <input type="date" name="payment_date" 
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
        </div>

        <!-- Payment Mode -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Payment Mode</label>
          <select name="payment_mode" 
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
            <option value="">Select Payment Mode</option>
            <option value="Card">Card</option>
            <option value="UPI">UPI</option>
            <option value="Cash">Cash</option>
          </select>
        </div>

        <!-- Note -->
        <div>
          <label class="block text-gray-700 font-medium mb-1">Note</label>
          <textarea name="note" placeholder="Optional note" rows="3" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"></textarea>
        </div>

        <!-- Submit -->
        <button type="submit" 
                class="w-full bg-black text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-xl">
          Add Payment
        </button>
      </form>
    </div>
  </div>




  @endphp

  <script>

    const studentList =  @json($students);


    const  input = document.getElementById('search');
    const studentCard = document.getElementById('studentCard');

     input.addEventListener('input', function(){

        if(this.value != " " ){

            studentCard.classList.remove('hidden');

            const 



            
            
        }



    });




  </script>
</x-layout>
