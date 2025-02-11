<aside>
   <!--sidenav -->
   <div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
      <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">

         <h2 class="font-bold text-2xl">AGUAS <span class="bg-[#25b9f8] text-white px-2 rounded-md">FRIAS</span></h2>
      </a>
      <ul class="mt-4">
         <span class="text-gray-400 font-bold">MENU</span>
         <li class="mb-1 group">
            <a href="/principal"
               class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
               <i class="ri-home-2-line mr-3 text-lg"></i>
               <span class="text-sm">Dashboard</span>
            </a>
         </li>
         <li class="mb-1 group">
            <a href="#" wire:click.prevent="toggleDropdown('registro')"
               class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
               <i class='bx bx-user mr-3 text-lg'></i>
               <span class="text-sm">Registro</span>
               <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 @if($isOpen === 'registro') block @else hidden @endif">
               <li class="mb-4">
                  <x-nav_aside_link :href="route('cliente')" :active="request()->routeIs('cliente')" wire:navigate>
                     {{ __('clientes') }}
                  </x-nav_aside_link>
               </li>
               <li class="mb-4">
                  <x-nav_aside_link :href="route('servicio')" :active="request()->routeIs('servicio')" wire:navigate>
                     {{ __('Productos') }}
                  </x-nav_aside_link>
               </li>
            </ul>
         </li>

         <li class="mb-1 group">
            <a href="/asignacion"
               class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
               <i class='bx bx-list-ul mr-3 text-lg'></i>
               <span class="text-sm">Ventas</span>
            </a>
         </li>
         <span class="text-gray-400 font-bold">Pagos</span>
         <li class="mb-1 group">
            <a href=""
               class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
               <i class='bx bxl-blogger mr-3 text-lg'></i>
               <span class="text-sm">Transacciones</span>
               <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
               <li class="mb-4">
                  <a href="/pago"
                     class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Pagos</a>
               </li>
               <li class="mb-4">
                  <x-nav_aside_link :href="route('premio')" :active="request()->routeIs('premio')" wire:navigate>
                     {{ __('Premio') }}
                  </x-nav_aside_link>
               </li>
               <li class="mb-4">
               </li>
            </ul>
         </li>
         <li class="mb-1 group">
            <a href="/iot"
               class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
               <i class='bx bx-archive mr-3 text-lg'></i>
               <span class="text-sm">SISTEMA RIEGO</span>
            </a>
         </li>
         <span class="text-gray-400 font-bold">PERSONAL</span>
         <li class="mb-1 group">
            <a href=""
               class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
               <i class='bx bx-bell mr-3 text-lg'></i>
               <span class="text-sm">Notificaciones</span>
               <span
                  class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">5</span>
            </a>
         </li>
         <li class="mb-1 group">
            <a href=""
               class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
               <i class='bx bx-envelope mr-3 text-lg'></i>
               <span class="text-sm">Mensajes</span>
               <span
                  class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-600 bg-green-200 rounded-full">2
                  New</span>
            </a>
         </li>
      </ul>
   </div>
   <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
   <!-- end sidenav -->
</aside>