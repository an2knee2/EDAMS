@extends('layouts.admin')

@section('content')
    <main class="px-10 py-5 mx-auto my-0 bg-white max-w-[1440px] max-md:p-4">

        <header class="mb-10">
            <h1 class=" -mt-4 mb-3.5 text-4xl font-bold text-black max-sm:text-3xl">
                Settings
            </h1>
            <p class="-mt-4 mb-5 text-base text-black">Manage your account setting.</p>
            <hr class="border-t border-black" />
        </header>

        <div class="space-y-8">
            <!-- Card 1: Profile Information -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Profile Information</h2>
                <form class="space-y-4" id="profile-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Enter first name" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Middle Name</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Enter middle name" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Enter last name" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Extension Name</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Jr., Sr., etc." disabled>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Enter email address" disabled>
                        </div>
                    </div>
                    <button type="button" id="edit-profile-btn" class="mt-4 w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Edit Profile
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Change Password</h2>
                <form class="space-y-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                            <div class="relative">
                                <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Enter current password">
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <div class="relative">
                                <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Enter new password">
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <div class="mt-2 space-y-1">
                                <p class="text-xs text-gray-500">Password must contain:</p>
                                <p class="text-xs text-gray-500">- At least 8 characters</p>
                                <p class="text-xs text-gray-500">- Upper & lowercase letters</p>
                                <p class="text-xs text-gray-500">- Numbers and special characters</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                            <div class="relative">
                                <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Confirm new password">
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Update Password
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Deactivate Account</h2>
                <div class="space-y-4">
                    <p class="text-gray-600">Deactivating your account will temporarily disable your profile, making it inaccessible to others. Your data will be retained, allowing you to reactivate your account at any time by simply logging back in.</p>
                    
                    <button type="button" class="w-full md:w-auto px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                        Deactivate Account
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('edit-profile-btn').addEventListener('click', function() {
            const inputs = document.querySelectorAll('#profile-form input');
            if (this.textContent === 'Edit Profile') {
                inputs.forEach(input => input.disabled = false);
                this.textContent = 'Save Changes';
            } else {
                inputs.forEach(input => input.disabled = true);
                this.textContent = 'Edit Profile';
                // Optionally, you can add form submission logic here
                // document.getElementById('profile-form').submit();
            }
        });
    </script>
@endsection