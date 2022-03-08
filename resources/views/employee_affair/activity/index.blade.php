@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Kegiatan Pegawai')

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-800">
        Kegiatan Pegawai
    </p>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="employeeTab" data-tabs-toggle="#employeeTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                    id="employee-tab" data-tabs-target="#employee" type="button" role="tab" aria-controls="employee"
                    aria-selected="true">Data Kegiatan</button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                    id="pribadi-tab" data-tabs-target="#pribadi" type="button" role="tab" aria-controls="pribadi"
                    aria-selected="false">Pribadi</button>
            </li>
        </ul>
    </div>
    <div id="employeeTabContent">
        <div class="rounded-lg" id="employee" role="tabpanel" aria-labelledby="employee-tab">
            <div class="grid justify-items-end mb-4">
                <div class="flex flex-row">
                    @if ($user->role === 'ADMIN')
                        <button type="button" data-modal-toggle="modal-add-activity"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="fa-solid fa-user-plus mr-2"></i>
                            Tambah Kegiatan
                        </button>
                    @endif
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="table-employee" class="min-w-full border-separate table-spacing">
                                <thead class="bg-primary dark:bg-primary">
                                    <tr>
                                        <th scope="col"
                                            class="rounded-l-lg py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Nama Lengkap
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Nama Kegiatan
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Tanggal Kegiatan
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Kategori
                                        </th>
                                        @if ($user->role === 'ADMIN')
                                            <th scope="col"
                                                class="rounded-r-lg py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                                Aksi
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody id="render-employee">
                                    @foreach ($activities['employees'] as $activity)
                                        <tr
                                            class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">

                                            <td
                                                class="rounded-l-lg py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td
                                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $activity['nama_pegawai'] }}
                                            </td>
                                            <td
                                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $activity['nama_kegiatan'] }}
                                            </td>
                                            <td
                                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $activity['tgl_kegiatan'] }}
                                            </td>
                                            <td
                                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $activity['kategori'] }}
                                            </td>
                                            @if ($user->role == 'ADMIN')
                                                <td
                                                    class="rounded-r-lg py-6 px-6 text-sm text-center font-medium flex-nowrap">
                                                    <div class="inline-flex" role="group">
                                                        <a href="/employee/activity/{{ $activity['id'] }}/edit"
                                                            class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('employee.activity.delete', $activity['id']) }}"
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
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden rounded-lg" id="pribadi" role="tabpanel" aria-labelledby="pribadi-tab">
            <div class="grid justify-items-end mb-4">
                <div class="flex flex-row">
                    <button type="button" data-modal-toggle="modal-add-activity"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <i class="fa-solid fa-user-plus mr-2"></i>
                        Tambah Kegiatan
                    </button>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="table-pribadi" class="min-w-full border-separate table-spacing">
                                <thead class="bg-primary dark:bg-primary">
                                    <tr>
                                        <th scope="col"
                                            class="rounded-l-lg py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            #
                                        </th>

                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Nama Lengkap
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Nama Kegiatan
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Tanggal Kegiatan
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Kategori
                                        </th>
                                        <th scope="col"
                                            class="rounded-r-lg py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="render-pribadi">
                                    @foreach ($activities['pribadi'] as $activity)
                                        <tr
                                            class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                                            <td
                                                class="rounded-l-lg py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td
                                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $user->name }}
                                            </td>
                                            <td
                                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $activity['nama_kegiatan'] }}
                                            </td>
                                            <td
                                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $activity['tgl_kegiatan'] }}
                                            </td>
                                            <td
                                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $activity['kategori'] }}
                                            </td>
                                            <td class="rounded-r-lg py-6 px-6 text-sm text-center font-medium flex-nowrap">
                                                <div class="inline-flex" role="group">
                                                    <a href="/employee/activity/{{ $activity['id'] }}/edit"
                                                        class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('employee.activity.delete', $activity['id']) }}"
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('employee_affair.modal._add_activity')

@endsection

@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        @if (session('success'))
            toast('{{ session('success') }}', 'success');
        @endif

        @if (session('error'))
            toast('{{ session('error') }}', 'danger');
        @endif

        const role = '{{ $user->role }}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        getActivity();

        function getActivity() {
            let url = `{{ url('/employee/activity/database/activity') }}`

            $.ajax({
                type: "get",
                url: url,
                success: function(response) {
                    console.log(response);
                    renderTables(response['employees'], 'employee');
                    renderTables(response['pribadi'], 'employee');
                },
            });
        }

        function renderTables() {
            $(`#table-employee`).DataTable();
            $(`#table-employee`).removeClass('dataTable');
            $(`#table-pribadi`).DataTable();
            $(`#table-pribadi`).removeClass('dataTable');
        }
    </script>
@endsection
