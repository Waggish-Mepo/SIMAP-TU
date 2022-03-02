@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<!-- <p>Headmaster & Employee Dashboard</p> -->
<Container>
<div class="container w-full mx-auto">


<div class="w-full px-4 mb-16 leading-normal text-gray-800 md:px-0 md:mt-8">
        <!-- <hr class="mx-4 my-8 border-b-2 border-gray-600"> -->

<div class="flex flex-row flex-wrap flex-grow mt-2">
    <div class="w-full h-full p-3 md:w-1/2">
        <!--Graph Card-->
        <div class="bg-white rounded shadow ">

            <div class="p-5">
                <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                <script >
                    new Chart(document.getElementById("chartjs-0"), {
                        "type": "line",
                        "data": {

                            "datasets": [{
                                "label": "Views",
                                "data": [65, 59, 80, 81, 56, 55, 40],
                                "fill": false,
                                "borderColor": "rgb(75, 192, 192)",
                                "lineTension": 0.2
                            }]
                        },
                        "options": {}
                    });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <div class="flex justify-end w-full p-3 md:w-1/2 xl:w-1/2">
        <!--Graph Card-->
        <div class="w-9/12 h-full bg-white border rounded shadow">
            <div class="p-3 ">
                <h5 class="font-bold text-gray-600 uppercase">Traffic</h5>
            </div>
            <div class=""><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    new Chart(document.getElementById("chartjs-4"), {
                        "type": "doughnut",
                        "data": {
                            "labels": ["Guru", "Staff",],
                            "datasets": [{
                                "label": "Issues",
                                "data": [50, 50,],
                                "backgroundColor": ["rgb(200, 67, 97)", "rgb(171, 205, 203)",]
                            }]
                        }
                    });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>
			<!--Console Content-->

			<div class="flex flex-wrap items-start justify-around w-full">
                <div class="flex flex-wrap w-full xl:justify-between md:justify-around">
                <div class="w-full p-3 md:w-1/2 xl:w-1/2 xl:h-full ">
                    <!--Metric Card-->
                    <div class="p-2 bg-red-400 border shadow-lg rounded-xl xl:w-full md:w-full">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="p-3 bg-red-400"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="text-right md:text-center xl:ml-28">
                                <h5 class="font-bold text-center text-white uppercase">Total Guru</h5>
                                <h3 class="text-lg font-semibold text-center text-white textbg-gray-600">249 <span class="text-pink-500"></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>



                <div class="w-full p-3 md:w-1/2 xl:w-1/2 ">
                    <!--Metric Card-->
                    <div class="p-2 bg-blue-200 border border-blue-200 shadow-lg rounded-xl xl:w-full md:w-full">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="p-3 bg-blue-200 rounded"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="text-right md:text-center xl:ml-28">
                                <h5 class="font-bold text-center text-white uppercase">Total Staff</h5>
                                <h3 class="text-lg font-bold text-center text-white">249 <span class="text-pink-500"></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                </div>

                <div class="w-full p-3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded ">
                        <div class="p-2 text-gray-800 uppercase border-gray-300 ">
                            <h2 class="font-bold text-center text-gray-600 uppercase">Jumlah Kunjungan</h2>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-1"), {
                                    "type": "bar",
                                    "data": {
                                        "labels": ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                                        "datasets": [{
                                            "data": [65, 59, 80, 81, 56, 55, 40, 30, 40, 20, 50,55],
                                            "fill": false,
                                            "backgroundColor": ["rgb(31, 57, 134)", "rgb(31, 57, 134)","rgb(31, 57, 134)", "rgb(31, 57, 134)","rgb(31, 57, 134)","rgb(31, 57, 134)","rgb(31, 57, 134)","rgb(31, 57, 134)","rgb(31, 57, 134)","rgb(31, 57, 134)","rgb(31, 57, 134)","rgb(31, 57, 134)"],

                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->

            </div>

			<!--/ Console Content-->

		</div>


	</div>
</div>
    </Container>

@endsection



@section('script')
<script>
    console.log("halo mas")
</script>
@endsection
