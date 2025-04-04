@extends('layouts.admin')

@section('content')
<section class="p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl relative">
        @if(session('success'))
            <div id="toast-success" class="absolute inset-x-0 top-6 mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-slate-200 rounded-lg shadow-sm z-50" role="alert">
                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-slate-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif
        <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search Admin</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Admin
                    </button>

                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow-sm">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Create New Admin
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>

                                <form class="p-4 md:p-5" method="POST" action="{{ route('admin.admin_account.store') }}">
                                    @csrf
                                    <div>
                                        <label for="id_number" class="block mb-1 text-sm font-medium text-gray-900">ID Number</label>
                                        <input type="text" name="id_number" id="id_number" class="mb-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter ID Number" required>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                                        <div>
                                            <label for="first_name" class="block mb-1 text-sm font-medium text-gray-900">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter First Name" required>
                                        </div>
                                        <div>
                                            <label for="middle_name" class="block mb-1 text-sm font-medium text-gray-900">Middle Name</label>
                                            <input type="text" name="middle_name" id="middle_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter Middle Name">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                                        <div>
                                            <label for="last_name" class="block mb-1 text-sm font-medium text-gray-900">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter Last Name" required>
                                        </div>
                                        <div>
                                            <label for="ext_name" class="block mb-1 text-sm font-medium text-gray-900">Extension Name (e.g. Jr., Sr.)</label>
                                            <input type="text" name="ext_name" id="ext_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter Extension Name">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="email" class="block mb-1 text-sm font-medium text-gray-900">Email Address</label>
                                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter Email Address" required>
                                    </div>
                                    <div>
                                        <label for="password" class="block mt-2 mb-1 text-sm font-medium text-gray-900">Password</label>
                                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter Password" required>
                                    </div>
                                    <div>
                                        <label for="confirm_password" class="block mt-2 mb-1 text-sm font-medium text-gray-900">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Confirm Password" required>
                                    </div>

                                    <div class="flex justify-end mt-6">
                                        <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center focus:ring-4 focus:outline-none focus:ring-blue-300 max-w-md">
                                            <svg class="me-1 -ms-1 w-5 h-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Add Admin
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3 w-full md:w-auto">
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow">
                            <h6 class="mb-3 text-sm font-medium text-gray-900">Choose Filter</h6>
                            <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                <li class="flex items-center">
                                    <input id="apple" type="checkbox" value="" class="filter-checkbox w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900">Activated</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value="" class="filter-checkbox w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900">Disabled</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                @if(isset($admins) && count($admins) > 0)
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-900 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="px-4 py-3">#</th>
                            <th scope="col" class="px-4 py-3">ID Number</th>
                            <th scope="col" class="px-4 py-3">Admin Name</th>
                            <th scope="col" class="px-4 py-3">Email Address</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="admin-table-body">
                        @foreach($admins as $index => $admin)
                        <tr class="border-b">
                            <td scope="row" class="px-4 py-3 text-gray-700 whitespace-nowrap">{{ $index + 1 }}.</td>
                            <th class="px-4 py-3 font-medium text-gray-700 whitespace-nowrap">{{ $admin->id_number }}</th>
                            <td class="px-4 py-3 text-gray-700 whitespace-nowrap">
                                {{ $admin->first_name }} 
                                @if($admin->middle_name) {{ strtoupper(substr($admin->middle_name, 0, 1)) }}.@endif 
                                {{ $admin->last_name }} 
                                @if($admin->ext_name) , {{ $admin->ext_name }}@endif
                            </td>
                            <td class="px-4 py-3 text-gray-700 whitespace-nowrap">{{ $admin->email }}</td>
                            <td class="px-4 py-3 text-gray-700 whitespace-nowrap status-column-{{ $admin->id }}">
                                <div class="flex items-center">
                                    <span class="h-3 w-3 rounded-full mr-2 
                                        {{ $admin->status == 'Activated' ? 'bg-green-500' : 'bg-red-500' }}">
                                    </span>
                                    <span class="status-text">{{ $admin->status }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button id="dropdown-button-{{ $admin->id }}" data-dropdown-toggle="dropdown-{{ $admin->id }}" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none" type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="dropdown-{{ $admin->id }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdown-button-{{ $admin->id }}">
                                        <li>
                                            <a class="py-2 px-4 hover:bg-gray-100 flex items-center" onclick="updateStatus('{{ $admin->id }}', 'Activated')">
                                                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                Activate
                                            </a>
                                        </li>
                                        <li>
                                            <a class="py-2 px-4 hover:bg-gray-100 flex items-center" onclick="updateStatus('{{ $admin->id }}', 'Disabled')">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#434343" class="inline mr-2">
                                                    <path d="m339-288 141-141 141 141 51-51-141-141 141-141-51-51-141 141-141-141-51 51 141 141-141 141 51 51ZM480-96q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/>
                                                </svg>
                                                Disable
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="no-admins-message" class="text-center font-serif text-gray-600 mt-6 hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#B7B7B7" class="mx-auto mb-2">
                        <path d="M280-80q-83 0-141.5-58.5T80-280q0-83 58.5-141.5T280-480q83 0 141.5 58.5T480-280q0 83-58.5 141.5T280-80Zm544-40L568-376q-12-13-25.5-26.5T516-428q38-24 61-64t23-88q0-75-52.5-127.5T420-760q-75 0-127.5 52.5T240-580q0 6 .5 11.5T242-557q-18 2-39.5 8T164-535q-2-11-3-22t-1-23q0-109 75.5-184.5T420-840q109 0 184.5 75.5T680-580q0 43-13.5 81.5T629-428l251 252-56 56Z"/>
                    </svg>
                    No admins found.
                </div>
                                
                @else(isset($admins) && count($admins) == 0)
                    <div class="text-center font-serif text-gray-600 mt-6">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#B7B7B7" class="mx-auto mb-2">
                            <path d="M608-522 422-708q14-6 28.5-9t29.5-3q59 0 99.5 40.5T620-580q0 15-3 29.5t-9 28.5ZM234-276q51-39 114-61.5T480-360q18 0 34.5 1.5T549-354l-88-88q-47-6-80.5-39.5T341-562L227-676q-32 41-49.5 90.5T160-480q0 59 19.5 111t54.5 93Zm498-8q32-41 50-90.5T800-480q0-133-93.5-226.5T480-800q-56 0-105.5 18T284-732l448 448ZM480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-60Z"/>
                        </svg>
                        No admin accounts added yet.
                    </div>
            @endif
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
    document.addEventListener('DOMContentLoaded', function() {
        const toastSuccess = document.getElementById('toast-success');
        if (toastSuccess) {
            setTimeout(() => {
                toastSuccess.style.display = 'none';
            }, 3000);
        }
    });

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

<script>
    function updateStatus(adminId, status) {
        fetch("{{ url('/admin/admin-accounts') }}/" + adminId + "/status", {
            method: "PATCH",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({ status: status }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector('.status-column-' + adminId + ' .status-text').innerText = data.new_status;
                let indicator = document.querySelector('.status-column-' + adminId + ' span');
                indicator.classList.remove('bg-green-500', 'bg-red-500');
                indicator.classList.add(data.new_status === 'Activated' ? 'bg-green-500' : 'bg-red-500');

                alert(data.message);
            } else {
                alert("Failed to update status.");
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>

<script>
    document.getElementById('simple-search').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        filterTable(searchTerm);
    });

    document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            filterTable(document.getElementById('simple-search').value.toLowerCase());
        });
    });

    function filterTable(searchTerm) {
        const activatedChecked = document.getElementById('apple').checked;
        const disabledChecked = document.getElementById('fitbit').checked;

        let hasVisibleRows = false;
        document.querySelectorAll('#admin-table-body tr').forEach(row => {
            const adminName = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const status = row.querySelector('.status-text').innerText;

            const matchesSearch = adminName.includes(searchTerm);
            const matchesFilter = (activatedChecked && status === 'Activated') || (disabledChecked && status === 'Disabled') || (!activatedChecked && !disabledChecked);

            if (matchesSearch && matchesFilter) {
                row.style.display = '';
                hasVisibleRows = true;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('no-admins-message').style.display = hasVisibleRows ? 'none' : 'block';
    }

    let currentPage = 1;
    const rowsPerPage = 8;

    function paginateTable() {
        const rows = document.querySelectorAll('#admin-table-body tr');
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
        const rows = document.querySelectorAll('#admin-table-body tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            paginateTable();
        }
    });

    paginateTable();
</script>

@endsection