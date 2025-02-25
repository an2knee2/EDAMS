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
    <div class="flex justify-center items-center h-screen">
        <div class="container mt-15 p-6 flex justify-center items-center">
            <div class="flex flex-col items-center space-y-4 w-full sm:w-auto">
                <!-- Student Button -->
                <a href="{{ route('student.signin') }}" class="bg-blue-900 text-white py-3 px-6 rounded-3xl w-48 sm:w-60 text-center block">
                    Student
                </a>


                <!-- Employee Button -->
                <div href="signup" class="bg-blue-900 text-white py-3 px-6 rounded-3xl w-48 sm:w-60 text-center">
                    Employee
                </div>

                <!-- Coordinator Button -->
                <div class="bg-blue-900 text-white py-3 px-6 rounded-3xl w-48 sm:w-60 text-center">
                    Coordinator
                </div>
                   
                <!-- Counselor Button -->
                <div class="bg-blue-900 text-white py-3 px-6 rounded-3xl w-48 sm:w-60 text-center">
                    Counselor
                </div>

                <!-- Admin Button -->
                <div class="bg-blue-900 text-white py-3 px-6 rounded-3xl w-48 sm:w-60 text-center">
                    Admin
                </div>
            </div>
        </div>
   </div>
</body>
</html>
