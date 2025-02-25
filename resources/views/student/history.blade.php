@extends('layouts.student')

@section('content')
    <div class="container mx-auto mt-20 px-4 sm:px-6 lg:px-8">
        <h4 class="text-center mt-16 mb-8 text-4xl md:text-5xl font-bold">History</h4>
        
        <div class="overflow-x-auto">
            <!-- Table to display the history of assessments -->
            <table class="table-auto border-collapse w-full bg-white text-left shadow-md mb-8 min-w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <!-- Table Headers -->
                        <th class="py-2 px-4 text-left border-b">Assessment Number</th>
                        <th class="py-2 px-4 text-left border-b">Status</th>
                        <th class="py-2 px-4 text-left border-b">Assessment Date</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class="border-b text-left py-2 px-4"> 1 </td>
                            <td class="border-b text-left py-2 px-4"> Severe </td>
                            <td class="border-b text-left py-2 px-4"> February 15, 2024 </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection