@extends('layouts.employee')

@section('content')

@if(session('success'))
    <div id="toast-simple" class="z-50 mt-16 absolute top-4 left-1/2 transform -translate-x-1/2 flex items-center mx-4 max-w-xs p-4 text-gray-500 bg-slate-300 rounded-lg shadow-sm whitespace-nowrap" role="alert">
        <svg class="w-5 h-5 text-blue-600 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"/>
        </svg>
        <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
    </div>
@endif

<div class="container mx-auto">
    <div id="default-carousel" class="relative w-full h-96" data-carousel="slide">
        <!-- Slide -->
        <div class="relative h-96 overflow-hidden rounded-lg">
            <div class="hidden duration-2000 ease-in-out" data-carousel-item>
                <img src="{{ asset('slide1.png') }}" class="absolute block w-full h-full object-cover sm:-translate-x-1/2 sm:-translate-y-1/2 sm:top-1/2 sm:left-1/2" alt="...">
            </div>
            <div class="hidden duration-2000 ease-in-out" data-carousel-item>
                <img src="{{ asset('slide2.png') }}" class="absolute block w-full h-full object-cover sm:-translate-x-1/2 sm:-translate-y-1/2 sm:top-1/2 sm:left-1/2" alt="...">
            </div>
            <div class="hidden duration-2000 ease-in-out" data-carousel-item>
                <img src="{{ asset('slide3.png') }}" class="absolute block w-full h-full object-cover sm:-translate-x-1/2 sm:-translate-y-1/2 sm:top-1/2 sm:left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-2 sm:px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-transparent/30 group-hover:bg-transparent/50 group-focus:ring-4 group-focus:ring-transparent group-focus:outline-none">
                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-500 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-2 sm:px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-transparent/30 group-hover:bg-transparent/50 group-focus:ring-4 group-focus:ring-transparent group-focus:outline-none">
                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-500 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4 w-full">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#ff0000">
                <path d="M490.83-345.67q67.5 0 114.5-43.05t47-104.28q0-53.67-34.55-91.5T534-622.33q-43.67 0-74.5 28.33t-30.83 69.07q0 17.6 6.83 34.26 6.83 16.67 20.17 31l48.33-47q-4.33-3-6.5-7.5t-2.17-9.83q0-13 10.34-21.83 10.33-8.84 28.33-8.84 22 0 37.33 17.84Q586.67-519 586.67-492q0 33.79-27.17 57.23-27.17 23.44-67.5 23.44-49.8 0-84.23-39.67-34.44-39.67-34.44-97.72 0-30.61 11.34-58.11 11.33-27.5 32.66-48.84l-47.66-47.66q-30.67 29.66-47.34 69.52-16.66 39.85-16.66 83.6 0 85.54 54 145.04 54.01 59.5 131.16 59.5ZM240-80v-172q-57-52-88.5-121.5T120-520q0-150 105-255t255-105q125 0 221.5 73.5T827-615l54 213.67q4.33 15.66-5.67 28.5-10 12.83-26.66 12.83H760v133.33q0 27.5-19.58 47.09Q720.83-160 693.33-160H600v80h-66.67v-146.67h160v-200h112l-42.66-171.66q-23.67-95-102.67-155t-180-60q-122 0-207.67 84.66-85.66 84.67-85.66 206.36 0 62.95 25.71 119.6Q238.1-346.06 285.33-302l21.34 20v202H240Zm256-366.67Z"/>
            </svg>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Having a Severe Anxiety?</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 text-justify">Seek professional support and consider therapy or counseling for effective management.</p>
            <p class="font-normal text-gray-700 text-justify">Remember, seeking help is a sign of strength, not weakness.</p>
        </div>
        
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#F19E39">
                <path d="M490.83-345.67q67.5 0 114.5-43.05t47-104.28q0-53.67-34.55-91.5T534-622.33q-43.67 0-74.5 28.33t-30.83 69.07q0 17.6 6.83 34.26 6.83 16.67 20.17 31l48.33-47q-4.33-3-6.5-7.5t-2.17-9.83q0-13 10.34-21.83 10.33-8.84 28.33-8.84 22 0 37.33 17.84Q586.67-519 586.67-492q0 33.79-27.17 57.23-27.17 23.44-67.5 23.44-49.8 0-84.23-39.67-34.44-39.67-34.44-97.72 0-30.61 11.34-58.11 11.33-27.5 32.66-48.84l-47.66-47.66q-30.67 29.66-47.34 69.52-16.66 39.85-16.66 83.6 0 85.54 54 145.04 54.01 59.5 131.16 59.5ZM240-80v-172q-57-52-88.5-121.5T120-520q0-150 105-255t255-105q125 0 221.5 73.5T827-615l54 213.67q4.33 15.66-5.67 28.5-10 12.83-26.66 12.83H760v133.33q0 27.5-19.58 47.09Q720.83-160 693.33-160H600v80h-66.67v-146.67h160v-200h112l-42.66-171.66q-23.67-95-102.67-155t-180-60q-122 0-207.67 84.66-85.66 84.67-85.66 206.36 0 62.95 25.71 119.6Q238.1-346.06 285.33-302l21.34 20v202H240Zm256-366.67Z"/>
            </svg>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Having a Moderate Anxiety?</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 text-justify">Engage in regular physical activity and structured relaxation techniques to reduce stress.</p>
            <p class="font-normal text-gray-700 text-justify">Consistency in these activities can significantly improve your mental health.</p>
        </div>

        <div class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#00ff00">
                <path d="M490.83-345.67q67.5 0 114.5-43.05t47-104.28q0-53.67-34.55-91.5T534-622.33q-43.67 0-74.5 28.33t-30.83 69.07q0 17.6 6.83 34.26 6.83 16.67 20.17 31l48.33-47q-4.33-3-6.5-7.5t-2.17-9.83q0-13 10.34-21.83 10.33-8.84 28.33-8.84 22 0 37.33 17.84Q586.67-519 586.67-492q0 33.79-27.17 57.23-27.17 23.44-67.5 23.44-49.8 0-84.23-39.67-34.44-39.67-34.44-97.72 0-30.61 11.34-58.11 11.33-27.5 32.66-48.84l-47.66-47.66q-30.67 29.66-47.34 69.52-16.66 39.85-16.66 83.6 0 85.54 54 145.04 54.01 59.5 131.16 59.5ZM240-80v-172q-57-52-88.5-121.5T120-520q0-150 105-255t255-105q125 0 221.5 73.5T827-615l54 213.67q4.33 15.66-5.67 28.5-10 12.83-26.66 12.83H760v133.33q0 27.5-19.58 47.09Q720.83-160 693.33-160H600v80h-66.67v-146.67h160v-200h112l-42.66-171.66q-23.67-95-102.67-155t-180-60q-122 0-207.67 84.66-85.66 84.67-85.66 206.36 0 62.95 25.71 119.6Q238.1-346.06 285.33-302l21.34 20v202H240Zm256-366.67Z"/>
            </svg>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Having a Low Anxiety?</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 text-justify">Practice deep breathing and mindfulness daily to maintain emotional balance.</p>
            <p class="font-normal text-gray-700 text-justify">These practices can help you stay grounded and focused.</p>
        </div>
    </div>
</div> 

<div class="w-full mt-4 p-2 text-center bg-gray-300 border border-gray-200 rounded-lg shadow-sm sm:p-8">
    <h5 class="mb-2 text-3xl font-bold text-gray-900">Need Counseling?</h5>
    <p class="mb-5 text-base text-gray-700 sm:text-lg">Feel free to reach out to us through our official Facebook page or visit us in person at the 2nd Floor, Student Center, BiPSU Main Campus, Naval, Biliran. We are open from Monday to Friday, 7:30am to 5:00pm. We’re here to help!</p>
    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
        <a href="https://www.facebook.com/PSSBIPSUGuidanceOffice" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 50 50" fill="white" >
                <path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"></path>
            </svg>
            <div class="text-left rtl:text-right">
                <div class="-mt-1 ml-1 font-sans text-sm ">Our FB Page</div>
            </div>
        </a>
        <a href="https://maps.app.goo.gl/9GNVQEJDYJShHRs96" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>
            <div class="text-left rtl:text-right">
                <div class="-mt-1 ml-1 font-sans text-sm ">Our Location</div>
            </div>
        </a>
    </div>
</div>

<script>
    setTimeout(() => {
    document.getElementById('toast-simple').style.display = 'none';
    }, 3000);
</script>
 
@endsection

