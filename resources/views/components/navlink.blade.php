@props(['linkapage' => false, 'icon' => null])
<li>


<a {{ $attributes }}
   class="{{ $linkapage 
       ? 'bg-black/30 text-white' 
       : 'bg-transparent text-white hover:bg-black/20' }} 
       font-semibold text-lg transition duration-200 ease-in-out block w-full px-4 py-2">
   
   <div class="flex items-center gap-3">
 
  

       @if($icon)
           <i class="{{ $icon }} text-white text-lg"></i> <!-- icon color white -->
       @endif
       <span>{{ $slot }}</span>
   </div>
</a>


</li>
