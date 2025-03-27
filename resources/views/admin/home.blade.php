@extends('layouts.admin')

@section('content')

@if(session('success'))
    <div id="toast-simple" class="mt-16 absolute top-4 left-1/2 transform -translate-x-1/2 flex items-center mx-4 max-w-xs p-4 text-gray-500 bg-slate-300 rounded-lg shadow-sm" role="alert">
        <svg class="w-5 h-5 text-blue-600 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"/>
        </svg>
        <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
   <!-- Severe Anxiety Card -->
   <div class="bg-[#7D0A0A] text-white p-4 md:p-6 rounded-2xl shadow-lg flex flex-col">
       <div class="flex items-center space-x-3">
           <img src="{{ asset('icon3.png') }}" alt="Icon" class="w-10 h-10">
           <div>
               <h2 class="text-lg font-bold">Severe</h2>
               <p class="text-sm">Total Anxiety Cases</p>
           </div>
       </div>
       <p class="text-3xl font-bold mt-4">{{ $severeCount }}</p>
   </div>

   <!-- Moderate Anxiety Card -->
   <div class="bg-[#FFA725] text-white p-4 md:p-6 rounded-2xl shadow-lg flex flex-col">
       <div class="flex items-center space-x-3">
           <img src="{{ asset('icon2.png') }}" alt="Icon" class="w-10 h-10">
           <div>
               <h2 class="text-lg font-bold">Moderate</h2>
               <p class="text-sm">Total Anxiety Cases</p>
           </div>
       </div>
       <p class="text-3xl font-bold mt-4">{{ $moderateCount }}</p>
   </div>

   <!-- Low Anxiety Card -->
   <div class="bg-[#0D4715] text-white p-4 md:p-6 rounded-2xl shadow-lg flex flex-col">
       <div class="flex items-center space-x-3">
           <img src="{{ asset('icon1.png') }}" alt="Icon" class="w-10 h-10">
           <div>
               <h2 class="text-lg font-bold">Low</h2>
               <p class="text-sm">Total Anxiety Cases</p>
           </div>
       </div>
       <p class="text-3xl font-bold mt-4">{{ $lowCount }}</p>
   </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
   <!-- First Chart -->
   <div class="w-full bg-slate-100 rounded-lg shadow-lg p-2 md:p-4">
      <div class="flex justify-between pb-4 mb-4 border-b border-slate-100">
         <div class="flex items-center">
            <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center me-3">
               <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                  <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                  <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
               </svg>
            </div>
            <div>
               <h5 class="leading-none text-2xl font-bold text-gray-900 pb-1">{{ $totalAnxietyCount }}</h5>
               <p class="text-sm font-normal text-gray-500">Total number of users with anxiety</p>
            </div>
         </div>
         <div>
            <button id="dropdownMenuIconButton0" data-dropdown-toggle="dropdownDots0" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-slate-100 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
               <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                  <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
               </svg>
            </button>
   
            <div id="dropdownDots0" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
               <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton">
                  <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">This week</a>
                  </li>
                  <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">Last week</a>
                  </li>
                  <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">Last Month</a>
                  </li>
                  <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">Last Year</a>
                  </li>
               </ul>
               <div class="py-2">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Custom Date</a>
               </div>
            </div>
         </div>
      </div>

      <div class="py-6" id="pie-chart"></div>
         <div class="grid grid-cols-1 items-center pt-5 border-gray-200 border-t justify-between"></div>
      </div>
 
   <!-- Second Chart -->
   <div class="w-full bg-slate-100 rounded-lg shadow-lg p-2 md:p-4">
      <div class="flex justify-between pb-4 mb-4 border-b border-slate-100">
         <div class="flex items-center">
            <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center me-3">
               <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                  <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                  <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
               </svg>
            </div>
            <div>
               <h5 class="leading-none text-2xl font-bold text-gray-900 pb-1">{{ $totalAnxietyCount }}</h5>
               <p class="text-sm font-normal text-gray-500">Number of students and employees with anxiety per day</p>
            </div>
         </div>
         <div>
            <button id="dropdownMenuIconButton1" data-dropdown-toggle="dropdownDots1" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-slate-100 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
               <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                  <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
               </svg>
            </button>
   
            <div id="dropdownDots1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
               <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton">
                  <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">This week</a>
                  </li>
                  <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">Last week</a>
                  </li>
                  <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">Last Month</a>
                  </li>
                  <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">Last Year</a>
                  </li>
               </ul>
               <div class="py-2">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Custom Date</a>
               </div>
            </div>
         </div>
      </div>

      <div class="" id="column-chart"></div>
   </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
   <!-- Severe Anxiety Line Graph -->
   <div class="bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
      <div class="flex justify-between">
         <div>
            <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Severe Anxiety</h5>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
         </div>
         <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
            12%
            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
            </svg>
         </div>
      </div>
      <div id="severe-anxiety-chart"></div>
   </div>

   <!-- Moderate Anxiety Line Graph -->
   <div class="bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
      <div class="flex justify-between">
         <div>
            <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Moderate Anxiety</h5>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
         </div>
         <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
            8%
            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
            </svg>
         </div>
      </div>
      <div id="moderate-anxiety-chart"></div>
   </div>

   <!-- Low Anxiety Line Graph -->
   <div class="bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
      <div class="flex justify-between">
         <div>
            <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Low Anxiety</h5>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
         </div>
         <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
            5%
            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
            </svg>
         </div>
      </div>
      <div id="low-anxiety-chart"></div>
   </div>
</div>

<script> //For Piechart
   const pieChartData = @json($pieChartData);

   const getChartOptions = () => {
      return {
         series: [pieChartData.low, pieChartData.moderate, pieChartData.severe],
         colors: ["#0D4715", "#FFA725", "#7D0A0A"],
         chart: {
            height: 420,
            width: "100%",
            type: "pie",
         },
         labels: ["Low Anxiety", "Moderate Anxiety", "Severe Anxiety"],
         dataLabels: {
            enabled: true,
            style: {
               fontFamily: "Inter, sans-serif",
            },
         },
         legend: {
            position: "bottom",
            fontFamily: "Inter, sans-serif",
         },
      };
   };

   if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
      chart.render();
   }
</script>

<script> // For Bar Chart
const dailyCounts = @json($dailyCounts);

const options = {
    colors: ["#1A56DB", "#FDBA8C"],
    series: [
        {
            name: "Students",
            data: Object.entries(dailyCounts.students).map(([date, count]) => ({ x: date, y: count })),
        },
        {
            name: "Employees",
            data: Object.entries(dailyCounts.employees).map(([date, count]) => ({ x: date, y: count })),
        },
    ],
    chart: {
        type: "bar",
        height: "453px",
        fontFamily: "Inter, sans-serif",
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "70%",
            borderRadiusApplication: "end",
            borderRadius: 8,
        },
    },
    tooltip: {
        shared: true,
        intersect: false,
        custom: function({ series, seriesIndex, dataPointIndex, w }) {
            const students = series[0][dataPointIndex] || 0;
            const employees = series[1][dataPointIndex] || 0;
            const total = students + employees;
            const date = w.globals.labels[dataPointIndex];
            return `
                <div class="p-2 bg-white shadow rounded">
                    <strong>${date}</strong><br>
                    Students: ${students}<br>
                    Employees: ${employees}<br>
                    <strong>Total: ${total}</strong>
                </div>
            `;
        },
    },
    states: {
        hover: {
            filter: {
                type: "darken",
                value: 1,
            },
        },
    },
    stroke: {
        show: true,
        width: 0,
        colors: ["transparent"],
    },
    grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
            left: 2,
            right: 2,
            top: -14,
        },
    },
    dataLabels: {
        enabled: false,
    },
    legend: {
        show: true,
    },
    xaxis: {
        type: "category",
        labels: {
            show: true,
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass: "text-xs font-normal fill-gray-500",
            },
        },
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
    yaxis: {
        show: true,
    },
    fill: {
        opacity: 1,
    },
};

if (document.getElementById("column-chart") && typeof ApexCharts !== "undefined") {
    const chart = new ApexCharts(document.getElementById("column-chart"), options);
    chart.render();
}
</script>

<script> //Severe Anxiety Line Graph
   const options = {
   chart: {
      height: "100%",
      maxWidth: "100%",
      type: "area",
      fontFamily: "Inter, sans-serif",
      dropShadow: {
         enabled: false,
      },
      toolbar: {
         show: false,
      },
   },
   tooltip: {
      enabled: true,
      x: {
         show: false,
      },
   },
   fill: {
      type: "gradient",
      gradient: {
         opacityFrom: 0.55,
         opacityTo: 0,
         shade: "#1C64F2",
         gradientToColors: ["#1C64F2"],
      },
   },
   dataLabels: {
      enabled: false,
   },
   stroke: {
      width: 6,
   },
   grid: {
      show: false,
      strokeDashArray: 4,
      padding: {
         left: 2,
         right: 2,
         top: 0
      },
   },
   series: [
      {
         name: "New users",
         data: [6500, 6418, 6456, 6526, 6356, 6456],
         color: "#1A56DB",
      },
   ],
   xaxis: {
      categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
      labels: {
         show: false,
      },
      axisBorder: {
         show: false,
      },
      axisTicks: {
         show: false,
      },
   },
   yaxis: {
      show: false,
   },
   }

   if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
   const chart = new ApexCharts(document.getElementById("area-chart"), options);
   chart.render();
}
</script>

<script> //Moderate Anxiety Line Graph
   const options = {
   chart: {
      height: "100%",
      maxWidth: "100%",
      type: "area",
      fontFamily: "Inter, sans-serif",
      dropShadow: {
         enabled: false,
      },
      toolbar: {
         show: false,
      },
   },
   tooltip: {
      enabled: true,
      x: {
         show: false,
      },
   },
   fill: {
      type: "gradient",
      gradient: {
         opacityFrom: 0.55,
         opacityTo: 0,
         shade: "#1C64F2",
         gradientToColors: ["#1C64F2"],
      },
   },
   dataLabels: {
      enabled: false,
   },
   stroke: {
      width: 6,
   },
   grid: {
      show: false,
      strokeDashArray: 4,
      padding: {
         left: 2,
         right: 2,
         top: 0
      },
   },
   series: [
      {
         name: "New users",
         data: [6500, 6418, 6456, 6526, 6356, 6456],
         color: "#1A56DB",
      },
   ],
   xaxis: {
      categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
      labels: {
         show: false,
      },
      axisBorder: {
         show: false,
      },
      axisTicks: {
         show: false,
      },
   },
   yaxis: {
      show: false,
   },
   }

   if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
   const chart = new ApexCharts(document.getElementById("area-chart"), options);
   chart.render();
}
</script>

<script> //Low Anxiety Line Graph
   const options = {
   chart: {
      height: "100%",
      maxWidth: "100%",
      type: "area",
      fontFamily: "Inter, sans-serif",
      dropShadow: {
         enabled: false,
      },
      toolbar: {
         show: false,
      },
   },
   tooltip: {
      enabled: true,
      x: {
         show: false,
      },
   },
   fill: {
      type: "gradient",
      gradient: {
         opacityFrom: 0.55,
         opacityTo: 0,
         shade: "#1C64F2",
         gradientToColors: ["#1C64F2"],
      },
   },
   dataLabels: {
      enabled: false,
   },
   stroke: {
      width: 6,
   },
   grid: {
      show: false,
      strokeDashArray: 4,
      padding: {
         left: 2,
         right: 2,
         top: 0
      },
   },
   series: [
      {
         name: "New users",
         data: [6500, 6418, 6456, 6526, 6356, 6456],
         color: "#1A56DB",
      },
   ],
   xaxis: {
      categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
      labels: {
         show: false,
      },
      axisBorder: {
         show: false,
      },
      axisTicks: {
         show: false,
      },
   },
   yaxis: {
      show: false,
   },
   }

   if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
   const chart = new ApexCharts(document.getElementById("area-chart"), options);
   chart.render();
}
</script>

<script> // Severe Anxiety Line Graph
const severeAnxietyOptions = {
   chart: {
      type: "area",
      height: "100%",
      fontFamily: "Inter, sans-serif",
      toolbar: { show: false },
   },
   series: [{ name: "Severe Anxiety", data: [6500, 6418, 6456, 6526, 6356, 6456] }],
   xaxis: { categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'] },
   fill: { type: "gradient", gradient: { opacityFrom: 0.55, opacityTo: 0 } },
   stroke: { width: 6 },
};
if (document.getElementById("severe-anxiety-chart")) {
   new ApexCharts(document.getElementById("severe-anxiety-chart"), severeAnxietyOptions).render();
}
</script>

<script> // Moderate Anxiety Line Graph
const moderateAnxietyOptions = {
   chart: {
      type: "area",
      height: "100%",
      fontFamily: "Inter, sans-serif",
      toolbar: { show: false },
   },
   series: [{ name: "Moderate Anxiety", data: [5500, 5418, 5456, 5526, 5356, 5456] }],
   xaxis: { categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'] },
   fill: { type: "gradient", gradient: { opacityFrom: 0.55, opacityTo: 0 } },
   stroke: { width: 6 },
};
if (document.getElementById("moderate-anxiety-chart")) {
   new ApexCharts(document.getElementById("moderate-anxiety-chart"), moderateAnxietyOptions).render();
}
</script>

<script> // Low Anxiety Line Graph
const lowAnxietyOptions = {
   chart: {
      type: "area",
      height: "100%",
      fontFamily: "Inter, sans-serif",
      toolbar: { show: false },
   },
   series: [{ name: "Low Anxiety", data: [4500, 4418, 4456, 4526, 4356, 4456] }],
   xaxis: { categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'] },
   fill: { type: "gradient", gradient: { opacityFrom: 0.55, opacityTo: 0 } },
   stroke: { width: 6 },
};
if (document.getElementById("low-anxiety-chart")) {
   new ApexCharts(document.getElementById("low-anxiety-chart"), lowAnxietyOptions).render();
}
</script>

<script>
   setTimeout(() => {
       document.getElementById('toast-simple').style.display = 'none';
          }, 3000);
</script>
@endsection
