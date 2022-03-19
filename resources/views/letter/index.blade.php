@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
@endsection

@section('title', Route::currentRouteName() === 'letter.in.index' ? 'Surat Masuk' : 'Surat Keluar')

@section('content')
    <p class="mb-8 text-2xl font-semibold text-gray-800">
        {{Route::currentRouteName() === 'letter.in.index' ? 'Surat Masuk' : 'Surat Keluar'}}
    </p>

    <div class="grid justify-items-end mb-4">
        <div class="flex flex-row">
            <label for="tgl-surats" class="mr-2 block my-auto text-md font-medium text-gray-900 dark:text-gray-400">Filter Tanggal Surat</label>
            <select id="tgl-surats" class="mr-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-32 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled selected value></option>
                @foreach($tgl_surats as $tgl)
                <option value="{{ $tgl }}">{{ $tgl }}</option>
                @endforeach
            </select>
            <a
                href="{{Route::currentRouteName() === 'letter.in.index' ? route('letter.export.in') : route('letter.export.out')}}"')}}"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <i class="fa-solid fa-file-export mr-2"></i>
                Export
            </a>
            <button type="button" data-modal-toggle="modal-add-letter" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <i class="fa-solid fa-user-plus mr-2"></i>
                Tambah {{Route::currentRouteName() === 'letter.in.index' ? 'Surat Masuk' : 'Surat Keluar'}}
            </button>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table id="table-letter" class="min-w-full border-separate table-spacing">
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
                                @if (Route::currentRouteName() === 'letter.in.index')
                                <th scope="col"
                                    class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                    Pengirim
                                </th>
                                @endif
                                <th scope="col"
                                    class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                    Tanggal Surat
                                </th>
                                @if (Route::currentRouteName() === 'letter.in.index')
                                    <th scope="col"
                                        class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                        Tanggal Diterima
                                    </th>
                                @endif
                                <th scope="col"
                                    class="py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                    Sifat
                                </th>
                                <th scope="col"
                                    class="py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                    Lampiran
                                </th>
                                <th scope="col"
                                    class="rounded-r-lg py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="render-letter">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('letter.modal._add_letter')
    @include('letter.modal._edit_letter')
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

        getLetters();

        function getLetters() {
            let url = `{{ Route::currentRouteName() === 'letter.in.index' ? url('/letter/database/letter-ins') : url('/letter/database/letter-outs') }}`

            $.ajax({
                type: "get",
                url: url,
                beforeSend: function () {
                    html = `
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                        <td class="rounded-lg py-6 px-6 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="
                        {{Route::currentRouteName() === 'letter.in.index' ? 9 : 7}}">
                            <svg role="status" class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                            </svg>
                            Sedang mengambil data...
                        </td>
                    </tr>
                    `;
                    $("#render-letter").html(html);
                },
                success: function (response) {
                    console.log(response);
                    renderTables(response);
                },
                error: function (error) {
                    html = `
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                        <td class="rounded-lg py-6 px-6 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="{{Route::currentRouteName() === 'letter.in.index' ? 9 : 7}}">
                            Gagal memanggil data! Error: ${error}
                        </td>
                    </tr>
                    `;
                    $("#render-letter").html(html);
                }
            });
        }

        function renderTables(data) {
            let html = ``;

            if (data.length < 1) {
                html += `
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                        <td class="rounded-lg py-6 px-6 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="{{Route::currentRouteName() === 'letter.in.index' ? 9 : 7}}">
                            Tidak dapat menemukan data surat
                        </td>
                    </tr>
                `
                return $(`#render-letter`).html(html);
            }
            $.each(data, function (key, data) {
            let deleteRoute = "{{ route('letter.delete', 'letterId') }}";
            deleteRoute = deleteRoute.replace("letterId", data.id);
            html += `
                <tr
                    class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                    <td
                        class="rounded-l-lg py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ${key + 1}
                    </td>
                    `
            html += `
                    <td
                        class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        ${data.no_surat}
                    </td>
                    <td
                        class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        ${data.perihal}
                    </td>
                    @if (Route::currentRouteName() === 'letter.in.index')
                    <td
                        class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        ${data.pengirim}
                    </td>
                    @endif
                    <td
                        class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        ${data.tgl_surat}
                    </td>`
                    @if (Route::currentRouteName() === 'letter.in.index')
                    html += `<td
                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                ${data.tgl_terima}
                            </td>`
                    @endif
            html +=`<td
                        class="text-center py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">
                            ${data.sifat}
                        </span>
                    </td>
                    <td
                        class="text-center py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                            ${data.lampiran}
                    </td>
                    <td
                        class="rounded-r-lg py-6 px-6 text-sm text-center font-medium flex-nowrap">
                        <div class="inline-flex" role="group">
                            <button type="button"
                                onclick="btnEditLetter('${data.id}', '${data.no_surat}', '${data.tgl_surat}', '${data.perihal}', '${data.sifat}', '${data.lampiran }', '${data.pengirim}', '${data.tgl_terima}')"
                                data-modal-toggle="modal-edit-letter"
                                class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button id="btn-delete-${data.id}" type="button" onclick="btnDeleteLetter('${data.id}','${deleteRoute}')"
                                class="text-white bg-red-700 opacity-90 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>`;
            });
            $(`#render-letter`).html(html);
            $(`#table-letter`).DataTable();
            $(`#table-letter`).removeClass('dataTable');
        }

        function btnDeleteLetter(id, url) {
            $.ajax({
                type: "delete",
                url: url,
                data: {'id':id},
                beforeSend: function () {
                    $(`#btn-delete-${id}`).html(`
                        <svg role="status" class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                        </svg>
                    `);
                    $(`#btn-delete-${id}`).prop('disabled', true);
                },
                success: function () {
                    $(`#btn-delete-${id}`).html('Ya');
                    $(`#btn-delete-${id}`).prop('disabled', false);

                    getLetters();
                    toast('Sukses mereset password', 'success');
                },
                error: function (error) {
                    $(`#btn-delete-${id}`).html('<i class="fa-solid fa-trash"></i>');
                    $(`#btn-delete-${id}`).prop('disabled', false);

                    toast('Gagal mereset password', 'danger');
                }
            })
        }

        function btnEditLetter(id, no_surat, tgl_surat, perihal, sifat, lampiran, pengirim, tgl_terima) {
            toggleModal('modal-edit-letter', true);

            const jenis = '{{ Route::currentRouteName() === 'letter.in.index' ? 'Surat Masuk' : 'Surat Keluar' }}';
            tgl_surat = tgl_surat.replaceAll("/", "-").split("-").reverse().join("-");
            $(`#modal-edit-letter #sifat option`).attr('selected', false);

            $('#modal-edit-letter #no-surat').val(no_surat);
            $('#modal-edit-letter #tgl-surat').val(tgl_surat);
            $('#modal-edit-letter #perihal').val(perihal);
            $(`#modal-edit-letter #sifat option[value=${sifat}]`).attr('selected', 'selected');
            $('#modal-edit-letter #lampiran').val(lampiran);
            if (jenis) {
                tgl_terima = tgl_terima.replaceAll("/", "-").split("-").reverse().join("-");
                $('#modal-edit-letter #pengirim').val(pengirim);
                $('#modal-edit-letter #tgl-terima').val(tgl_terima);
            }
            const updateRoute = `{{route('letter.update', 'letterId')}}`.replace('letterId', id);
            $('#modal-edit-letter form').attr('action', updateRoute);
        }
    </script>
@endsection
