@props(['linkapage'=>false])






<a {{ $attributes }} class="{{ $linkapage ? "bg-white  text-blue-600" : "text-white bg-transparent" }} font-semibold px-4 py-2 rounded-md shadow hover:bg-blue-100 hover:text-blue-600 transition duration-200">{{ $slot }}</a>
