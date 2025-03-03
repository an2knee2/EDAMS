@extends('layouts.admin')

@section('content')
<section class="p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl">
        <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search School" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0 mr-4">
                    <button type="button" data-modal-target="school-modal" data-modal-toggle="school-modal" class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add School
                    </button>

                    <div id="school-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow-sm">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Add School
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="school-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <form class="p-4 md:p-5" method="POST" action="{{ route('admin.school.store') }}">
                                    @csrf
                                    <div>
                                        <label for="school_name" class="block mb-1 text-sm font-medium text-gray-900">School Name</label>
                                        <input type="text" name="school_name" id="school_name" class="mb-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter School Name" required>
                                    </div>
                                    <div>
                                        <label for="abbreviation" class="block mt-2 mb-1 text-sm font-medium text-gray-900">Abbreviation</label>
                                        <input type="text" name="abbreviation" id="abbreviation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter Abbreviation" required>
                                    </div>
                                    <div class="flex justify-end mt-6">
                                        <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center focus:ring-4 focus:outline-none focus:ring-blue-300 max-w-md">
                                            Add School
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-900 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="px-4 py-3">#</th>
                            <th scope="col" class="px-4 py-3">School Name</th>
                            <th scope="col" class="px-4 py-3">School Abbreviation</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="school-table-body">
                        @foreach($schools as $index => $school)
                            <tr class="border-b">
                                <td scope="row" class="px-4 py-3 text-gray-700 whitespace-nowrap">{{ $index + 1 }}.</td>
                                <td class="px-4 py-3 text-gray-700 whitespace-nowrap">{{ $school->school_name }}</td>
                                <td class="px-4 py-3 text-gray-700 whitespace-nowrap">{{ $school->abbreviation }}</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="editation-dropdown-button-{{ $school->id }}" data-dropdown-toggle="editation-dropdown-{{ $school->id }}" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="editation-dropdown-{{ $school->id }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="editation-dropdown-button-{{ $school->id }}">
                                            <li>
                                                <a href="#" data-modal-target="edit-school-modal-{{ $school->id }}" data-modal-toggle="edit-school-modal-{{ $school->id }}" class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#" data-modal-target="delete-school-modal-{{ $school->id }}" data-modal-toggle="delete-school-modal-{{ $school->id }}" class="block py-2 px-4 hover:bg-gray-100">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit School Modal -->
                            <div id="edit-school-modal-{{ $school->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow-sm">
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                            <h3 class="text-xl font-semibold text-gray-900">
                                                Edit School
                                            </h3>
                                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-school-modal-{{ $school->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <div class="p-4 md:p-5">
                                            <form class="space-y-4" method="POST" action="{{ route('admin.school.update', $school->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="school_name" class="block mb-2 text-sm font-medium text-gray-900">School Name</label>
                                                    <input type="text" name="school_name" id="school_name" value="{{ $school->school_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter School Name" required />
                                                </div>
                                                <div>
                                                    <label for="abbreviation" class="block mb-2 text-sm font-medium text-gray-900">Abbreviation</label>
                                                    <input type="text" name="abbreviation" id="abbreviation" value="{{ $school->abbreviation }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Abbreviation" required />
                                                </div>
                                                <button type="submit" class="w-full mt-6 mb-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Update School
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete School Modal -->
                            <div id="delete-school-modal-{{ $school->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow-sm">
                                        <div class="p-4 md:p-5 text-center bg-gray-800 rounded-lg">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this school?</h3>
                                            <form method="POST" action="{{ route('admin.school.destroy', $school->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Yes, I'm sure
                                                </button>
                                                <button type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100" data-modal-hide="delete-school-modal-{{ $school->id }}">
                                                    No, cancel
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <div id="no-schools-message" class="text-center font-serif text-gray-600 mt-6 hidden">No School Found</div>
            </div>
            <div class="flex py-4 justify-end mr-4">
                <a id="prev-page" class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 pointer-events-none">
                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                    Previous
                </a>
                <a id="next-page" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 pointer-events-none">
                    Next
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('simple-search').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        let hasVisibleRows = false;
        document.querySelectorAll('#school-table-body tr').forEach(row => {
            const schoolName = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
            if (schoolName.includes(searchTerm)) {
                row.style.display = '';
                hasVisibleRows = true;
            } else {
                row.style.display = 'none';
            }
        });
        document.getElementById('no-schools-message').style.display = hasVisibleRows ? 'none' : 'block';
    });

    let currentPage = 1;
    const rowsPerPage = 8;

    function paginateTable() {
        const rows = document.querySelectorAll('#school-table-body tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);

        rows.forEach((row, index) => {
            row.style.display = (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) ? '' : 'none';
        });

        document.getElementById('prev-page').classList.toggle('pointer-events-none', currentPage === 1);
        document.getElementById('next-page').classList.toggle('pointer-events-none', currentPage === totalPages);
    }

    document.getElementById('prev-page').addEventListener('click', function(event) {
        event.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            paginateTable();
        }
    });

    document.getElementById('next-page').addEventListener('click', function(event) {
        event.preventDefault();
        const rows = document.querySelectorAll('#school-table-body tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            paginateTable();
        }
    });

    paginateTable();
</script>

@endsection