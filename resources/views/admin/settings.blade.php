@extends('layouts.admin')

@section('content')
    <main class="px-10 py-5 mx-auto my-0 bg-white max-w-[1440px] max-md:p-4 relative">

        <header class="mb-10">
            <h1 class=" -mt-4 mb-3.5 text-4xl font-bold text-black max-sm:text-3xl">
                Settings
            </h1>
            <p class="-mt-4 mb-5 text-base text-black">Manage your account setting.</p>
            <hr class="border-t border-black" />
        </header>

        @if(session('success'))
            <div id="toast-simple" class="absolute top-4 left-1/2 transform -translate-x-1/2 flex items-center justify-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-slate-300 divide-x divide-gray-200 rounded-lg shadow-sm" role="alert">
                <svg class="w-5 h-5 text-blue-600 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"/>
                </svg>
                <div class="ps-4 text-sm font-normal">{{ session('success') }}</div>
            </div>
        @endif

        <div class="space-y-8">
            <!-- Card 1: Profile Information -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Profile Information</h2>
                <form class="space-y-4" id="profile-form" method="POST" action="{{ route('admin.profile.update') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" name="first_name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ Auth::guard('admin')->user()->first_name }}" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Middle Name</label>
                            <input type="text" name="middle_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ Auth::guard('admin')->user()->middle_name }}" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="last_name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ Auth::guard('admin')->user()->last_name }}" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Extension Name</label>
                            <input type="text" name="extension_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ Auth::guard('admin')->user()->ext_name }}" disabled>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ Auth::guard('admin')->user()->email }}" disabled>
                        </div>
                    </div>
                    <button type="button" id="edit-profile-btn" class="mt-4 w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Edit Profile
                    </button>
                    <button type="submit" id="save-profile-btn" class="mt-4 w-full md:w-auto px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors hidden">
                        Save Changes
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Change Password</h2>
                <form class="space-y-4" id="password-form" method="POST" action="{{ route('admin.password.update') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                            <div class="relative">
                                <input type="password" name="current_password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Enter current password" disabled required>
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                    <i class="far fa-eye"></i>
                                </button>
                                @error('current_password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <div class="relative">
                                <input type="password" name="new_password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Enter new password" disabled required>
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                    <i class="far fa-eye"></i>
                                </button>
                                @error('new_password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                            <div class="relative">
                                <input type="password" name="new_password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Confirm new password" disabled required>
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                    <i class="far fa-eye"></i>
                                </button>
                                @error('new_password_confirmation')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="button" id="edit-password-btn" class="mt-4 w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Update Password
                    </button>
                    <button type="submit" id="save-password-btn" class="mt-4 w-full md:w-auto px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors hidden">
                        Save Changes
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Deactivate Account</h2>
                <div class="space-y-4">
                    <p class="text-gray-600">Deactivating your account will temporarily disable your profile, making it inaccessible to others. Your data will be retained, allowing you to reactivate your account at any time by simply logging back in.</p>
                    
                    <!-- Deactivate Account Button -->
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="w-full md:w-auto px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                        Deactivate Account
                    </button>

                    <!-- Modal -->
                    <div id="popup-modal" tabindex="-1" class="mt-72 hidden overflow-y-auto overflow-x-hidden absolute z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-gray-800 rounded-lg shadow-sm">
                    
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-medium text-gray-400">
                                        Are you sure you want to deactivate this account?
                                    </h3>
                    
                                    <!-- Confirm and Cancel Buttons -->
                                    <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Yes, deactivate
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                                        No, cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('edit-profile-btn').addEventListener('click', function() {
            const inputs = document.querySelectorAll('#profile-form input');
            inputs.forEach(input => input.disabled = false);
            this.classList.add('hidden');
            document.getElementById('save-profile-btn').classList.remove('hidden');
        });

        document.getElementById('edit-password-btn').addEventListener('click', function() {
            const inputs = document.querySelectorAll('#password-form input');
            inputs.forEach(input => input.disabled = false);
            this.classList.add('hidden');
            document.getElementById('save-password-btn').classList.remove('hidden');
        });

        setTimeout(() => {
            const toast = document.getElementById('toast-simple');
            if (toast) {
                toast.style.display = 'none';
            }
        }, 3000);
    </script>
@endsection