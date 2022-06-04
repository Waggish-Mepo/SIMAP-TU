@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <p class="mb-8 text-2xl font-semibold text-gray-800">
        Dashboard
    </p>

    <div class="flex flex-row justify-between flex-wrap space-x-3 space-y-5">
        <div class="flex justify-between pl-6 pt-6 max-w-3xl bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 mb-5">
            <div>
                <p class="font-normal text-gray-700 dark:text-gray-400">Selamat datang kembali,</p>
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$user->name}}!</h5>
            </div>
            <img class="max-w-md" src="{{asset('img/svg/vector-user-dashboard.svg')}}" alt="" srcset="">
        </div>

        <div class="!mt-0 !ml-0 !mb-5">
            <p class="mb-2 text-xl text-gray-800">
                Kepegawaian
            </p>

            <div class="flex flex-wrap space-x-3 h-5/6">
                <div class="block p-6 text-center w-56 h-full bg-orang rounded-lg border border-orange-300 shadow-md hover:bg-orange-400 dark:bg-orang dark:border-orang-700 dark:hover:bg-orang-700">
                    <h5 class="mb-2 text-2xl font-regular tracking-tight text-white dark:text-white">Total Pegawai</h5>
                    <h5 class="mt-6 mb-6 p-3 rounded-md bg-orange-300 text-6xl font-bold tracking-tight text-gray-100 dark:text-white">{{$users['employees']}}</h5>
                </div>
                <div class="block p-6 text-center w-56 h-full bg-reb rounded-lg border border-red-300 shadow-md hover:bg-red-600 dark:bg-reb dark:border-red-700 dark:hover:bg-red-700">
                    <h5 class="mb-2 text-2xl font-regular tracking-tight text-white dark:text-white">Total Guru</h5>
                    <h5 class="mt-6 mb-6 p-3 rounded-md bg-red-400 text-6xl font-bold tracking-tight text-gray-100 dark:text-white">{{$users['teachers']}}</h5>
                </div>
                <div class="block p-6 text-center w-56 h-full bg-green-500 rounded-lg border border-green-300 shadow-md hover:bg-green-600 dark:bg-green-700 dark:border-green-700 dark:hover:bg-green-700">
                    <h5 class="mb-2 text-2xl font-regular tracking-tight text-white dark:text-white">Total Staf</h5>
                    <h5 class="mt-6 p-3 rounded-md bg-green-400 mb-6 text-6xl font-bold tracking-tight text-gray-100 dark:text-white">{{$users['staffs']}}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <p class="mb-3 text-xl text-gray-800">
            Surat Menyurat
        </p>

        <p class="mb-3 text-l text-gray-500">
            Laporan Surat Bulan Ini
        </p>

        <div class="flex flex-wrap space-x-1">
            <div class="p-4 max-w-3xl w-36 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 mb-5">
                <div>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Surat Masuk</p>
                </div>
                <h5 class="text-right text-3xl">{{$letters[0]}}</h5>
            </div>
            <div class="p-4 max-w-3xl w-36 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 mb-5">
                <div>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Surat Keluar</p>
                </div>
                <h5 class="text-right text-3xl">{{$letters[1]}}</h5>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
