@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Rapat')

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-800">
        Rapat
    </p>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="employeeTab" data-tabs-toggle="#employeeTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block px-4 py-2 text-sm font-medium text-center text-gray-500 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                    id="employee-tab" data-tabs-target="#employee" type="button" role="tab" aria-controls="employee"
                    aria-selected="true">Agenda Rapat</button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block px-4 py-2 text-sm font-medium text-center text-gray-500 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                    id="pribadi-tab" data-tabs-target="#pribadi" type="button" role="tab" aria-controls="pribadi"
                    aria-selected="false">Arsip Rapat</button>
            </li>
        </ul>
    </div>
    <div id="meetingTabContent">
        <div class="rounded-lg" id="employee" role="tabpanel" aria-labelledby="employee-tab">
            <div class="grid mb-4 justify-items-end">
                <div class="flex flex-row">
                        <button type="button" data-modal-toggle="modal-add-agenda"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="mr-2 fa-solid fa-chalkboard-user"></i>
                            Tambah rapat
                        </button>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="table-employee" class="min-w-full border-separate table-spacing">
                                <thead class="bg-primary dark:bg-primary">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase rounded-l-lg dark:text-gray-400">
                                            Materi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Pimpinan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Jumlah Hadir
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Waktu
                                        </th>

                                            <th scope="col"
                                                class="px-6 py-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                                Tempat
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                                Status
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
                                                class="px-6 py-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                asd
                                            </td>
                                            <td>
                                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 border rounded"> Selesai</span>
                                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-red-700 border rounded">Belum Selesai</span>
                                            </td>

                                                <td
                                                    class="px-6 py-6 text-sm font-medium text-center rounded-r-lg flex-nowrap">
                                                    <div class="inline-flex" role="group">
                                                        <a href=""
                                                            class="text-white bg-indigo-700 opacity-90 hover:bg-indigo-900 focus:ring-4 focus:ring-indigo-400 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                                            <i class="fa-solid fa-check"></i>
                                                        </a>
                                                        <form
                                                            action=""
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="text-white bg-red-700 opacity-90 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
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
        <div class="hidden rounded-lg" id="pribadi" role="tabpanel" aria-labelledby="pribadi-tab">

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                        <table id="table-employee" class="min-w-full border-separate table-spacing">
                                <thead class="bg-primary dark:bg-primary">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase rounded-l-lg dark:text-gray-400">
                                            Materi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Pimpinan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Jumlah Hadir
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Waktu
                                        </th>

                                            <th scope="col"
                                                class="px-6 py-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                                Tempat
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-6 text-xs font-medium tracking-wider text-center text-white uppercase rounded-r-lg dark:text-gray-400">
                                                Status
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
                                                class="px-6 py-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                asd
                                            </td>
                                            <td>
                                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 border rounded"> Selesai</span>

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

    @include('employee_affair.modal._add_agenda')

@endsection
