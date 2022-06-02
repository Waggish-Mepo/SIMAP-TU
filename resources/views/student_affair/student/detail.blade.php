@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
@endsection

@section('title', $student['nama'])

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-500">
        <a href="{{route('student.index')}}" class="text-gray-800" href="">Siswa</a>
        <i class="fa-solid fa-chevron-right text-lg text-primary mx-2"></i>
        {{ $student['nama'] }}
    </p>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="employeeTab" data-tabs-toggle="#employeeTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                    id="pegawai-tab" data-tabs-target="#pegawai" type="button" role="tab" aria-controls="pegawai"
                    aria-selected="true">Identitas Siswa</button>
            </li>
        </ul>
    </div>
    <div id="employeeTabContent">
        <div class="p-4 bg-white rounded-md dark:bg-gray-800" id="pegawai" role="tabpanel" aria-labelledby="pegawai-tab">
            <form action="{{route('student.update', $student['id'])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="flex flex-row flex-wrap">
                    <div class="flex-1 px-3">
                        <div class="mb-6">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Joe Mama" value="{{$student['nama']}}">
                        </div>
                        <div class="mb-6">
                            <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NISN</label>
                            <input type="number" id="nisn" name="nisn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$student['nisn']}}">
                        </div>
                        <div class="mb-6">
                            <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIS</label>
                            <input type="number" id="nis" name="nis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$student['nis']}}">
                        </div>
                        <div class="mb-6">
                            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$student['tempat_lahir']}}">
                        </div>
                        <div class="mb-6">
                            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$student['tanggal_lahir']}}">
                        </div>
                        <div class="mb-6">
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                required>
                                <option disabled {{$student['jenis_kelamin'] === null ? 'selected' : ''}} value> -- Pilih Jenis Kelamin -- </option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    @if (Route::currentRouteName() === 'student.edit')
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan
                        </button>
                    @else
                        <a href="{!! route('student.edit', $student['id']) !!}" class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Edit
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script>
        @if (session('success'))
            toast('{{ session('success') }}', 'success');
        @endif

        @if (session('error'))
            toast('{{ session('error') }}', 'danger');
        @endif

        @if (Route::currentRouteName() === 'student.detail')
            $('input').attr('disabled', true);
            $('select').attr('disabled', true);
        @endif

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

@endsection
