@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <p class="mb-8 text-2xl font-semibold text-gray-800">
        Dashboard
    </p>

    <div class="flex flex-row flex-wrap justify-between space-x-3 space-y-5">
        <div class="flex justify-between max-w-3xl pt-6 pl-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div>
                <p class="font-normal text-gray-700 dark:text-gray-400">Selamat datang kembali,</p>
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$user->name}}!</h5>
            </div>
            <img class="max-w-md" src="{{asset('img/svg/vector-user-dashboard.svg')}}" alt="" srcset="">
        </div>

        <div class="flex flex-wrap space-x-3">
            <div class="block w-56 p-6 text-center border border-orange-300 rounded-lg shadow-md bg-orang hover:bg-orange-400 dark:bg-orang dark:border-orang-700 dark:hover:bg-orang-700">
                <h5 class="mb-2 text-2xl tracking-tight text-white font-regular dark:text-white">Total Pegawai</h5>
                <h5 class="p-3 mt-6 mb-6 text-6xl font-bold tracking-tight text-gray-100 bg-orange-300 rounded-md dark:text-white">{{$users['employees']}}</h5>
            </div>
            <div class="block w-56 p-6 text-center border border-red-300 rounded-lg shadow-md bg-reb hover:bg-red-600 dark:bg-reb dark:border-red-700 dark:hover:bg-red-700">
                <h5 class="mb-2 text-2xl tracking-tight text-white font-regular dark:text-white">Total Guru</h5>
                <h5 class="p-3 mt-6 mb-6 text-6xl font-bold tracking-tight text-gray-100 bg-red-400 rounded-md dark:text-white">{{$users['teachers']}}</h5>
            </div>
            <div class="block w-56 p-6 text-center bg-green-500 border border-green-300 rounded-lg shadow-md hover:bg-green-600 dark:bg-green-700 dark:border-green-700 dark:hover:bg-green-700">
                <h5 class="mb-2 text-2xl tracking-tight text-white font-regular dark:text-white">Total Staf</h5>
                <h5 class="p-3 mt-6 mb-6 text-6xl font-bold tracking-tight text-gray-100 bg-green-400 rounded-md dark:text-white">{{$users['staffs']}}</h5>
            </div>
        </div>
    </div>
@endsection



@section('script')
<script>
    console.log("halo mas")
</script>
@endsection
