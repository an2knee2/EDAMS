<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDAMS</title>
    <link rel="icon" type="image/png" href="{{ asset('EDAMS_logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="flex flex-col items-center justify-center px-6 py-6">
        <div class="flex items-center mt-8 mb-6 text-2xl font-semibold font-serif">
            <img class="w-8 h-8 mr-2" src="{{ asset('EDAMS_logo.png') }}" alt="EDAMS Logo">
            <span class="font-serif">EDAMS</span>      
        </div>
        <div class="w-full bg-white rounded-lg shadow border border-gray-300 mb-8 md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold text-gray-900">Create an account</h1>
                
                <form method="POST" action="{{ route('student.store') }}" onsubmit="return validateForm()">
                    @csrf
                    
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Account Type</label>
                        <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                            <option value="" disabled selected>Select your role</option>
                            <option value="student">Student</option>
                            <option value="employee">Employee</option>
                            <option value="guidance_coordinator">Guidance Coordinator</option>
                            <option value="guidance_counselor">Guidance Counselor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="example@gmail.com" required>
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10" required>
                        <button type="button" onclick="togglePassword('password')" class="absolute mt-7 inset-y-0 right-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="#7d7878"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                        </button>
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="relative">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10" required>
                        <button type="button" onclick="togglePassword('password_confirmation')" class="absolute mt-7 inset-y-0 right-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="#7d7878"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                        </button>
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-6">Sign up</button>
                    <p class="text-sm font-light text-gray-700 mt-1">
                        Already have an account? 
                        <a href="signin" class="font-medium text-black hover:underline">Sign in here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
    function togglePassword(fieldId) {
        const input = document.getElementById(fieldId);
        input.type = input.type === 'password' ? 'text' : 'password';
    }

    function validateForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;

        if (!email.includes('@') || !email.includes('.')) {
            alert('Please enter a valid email address.');
            return false;
        }

        if (password.length < 8) {
            alert('Password must be at least 8 characters long.');
            return false;
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            return false;
        }

        return true;
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>