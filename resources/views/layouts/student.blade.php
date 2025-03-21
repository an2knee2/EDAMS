@extends('layouts.components.main')

@section('navbar')
<div class="flex items-center justify-start rtl:justify-end">
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>
    <div class="flex items-center ms-2 md:me-24">
        <img src="{{ asset('EDAMS_logo.png') }}" class="h-12 me-2" alt="EDAMS Logo" />
        <div class="flex flex-col items-start">
            <span class="text-xl font-semibold sm:text-2xl dark:text-white font-mono tracking-wider">
                EDAMS
            </span>
            <span class="text-xs xs:text-base font-mono tracking-tighter dark:text-gray-300">
                Aware-Assist
            </span>
        </div>
    </div>
</div>

<div class="flex items-center">
    <div class="flex items-center ms-3">
        <div>
            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ asset('Profile.png') }}" alt="user photo">
            </button>
        </div>
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
            <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                    {{ Auth::guard('student')->user()->first_name }}
                    @if(Auth::guard('student')->user()->middle_name) 
                        {{ strtoupper(substr(Auth::guard('student')->user()->middle_name, 0, 1)) }}.
                    @endif 
                    {{ Auth::guard('student')->user()->last_name }}
                    @if(Auth::guard('student')->user()->ext_name) 
                        , {{ Auth::guard('student')->user()->ext_name }}
                    @endif

                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                    {{ Auth::guard('student')->user()->email }}
                </p>
            </div>
            <ul class="py-1" role="none">
                <li>
                    <a href="{{ route('student.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('student.logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
    <ul class="space-y-2 font-medium">
        <li>
            <a href="{{ url('/student/home') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#B7B7B7">
                    <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/>
                </svg>
                <span class="ms-3">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/student/assessment') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#B7B7B7">
                    <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm80-80h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm200-190q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Assessment</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/student/history') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#B7B7B7">
                    <path d="M480-120q-138 0-240.5-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">History</span>
            </a>
        </li>
    </ul>
@endsection