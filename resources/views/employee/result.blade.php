@extends('layouts.employee')

@section('content')

@php
    $status = session('status');
    $score = session('score');
    $color = 'text-red-500'; // Default for Severe Anxiety
    $message = "It's advisable to seek professional help or talk to someone you trust immediately.";

    if ($status == 'Moderate Anxiety') {
        $color = 'text-orange-500';
        $message = "Consider some relaxation techniques or talking it out with someone.";
    } elseif ($status == 'Low Anxiety') {
        $color = 'text-green-500';
        $message = "You're in a good place but remember to maintain your self-care routines.";
    }
@endphp

<div class="flex justify-center items-center mt-32 h-full w-full">
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 text-center">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">SCORE</h5>
        <p class="mb-2 text-2xl font-bold tracking-tight {{ $color }}">
            {{ $score }}
        </p>
        <p class="font-normal text-gray-700 text-justify">
            You are experiencing <strong>{{ $status }}</strong>. {{ $message }}
        </p>
        <a href="{{ route('employee.assessment') }}" class="mt-4 inline-block px-6 py-2 text-sm font-medium leading-6 text-center text-white bg-blue-500 hover:bg-blue-600 rounded-full shadow-sm">
            Back to Assessment
        </a>
    </div>
</div>

@endsection
