@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
@endsection

@section('title', 'Kunjungan')

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-800">
        Kunjungan
    </p>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="jadwalTab" data-tabs-toggle="#jadwalTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                    id="jadwal-tab" data-tabs-target="#jadwal" type="button" role="tab" aria-controls="jadwal"
                    aria-selected="true">Jadwal Kunjungan</button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                    id="arsip-tab" data-tabs-target="#arsip" type="button" role="tab" aria-controls="arsip"
                    aria-selected="false">Arsip Kunjungan</button>
            </li>
        </ul>
    </div>
    <div id="jadwalTabContent">
        <div class="rounded-lg" id="jadwal" role="tabpanel"
            aria-labelledby="jadwal-tab">
            <div class="grid justify-items-end mb-4">
                <div class="flex flex-row">
                    @if ($user->role === 'ADMIN')
                        {{-- <a href="{{route('')}}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="fa-solid fa-file-export mr-2"></i>
                            Export
                        </a> --}}
                        <button type="button" data-modal-toggle="modal-add-visit" class="text-white bg-primary opacity-90 hover:bg-blue-900 focus:ring-4 focus:ring-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-primary dark:hover:bg-blue-900 dark:focus:ring-blue-700">
                            <i class="fa-solid fa-user-plus mr-2"></i>
                            Tambah Data Kunjungan
                        </button>
                    @endif
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="table-jadwal" class="min-w-full border-separate table-spacing">
                                <thead class="bg-primary dark:bg-primary">
                                    <tr>
                                        <th scope="col"
                                            class="rounded-l-lg py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            #
                                        </th>
                                            <th scope="col"
                                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                                No Surat
                                            </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Perihal
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Tanggal Kunjungan
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Jumlah Peserta
                                        </th>
                                            <th scope="col"
                                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                                Status
                                            </th>
                                            <th scope="col"
                                                class="rounded-r-lg py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                                Aksi
                                            </th>
                                    </tr>
                                </thead>
                                <tbody id="render-jadwal"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden rounded-lg" id="arsip" role="tabpanel" aria-labelledby="arsip-tab">
            <div class="grid justify-items-end mb-4">
                <div class="flex flex-row">
                    {{-- @if ($user->role === 'ADMIN')
                        <a href="{{route('')}}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="fa-solid fa-file-export mr-2"></i>
                            Export
                        </a>
                    @endif --}}
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="table-arsip" class="min-w-full border-separate table-spacing">
                                <thead class="bg-primary dark:bg-primary">
                                    <tr>
                                        <th scope="col"
                                            class="rounded-l-lg py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            #
                                        </th>
                                            <th scope="col"
                                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                                No Surat
                                            </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Perihal
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Tanggal Kunjungan
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Jumlah Peserta
                                        </th>
                                            <th scope="col"
                                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                                Status
                                            </th>
                                            <th scope="col"
                                                class="rounded-r-lg py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                                Aksi
                                            </th>
                                    </tr>
                                </thead>
                                <tbody id="render-arsip"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($user->role === 'ADMIN')

        @include('visit.modal._add_visit')
    @endif

@endsection

@section('script')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script>
        const role = '{{$user->role}}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        getUsers();

        function getUsers() {
            let url = `{{ url('/visit-letter/database/visits') }}`

            $.ajax({
                type: "get",
                url: url,
                beforeSend: function () {
                    html = `
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                        <td class="rounded-lg py-6 px-6 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="${role === 'ADMIN' ? 8 : 5}">
                            <svg role="status" class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                            </svg>
                            Sedang mengambil data...
                        </td>
                    </tr>
                    `;
                    $("#render-jadwal").html(html);
                    $("#render-arsip").html(html);
                },
                success: function (response) {
                    console.log(response);
                    renderTables(response, 'jadwal');
                    renderTables(response, 'arsip');
                },
                error: function (error) {
                    html = `
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                        <td class="rounded-lg py-6 px-6 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="${role === 'ADMIN' ? 8 : 5}">
                            Gagal memanggil data! Error: ${error}
                        </td>
                    </tr>
                    `;
                    $("#render-jadwal").html(html);
                    $("#render-arsip").html(html);
                }
            });
        }

        function renderTables(data, id) {
            let html = ``;
            data = id === 'arsip' ? data['archives'] : data['visits'];

            if (data.length < 1) {
                html += `
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                        <td class="rounded-lg py-6 px-6 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="${role === 'ADMIN' ? 8 : 5}">
                            Tidak dapat menemukan data untuk ${id}
                        </td>
                    </tr>
                `
                return $(`#render-${id}`).html(html);
            }
            $.each(data, function (key, data) {
            let deleteRoute = `{{route('visit_letter.delete', 'visitId')}}`.replace('visitId', data.id)
            html +=`<tr
                    class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                    <td
                        class="rounded-l-lg py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ${key + 1}
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div class="whitespace-normal w-46">
                            ${data.no_surat}
                        </div>
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        ${data.perihal}
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div class="whitespace-normal w-24">
                            ${data.tanggal}
                        </div>
                    </td>
                    <td class= "py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div class="whitespace-normal w-24">
                            ${data.jumlah_peserta}
                        </div>
                    </td>
                    `
            if (role === 'ADMIN'){
                html += `
                        <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                            ${data.status}
                        </td>
                        <td class="rounded-r-lg py-6 px-6 text-sm text-center font-medium flex-nowrap">
                            <div class="inline-flex" role="group">
                                <a href="{!! URL::to('/visit-letter/${data.id}/detail') !!}" class="text-white bg-primary opacity-90 hover:bg-blue-900 focus:ring-4 focus:ring-blue-700 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-primary dark:hover:bg-blue-900 dark:focus:ring-blue-700">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{!! URL::to('/visit-letter/${data.id}/detail') !!}" class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form
                                    action="${deleteRoute}"
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
                    `
            }
            html += `</tr>`
            });
            $(`#render-${id}`).html(html);
            $(`#table-${id}`).DataTable();
            $(`#table-${id}`).removeClass('dataTable');
        }


    </script>
@endsection
