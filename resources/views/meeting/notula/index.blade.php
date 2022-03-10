@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Notula')

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-800">
        Notula
    </p>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="employeeTab" data-tabs-toggle="#employeeTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block px-4 py-2 text-sm font-medium text-center text-gray-500 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                    id="employee-tab" data-tabs-target="#employee" type="button" role="tab" aria-controls="employee"
                    aria-selected="true">Daftar Notula</button>
            </li>

        </ul>
    </div>
    <div id="meetingTabContent">
        <div class="rounded-lg" id="employee" role="tabpanel" aria-labelledby="employee-tab">

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="table-employee" class="min-w-full border-separate table-spacing">
                                <thead class="bg-primary dark:bg-primary">
                                    <tr>
                                    <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase rounded-l-lg dark:text-gray-400">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Pimpinan Rapat
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Materi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Notulis
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400 ">
                                            Presensi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-center text-white uppercase rounded-r-lg dark:text-gray-400">
                                            Aksi
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="render-employee">
                                <tr
                                            class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                                            <td
                                                class="px-6 py-6 text-sm font-medium text-gray-900 rounded-l-lg whitespace-nowrap dark:text-white">
                                                1
                                            </td>
                                            <td
                                                class="px-6 py-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                1
                                            </td>
                                            <td
                                                class="px-6 py-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                2
                                            </td>
                                            <td
                                                class="px-6 py-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                asd
                                            </td>
                                            <td
                                                class="px-6 py-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                asd
                                            </td>
                                            <td
                                                class="px-6 py-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                asd
                                            </td>


                                                <td
                                                    class="px-6 py-6 text-sm font-medium text-center rounded-r-lg flex-nowrap">
                                                    <div class="inline-flex" role="group">
                                                        <a href="{{ route('meeting.notula.detail') }}"
                                                            class="text-white bg-indigo-700 opacity-90 hover:bg-indigo-900 focus:ring-4 focus:ring-indigo-400 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                                            <i class="fa-solid fa-magnifying-glass"></i>&nbsp;Detail
                                                        </a>

                                                    </div>
                                                </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
