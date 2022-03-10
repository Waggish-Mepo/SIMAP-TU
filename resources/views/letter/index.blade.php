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
                        <tbody>
                            @foreach($letters as $letter)
                                <tr
                                    class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                                    <td
                                        class="rounded-l-lg py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td
                                        class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $letter['no_surat'] }}
                                    </td>
                                    <td
                                        class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $letter['perihal'] }}
                                    </td>
                                    @if (Route::currentRouteName() === 'letter.in.index')
                                    <td
                                        class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $letter['pengirim'] }}
                                    </td>
                                    @endif
                                    <td
                                        class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $letter['tgl_surat'] }}
                                    </td>
                                    @if (Route::currentRouteName() === 'letter.in.index')
                                        <td
                                            class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $letter['tgl_terima'] }}
                                        </td>
                                    @endif
                                    <td
                                        class="text-center py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">
                                            {{ $letter['sifat'] }}
                                        </span>
                                    </td>
                                    <td
                                        class="text-center py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $letter['lampiran'] }}
                                    </td>
                                    <td
                                        class="rounded-r-lg py-6 px-6 text-sm text-center font-medium flex-nowrap">
                                        <div class="inline-flex" role="group">
                                            <button type="button"
                                                @if (Route::currentRouteName() === 'letter.in.index')
                                                onclick="btnEditLetter('{{ $letter['id'] }}', '{{ $letter['no_surat'] }}', '{{ $letter['tgl_surat'] }}', '{{ $letter['perihal'] }}', '{{ $letter['sifat'] }}', '{{ $letter['lampiran']}}', '{{ $letter['pengirim'] }}', '{{ $letter['tgl_terima'] }}')"
                                                @else
                                                onclick="btnEditLetter('{{ $letter['id'] }}', '{{ $letter['no_surat'] }}', '{{ $letter['tgl_surat'] }}', '{{ $letter['perihal'] }}', '{{ $letter['sifat'] }}', '{{ $letter['lampiran']}}', '{{ $letter['pengirim'] }}', '{{ $letter['tgl_terima'] }}')"
                                                @endif
                                                data-modal-toggle="modal-edit-letter"
                                                class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </b>
                                            <form
                                                action="{{ route('letter.delete', $letter['id']) }}"
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

        $(document).ready(function () {
            $('#table-letter').DataTable();
            $('#table-letter').removeClass('dataTable');
        });

        function btnEditLetter(id, no_surat, tgl_surat, perihal, sifat, lampiran, pengirim, tgl_terima) {
            const jenis = '{{ Route::currentRouteName() === 'letter.in.index' ? 'Surat Masuk' : 'Surat Keluar' }}';
            tgl_surat = new Date(tgl_surat).toISOString().substring(0, 10);
            $(`#modal-edit-letter #sifat option`).attr('selected', false);

            $('#modal-edit-letter #no-surat').val(no_surat);
            $('#modal-edit-letter #tgl-surat').val(tgl_surat);
            $('#modal-edit-letter #perihal').val(perihal);
            $(`#modal-edit-letter #sifat option[value=${sifat}]`).attr('selected', 'selected');
            $('#modal-edit-letter #lampiran').val(lampiran);
            if (jenis) {
                tgl_terima = new Date(tgl_terima).toISOString().substring(0, 10);
                $('#modal-edit-letter #pengirim').val(pengirim);
                $('#modal-edit-letter #tgl-terima').val(tgl_terima);
            }
            const updateRoute = `{{route('letter.update', 'letterId')}}`.replace('letterId', id);
            $('#modal-edit-letter form').attr('action', updateRoute);
        }
    </script>
@endsection
