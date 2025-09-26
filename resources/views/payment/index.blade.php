<x-layout title="Payments">
<body class="bg-gray-100">
<style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F3F4F6;
        }
        .payment-table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%; /* Ensure table takes full width */
        }
        .payment-table th {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #f9fafb;
            padding-top: 1rem; /* Slightly more padding for sticky headers */
            padding-bottom: 1rem;
        }
        .payment-mode-badge {
            padding: 0.35rem 0.65rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            background-color: #e5e7eb; /* Subtle change for better contrast */
            color: #1f2937; /* Darker text for better contrast */
        }
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .table-container {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        /* Adjusted search icon vertical alignment */
        .search-input-wrapper {
            position: relative;
        }
        .search-input-wrapper .fa-search {
            position: absolute;
            left: 0.75rem; /* Equivalent to pl-3 */
            top: 50%; /* Center vertically */
            transform: translateY(-50%); /* Adjust for icon's own height */
            color: #9ca3af; /* Gray-400 */
        }
        .search-input-wrapper input {
            padding-left: 2.5rem; /* Space for the icon */
        }
    </style>

    <div class="w-full px-4 sm:px-8 mt-10">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2 sm:mb-0">Payment Management</h1>
            <a href="#"
               class="inline-flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg card-shadow hover:bg-blue-700 transition-colors duration-300 text-base">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                          clip-rule="evenodd"/>
                </svg>
                Add Payment
            </a>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white p-5 rounded-lg card-shadow mb-5">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="student-filter" class="block text-sm font-medium text-gray-700 mb-1">Student</label>
                    <select id="student-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-800">
                        <option>All Students</option>
                        <option>John Doe</option>
                        <option>Jane Smith</option>
                        <option>Robert Johnson</option>
                    </select>
                </div>
                <div>
                    <label for="mode-filter" class="block text-sm font-medium text-gray-700 mb-1">Payment Mode</label>
                    <select id="mode-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-800">
                        <option>All Modes</option>
                        <option>Cash</option>
                        <option>Bank Transfer</option>
                        <option>UPI</option>
                        <option>Card</option>
                    </select>
                </div>
                <div>
                    <label for="date-filter" class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                    <select id="date-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-800">
                        <option>All Time</option>
                        <option>This Month</option>
                        <option>Last Month</option>
                        <option>Last 3 Months</option>
                    </select>
                </div>
                <div>
                    <label for="search-input" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <div class="search-input-wrapper">
                        <input id="search-input" type="text" placeholder="Search payments..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-5 rounded-lg card-shadow flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Payments</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">₹86,500</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full flex-shrink-0">
                    <i class="fas fa-receipt text-blue-600 text-xl"></i>
                </div>
            </div>
            
            <div class="bg-white p-5 rounded-lg card-shadow flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pending Payments</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">₹12,800</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full flex-shrink-0">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
            </div>
            
            <div class="bg-white p-5 rounded-lg card-shadow flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">This Month</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">₹24,300</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full flex-shrink-0">
                    <i class="fas fa-calendar text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 sm:p-6 rounded-lg table-container mb-6">
            <div class="overflow-x-auto max-h-[70vh] rounded-lg border border-gray-200"> <!-- Added border for table container -->
                <table class="min-w-full divide-y divide-gray-200 payment-table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Student</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Payment Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Payment Mode</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Note</th>
                            <th class="relative px-6 py-3 whitespace-nowrap">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500 align-middle">101</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <p class="text-sm font-semibold text-gray-800">John Doe</p>
                                <p class="text-xs text-gray-500 mt-1">john.doe@example.com</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 align-middle">
                                Web Development
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 align-middle">
                                ₹12,500
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">15 Aug 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <span class="payment-mode-badge">
                                    <i class="fas fa-building mr-1"></i> Bank Transfer
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 align-middle">
                                Second installment for web development course
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium align-middle">
                                <div class="flex items-center justify-end space-x-4">
                                    <a href="#">
                                        <button class="text-blue-600 hover:text-blue-900 transition-colors duration-200 flex items-center">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                    </a>
                                    
                                    <button class="text-red-600 hover:text-red-900 transition-colors duration-200 flex items-center">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500 align-middle">102</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <p class="text-sm font-semibold text-gray-800">Jane Smith</p>
                                <p class="text-xs text-gray-500 mt-1">jane.smith@example.com</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 align-middle">
                                Data Science
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 align-middle">
                                ₹8,000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">12 Aug 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <span class="payment-mode-badge">
                                    <i class="fas fa-money-bill-wave mr-1"></i> Cash
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 align-middle">
                                First installment
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium align-middle">
                                <div class="flex items-center justify-end space-x-4">
                                    <a href="#">
                                        <button class="text-blue-600 hover:text-blue-900 transition-colors duration-200 flex items-center">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                    </a>
                                    
                                    <button class="text-red-600 hover:text-red-900 transition-colors duration-200 flex items-center">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500 align-middle">103</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <p class="text-sm font-semibold text-gray-800">Robert Johnson</p>
                                <p class="text-xs text-gray-500 mt-1">robert@example.com</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 align-middle">
                                Digital Marketing
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 align-middle">
                                ₹10,000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">10 Aug 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <span class="payment-mode-badge">
                                    <i class="fas fa-mobile-alt mr-1"></i> UPI
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 align-middle">
                                Full course payment with 10% discount
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium align-middle">
                                <div class="flex items-center justify-end space-x-4">
                                    <a href="#">
                                        <button class="text-blue-600 hover:text-blue-900 transition-colors duration-200 flex items-center">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                    </a>
                                    
                                    <button class="text-red-600 hover:text-red-900 transition-colors duration-200 flex items-center">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500 align-middle">104</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <p class="text-sm font-semibold text-gray-800">Sarah Williams</p>
                                <p class="text-xs text-gray-500 mt-1">sarah@example.com</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 align-middle">
                                Graphic Design
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 align-middle">
                                ₹6,500
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">08 Aug 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <span class="payment-mode-badge">
                                    <i class="fas fa-credit-card mr-1"></i> Card
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 align-middle">
                                -- 
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium align-middle">
                                <div class="flex items-center justify-end space-x-4">
                                    <a href="#">
                                        <button class="text-blue-600 hover:text-blue-900 transition-colors duration-200 flex items-center">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                    </a>
                                    
                                    <button class="text-red-600 hover:text-red-900 transition-colors duration-200 flex items-center">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500 align-middle">105</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <p class="text-sm font-semibold text-gray-800">Michael Brown</p>
                                <p class="text-xs text-gray-500 mt-1">michael@example.com</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 align-middle">
                                Python Programming
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 align-middle">
                                ₹9,000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 align-middle">05 Aug 2023</td>
                            <td class="px-6 py-4 whitespace-nowrap align-middle">
                                <span class="payment-mode-badge">
                                    <i class="fas fa-building mr-1"></i> Bank Transfer
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 align-middle">
                                Third installment, late fee included
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium align-middle">
                                <div class="flex items-center justify-end space-x-4">
                                    <a href="#">
                                        <button class="text-blue-600 hover:text-blue-900 transition-colors duration-200 flex items-center">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                    </a>
                                    
                                    <button class="text-red-600 hover:text-red-900 transition-colors duration-200 flex items-center">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between rounded-b-lg">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-semibold">1</span> to <span class="font-semibold">5</span> of <span class="font-semibold">24</span> results
                </div>
                <div class="flex space-x-2">
                    <a href="#" class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 text-sm card-shadow flex items-center">Previous</a>
                    <a href="#" class="px-3 py-1 rounded-md bg-blue-600 text-white text-sm card-shadow flex items-center font-medium">1</a>
                    <a href="#" class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 text-sm card-shadow flex items-center">2</a>
                    <a href="#" class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 text-sm card-shadow flex items-center">3</a>
                    <a href="#" class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 text-sm card-shadow flex items-center">Next</a>
                </div>
            </div>
        </div>
    </div>
</body>
</x-layout>