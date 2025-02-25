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
<body class="bg-gray-100">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="flex items-center mb-6 text-2xl font-semibold font-serif">
            <img class="w-8 h-8 mr-2" src="{{ asset('EDAMS_logo.png') }}" alt="EDAMS Logo">
            <span class="font-serif">EDAMS</span>    
        </div>

        <div class="w-full bg-white rounded-lg shadow border border-gray-300 md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold text-gray-900">
                    Sign in to your account
                </h1>

                <form action="{{ route('student.authenticate') }}" method="POST">
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
                    </div>
                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10"
                            required>
                        <button type="button" onclick="togglePassword()" class="mt-3.5 absolute top-1/2 right-3 transform -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="#7d7878">
                                <path d="M480-312q70 0 119-49t49-119q0-70-49-119t-119-49q-70 0-119 49t-49 119q0 70 49 119t119 49Zm0-72q-40 0-68-28t-28-68q0-40 28-68t68-28q40 0 68 28t28 68q0 40-28 68t-68 28Zm0 192q-142.6 0-259.8-78.5Q103-349 48-480q55-131 172.2-209.5Q337.4-768 480-768q142.6 0 259.8 78.5Q857-611 912-480q-55 131-172.2 209.5Q622.6-192 480-192Zm0-288Zm0 216q112 0 207-58t146-158q-51-100-146-158t-207-58q-112 0-207 58T127-480q51 100 146 158t207 58Z"/>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="#" class="mt-1 mb-3 ml-auto text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>
                
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"> 
                        Sign in
                    </button>

                    <p class="text-sm font-light text-gray-700 mt-1">
                        Don’t have an account yet? 
                        <a href="signup" class="font-medium text-black hover:underline">Sign up here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';}
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>