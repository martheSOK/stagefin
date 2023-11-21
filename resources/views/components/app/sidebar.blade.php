<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak
    ></div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        x-cloak="lg"
    >

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <img class="object-cover object-center w-full h-full border-2 rounded-lg " src="{{ asset('images/logo.png') }}" width="760" height="1024" alt="Authentication image" />
               
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    {{-- <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['dashboard'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['dashboard']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['dashboard'])){{ 'hover:text-slate-200' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-indigo-500' }}@else{{ 'text-slate-400' }}@endif" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-indigo-600' }}@else{{ 'text-slate-600' }}@endif" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-indigo-200' }}@else{{ 'text-slate-400' }}@endif" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Administration</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['dashboard'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['dashboard'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('dashboard')){{ '!text-indigo-500' }}@endif" href="{{ route('dashboard') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Main</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('analytics')){{ '!text-indigo-500' }}@endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Analytics</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('fintech')){{ '!text-indigo-500' }}@endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Fintech</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

{{-- ----------------------------------------------------------------------------------------PERSONNELS---------------------------------------------------------------------------------------- --}}
                   
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['ecommerce']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'hover:text-slate-200' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-300' }}@else{{ 'text-slate-400' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-600' }}@else{{ 'text-slate-700' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-500' }}@else{{ 'text-slate-600' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Personnels</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href="{{ route('personnels.index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Créer un personnel</span>
                                    </a>
                                </li>
                                
                               
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('cart-3')){{ '!text-indigo-500' }}@endif" href="{{ route('personnels.create') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Liste personnel 3</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>


{{-- -----------------------------------------------------------------------------------------DEPOT--------------------------------------------------------------------------------------- --}}
                    <!-- E-Commerce -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['ecommerce']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'hover:text-slate-200' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-300' }}@else{{ 'text-slate-400' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-600' }}@else{{ 'text-slate-700' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-500' }}@else{{ 'text-slate-600' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dépôt</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href="{{ route('depots.index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Créer un dépôt</span>
                                    </a>
                                </li>
                                
                               
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('cart-3')){{ '!text-indigo-500' }}@endif" href=" {{ route('depots.create') }} ">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Liste des dépôts 3</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>



{{-- ----------------------------------------------------------------------------------------EMBALLAGES---------------------------------------------------------------------------------------- --}}
                    <!-- E-Commerce -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['ecommerce']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'hover:text-slate-200' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-300' }}@else{{ 'text-slate-400' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-600' }}@else{{ 'text-slate-700' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-500' }}@else{{ 'text-slate-600' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Emballages</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href=" {{ route('emballages.create') }} ">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Créer un emballage</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href="{{ route('emballages.index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Listes emballages</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


{{-- ---------------------------------------------------------------------------------------FOURNISSEURS---------------------------------------------------------------------------------------- --}}
                    <!-- E-Commerce -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['ecommerce']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'hover:text-slate-200' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-300' }}@else{{ 'text-slate-400' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-600' }}@else{{ 'text-slate-700' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-500' }}@else{{ 'text-slate-600' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">FOURNISSEURS</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href=" {{ route('fournisseurs.create') }} ">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Créer un fournisseur</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href="{{ route('fournisseurs.index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Listes fournisseurs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


{{-- ----------------------------------------------------------------------------------------------STOCK DEPOT---------------------------------------------------------------------------------- --}}
                    <!-- E-Commerce -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['ecommerce']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'hover:text-slate-200' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-300' }}@else{{ 'text-slate-400' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-600' }}@else{{ 'text-slate-700' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-500' }}@else{{ 'text-slate-600' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Stock dépôt</span>
                                </div>
                                <!-- Icon -->
                                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href=" {{ route('stocks.create') }} ">
                                                <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Créer un stock</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href=" {{ route('stocks.index') }} ">
                                                <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Listes stock</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        
                    </li>



{{-- --------------------------------------------------------------------------------------CLIENTS------------------------------------------------------------------------------------------ --}}
                    <!-- E-Commerce -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['ecommerce']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'hover:text-slate-200' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-300' }}@else{{ 'text-slate-400' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-600' }}@else{{ 'text-slate-700' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-500' }}@else{{ 'text-slate-600' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Clients</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href=" {{ route('clients.create') }} ">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Créer un client</span>
                                    </a>
                                </li>
                                
                               
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('cart-3')){{ '!text-indigo-500' }}@endif" href="{{ route('clients.index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Liste des clients </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>



{{-- ------------------------------------------------------------------------------------------MOUVEMENTS-------------------------------------------------------------------------------------- --}}
                    <!-- E-Commerce -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['ecommerce']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'hover:text-slate-200' }}@endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-300' }}@else{{ 'text-slate-400' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-600' }}@else{{ 'text-slate-700' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if(in_array(Request::segment(1), ['ecommerce'])){{ 'text-indigo-500' }}@else{{ 'text-slate-600' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mouvement</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(1), ['ecommerce'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if(!in_array(Request::segment(1), ['ecommerce'])){{ 'hidden' }}@endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('customers')){{ '!text-indigo-500' }}@endif" href="{{ route('mouvements.create') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Enregistrer un</span>
                                    </a>
                                </li>
                                
                               
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('cart-3')){{ '!text-indigo-500' }}@endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Liste des mouvements</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if(Route::is('pay')){{ '!text-indigo-500' }}@endif" href="{{ route('mouvements.index') }}"></a>
                                </li>
                            </ul>
                        </div>
                    </li>



{{-- ------------------------------------------------------------------------------------------------BILAN-------------------------------------------------------------------------------- --}}


                </ul>
            </div>

            
            <!-- More group -->
            <div>
                <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="trut-slate-200 transition duration-150 truncate @if(Route::is('form-page')){{ '!text-indigo-500' }}@endif" href="#0">
                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Input Form</span>
                    </a>
                </li>e">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">More</span>
                </h3>
                <ul class="mt-3">
                    <!-- Authentication -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" x-data="{ open: false }">
                        <a class="block text-slate-200 transition duration-150" :class="open ? 'hover:text-slate-200' : 'hover:text-white'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-slate-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z" />
                                        <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Authentication</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="{ 'rotate-180': open }" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1" :class="{ 'hidden': !open }" x-cloak>
                                <li class="mb-1 last:mb-0">
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign In</span>
                                        </a>
                                    </form>                                     
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign Up</span>
                                        </a>
                                    </form>                                      
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reset Password</span>
                                        </a>
                                    </form>                                      
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>
        
    </div>
    
</div>
