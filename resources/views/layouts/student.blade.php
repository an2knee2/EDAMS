@extends('layouts.components.main')

@section('navbar')
<div class="flex items-center justify-between">

    <!-- Left Side: Sidebar Toggle -->
    <div class="flex items-center">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden">
            <span class="sr-only">Open sidebar</span>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FAFFFF">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/>
            </svg>
        </button>
    </div>

      <!-- Right Side: User Profile -->
    <div class="flex items-center">
        <div class="flex items-center ms-3">
            <div>
                <button type="button" class="flex text-sm" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="#e8eaed">
                    <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/>
                </svg>
                </button>
            </div>
            
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-white-700 dark:divide-white-600" id="dropdown-user">
                <div class="px-4 py-3" role="none">
                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-white-300 dark:hover:bg-blue-100 dark:hover:text-black text-left" role="menuitem">Profile</a>
                    <hr class="border-t border-gray-300 dark:border-white-600 w-full"></hr>
                
                    <!-- Logout Form -->
                    <form action="#" method="POST" class="block">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-white-300 dark:hover:bg-blue-100 dark:hover:text-black text-left">
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
      <a class="flex items-center ps-2.5 mb-5">
         <img src="{{ asset('EDAMS_logo.png') }}" alt="Logo" class="h-12 me-3 sm:h-13"/>
         <span class="self-center text-white text-2xl font-semibold font-serif tracking-widest">EDAMS</span>
      </a>
      <ul class="space-y-2 font-medium" id="sidebar-menu">
         <li>
            <a href="{{ url('/student/home') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-800 dark:hover:bg-blue-800 group">
               <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e7efff">
                  <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/>
               </svg>
               <span class="flex-1 ms-2 whitespace-nowrap text-white">Home</span>
            </a>
         </li>
         <li>
            <a href="{{ url('/student/assessment') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-800 dark:hover:bg-blue-800 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e7efff">
               <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm80-80h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm200-190q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z"/>
            </svg>
               <span class="flex-1 ms-2 whitespace-nowrap text-white">Assessment</span>
            </a>
         </li>
         <li>
            <a href="{{ route('student.history') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-800 dark:hover:bg-blue-800 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e7efff">
               <path d="M480-120q-138 0-240.5-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z"/>
            </svg>
               <span class="flex-1 ms-2 whitespace-nowrap text-white">History</span>
            </a>
         </li>
         <li>
            <a href="{{ url('/student/contact') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-800 dark:hover:bg-blue-800 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e7efff">
               <path d="m503.33-80-10-113.33h-30q-142.66 0-243-100.34Q120-394 120-536.67q0-142.66 100.67-243Q321.33-880 464.67-880q71 0 131.83 25.83 60.83 25.84 106.33 72 45.5 46.17 71.34 108.34Q800-611.67 800-538.67q0 69-21.17 136-21.16 67-60 126.67-38.83 59.67-93.66 109.67-54.84 50-121.84 86.33Zm60-120.67q78.34-66 124.17-155.16 45.83-89.17 45.83-182.84 0-119-76.83-196.83-76.83-77.83-191.83-77.83-116.34 0-197.17 80.83-80.83 80.83-80.83 195.83 0 115 80.83 195.84Q348.33-260 463.33-260h100v59.33Zm-99-108.33q16.34 0 27.67-11.33 11.33-11.34 11.33-27.67 0-16.33-11.33-27.67Q480.67-387 464.33-387q-16.33 0-27.66 11.33-11.34 11.34-11.34 27.67 0 16.33 11.34 27.67Q448-309 464.33-309Zm-27.66-133H490q0-26.67 7.67-41.67 7.66-15 36.33-43.66 24-24 35.33-46 11.34-22 11.34-47.34 0-47-31.84-74.83-31.83-27.83-81.5-27.83-42.66 0-74.66 22.83T346-640.67l49.33 20q9-23 26.67-36.83 17.67-13.83 43.33-13.83 29 0 44.84 14.66Q526-642 526-620q0 18.33-10.67 35.83-10.66 17.5-34 41.5-29.66 28.67-37.16 45.84-7.5 17.16-7.5 54.83ZM460-507Z"/>
            </svg>
            <span class="flex-1 ms-2 whitespace-nowrap text-white">Contact Us</span>
            </a>
         </li>
      </ul>
@endsection