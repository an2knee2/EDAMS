<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDAMS</title>
    <link rel="icon" type="image/png" href="EDAMS logo.png">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="flex items-center mb-6 text-2xl font-semibold font-serif">
            <img class="w-8 h-8 mr-2" src="EDAMS logo.png" alt="EDAMS Logo">
            <span class="font-serif">EDAMS</span>    
        </div>

        <div class="w-full bg-white rounded-lg shadow border border-gray-300 md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold text-gray-900">
                    Sign in to your account
                </h1>

                <form class="space-y-4 md:space-y-6" action="#">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="example@gmail.com" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-black rounded bg-slate-200 focus:ring-3 focus:ring-primary-300" required>
                        </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-600">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"> 
                        Sign in
                    </button>

                    <p class="text-sm font-light text-gray-700">
                        Don’t have an account yet? 
                        <a href="signup" class="font-medium text-black hover:underline">Sign up here</a>
                    </p>
                </form>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>