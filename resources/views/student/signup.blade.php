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
                        <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                        <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="e.g. Juan M. Dela Cruz" required>
                    </div>
                    <div>
                        <label for="school" class="block mb-2 text-sm font-medium text-gray-900">School</label>
                        <select name="school_id" id="school" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                            <option value="" disabled selected>Select School</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="program" class="block mb-2 text-sm font-medium text-gray-900">Program</label>
                        <select name="program_id" id="program" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                            <option value="" disabled selected>Select Program</option>
                        </select>
                    </div>
                    <div>
                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900">Contact Number</label>
                        <input type="contact" name="contact" id="contact" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="09xxxxxxxxx" required>
                            @error('contact')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="example@gmail.com" required>
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                            @error('password')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    </div>
                    <div class="flex items-center justify-between mt-4 mb-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-black rounded bg-slate-200 focus:ring-3 focus:ring-primary-300" required>
                                <label for="terms" class="ml-2 text-sm font-light text-gray-600">I accept the <a onclick="openModal()" class="font-medium text-black hover:underline cursor-pointer">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6">Sign up</button>
                    <p class="text-sm font-light text-gray-700">
                        Already have an account? 
                        <a href="signin" class="font-medium text-black hover:underline">Sign in here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div id="static-modal" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50 transition-opacity duration-300 ease-in-out opacity-0 invisible">
        <div class="relative p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Terms and Conditions</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-900" aria-label="Close modal">
                    <span aria-hidden="true">✕</span>
                </button>
            </div>
            <div class="p-4 space-y-4 max-h-96 overflow-y-auto">
                <p class="text-base text-gray-500">By registering for and using the Early Detection of Anxiety Monitoring System (EDAMS), you agree to the collection, use, and protection of your anxiety-related data as described below.</p>
                <p class="text-base text-gray-500">We collect your anxiety self-assessment results and related information to monitor and assess anxiety levels among students and employees. This data helps guidance coordinators identify individuals who may need support and provide timely assistance. The system gathers responses from anxiety self-assessments.</p>
                <p class="text-base text-gray-500">Your data will be used solely for assessing and monitoring anxiety trends, providing guidance counselors with insights to offer appropriate support, and generating reports to help improve mental health services. We implement strict security measures to protect your data from unauthorized access, ensuring that only authorized guidance counselors and system administrators can access your information.</p>
                <p class="text-base text-gray-500">Your data will not be shared with third parties without your consent, except when required by law or in cases where there is a serious risk of harm to yourself or others.</p>
                <p class="text-base text-gray-500">By clicking "Agree" and proceeding with registration, you confirm that you understand and accept these terms.</p>
            </div>
            <div class="flex justify-end p-4 border-t border-gray-200">
                <button onclick="acceptTerms()" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">I Accept</button>
                <button onclick="closeModal()" class="ml-3 text-sm font-medium text-gray-900 bg-gray-100 hover:bg-gray-200 px-5 py-2.5 rounded-lg">Decline</button>
            </div>
        </div>
    </div>
    
    <script>    
    function openModal() {
        const modal = document.getElementById('static-modal');
        modal.classList.remove('invisible', 'opacity-0');
        modal.classList.add('opacity-100', 'visible');
    }

    function closeModal() {
        const modal = document.getElementById('static-modal');
        modal.classList.remove('opacity-100', 'visible');
        modal.classList.add('opacity-0', 'invisible');
    }

    function acceptTerms() {
        const termsCheckbox = document.getElementById('terms');
        termsCheckbox.checked = true;
    }

    function validateForm() {

    const contact = document.getElementById('contact').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;
    const termsChecked = document.getElementById('terms').checked;

    const contactRegex = /^\d{11}$/;
    if (!contactRegex.test(contact)) {
        alert('Contact number must be exactly 11 digits.');
        return false;
    }

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

    if (!termsChecked) {
        alert('You must accept the Terms and Conditions to proceed.');
        return false;
    }

    return true;
    }
    </script>

    <script>
        document.getElementById('school').addEventListener('change', function() {
            const schoolId = this.value;
            fetch("{{ route('schools.programs') }}?school_id=" + schoolId)
                .then(response => response.json())
                .then(programs => {
                    const programSelect = document.getElementById('program');
                    programSelect.innerHTML = '<option value="" disabled selected>Select Program</option>';
                    if (programs.length === 0) {
                        programSelect.innerHTML += '<option disabled>No programs available</option>';
                    } else {
                        programs.forEach(program => {
                            programSelect.innerHTML += `<option value="${program.id}">${program.program_name}</option>`;
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching programs:', error);
                });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>