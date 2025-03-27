@extends('layouts.employee')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h4 class="text-center mb-8 text-4xl md:text-5xl font-bold">History</h4>
        
        <div class="rounded-lg overflow-x-auto shadow-lg">
            <table class="w-full text-md text-left rtl:text-right text-gray-500">
                <thead class="text-black bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3"> # </th>
                        <th scope="col" class="px-6 py-3"> Score </th>
                        <th scope="col" class="px-6 py-3"> Status </th>
                        <th scope="col" class="px-6 py-3"> Assessment Date</th>   
                    </tr>
                </thead>
                <tbody class="text-black" id="history-table-body">
                    @if($history->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center font-serif text-gray-600 pt-8 pb-2">
                                <div class="flex flex-col items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#B7B7B7">
                                        <path d="M480-80q-155 0-269-103T82-440h81q15 121 105.5 200.5T480-160q134 0 227-93t93-227q0-134-93-227t-227-93q-86 0-159.5 42.5T204-640h116v80H88q29-140 139-230t253-90q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm112-232L440-464v-216h80v184l128 128-56 56Z"/>
                                    </svg>
                                    No assessment recorded yet.
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($history as $index => $item)
                            @php
                                $color = 'text-green-500';
                                if ($item->score >= 22 && $item->score < 36) {
                                    $color = 'text-orange-500';
                                } elseif ($item->score >= 36) {
                                    $color = 'text-red-500';
                                }
                            @endphp
                            <tr class="border-b border-gray-300"> 
                                <td class="px-6 py-3">{{ $index + 1 }}</td>
                                <td class="font-medium px-6 py-3"><span class="{{ $color }}">{{ $item->score }}</span></td>
                                <td class="px-6 py-3"><span class="{{ $color }}">{{ $item->status }}</span></td>
                                <td class="px-6 py-3">{{ $item->created_at->format('F d, Y') }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>     
            </table>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const itemsPerPage = 8;
            const historyTableBody = document.getElementById('history-table-body');
            const rows = Array.from(historyTableBody.getElementsByTagName('tr'));
            const totalPages = Math.ceil(rows.length / itemsPerPage);
            let currentPage = 1;

            function updateTable() {
                rows.forEach((row, index) => {
                    row.style.display = (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage) ? '' : 'none';
                });

                document.getElementById('prev-page').classList.toggle('pointer-events-none', currentPage === 1);
                document.getElementById('next-page').classList.toggle('pointer-events-none', currentPage === totalPages);
            }

            document.getElementById('prev-page').addEventListener('click', function (e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    updateTable();
                }
            });

            document.getElementById('next-page').addEventListener('click', function (e) {
                e.preventDefault();
                if (currentPage < totalPages) {
                    currentPage++;
                    updateTable();
                }
            });

            updateTable();
        });
    </script>
@endsection