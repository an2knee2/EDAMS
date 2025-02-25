@extends('layouts.student')

@section('content')
<div class="container mx-auto mt-20 text-center">
    <h3 class="text-4xl font-bold mb-6">Assessment Result</h3>

    @if(session('success'))
        <div class="bg-green-100 p-6 rounded shadow-md">
            <p class="text-xl mb-4">{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-blue-100 p-6 rounded shadow-md">
        <p class="text-xl mb-4">Total Score: <strong>{{ session('score') }}</strong></p>
        <p class="text-xl mb-4">Anxiety Status: <strong>{{ session('status') }}</strong></p>
    </div>

    <a href="{{ route('student.assessment') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
        Take Another Assessment
    </a>
</div>
@endsection