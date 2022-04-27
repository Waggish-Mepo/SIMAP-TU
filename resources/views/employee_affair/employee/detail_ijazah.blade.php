@extends('layout.app')

@section('title', 'Ijazah')

@section('content')
<p class="mb-4 text-2xl font-semibold text-gray-500">
    <a href="{{route('employee.index')}}" class="text-gray-800" href="">Pegawai</a>
    <i class="fa-solid fa-chevron-right text-lg text-primary mx-2"></i>
    <a href="{{route('employee.detail', $ijazah['employee_id'])}}" class="text-gray-800" href="">{{ $ijazah['nama_pegawai'] }}</a>
    <i class="fa-solid fa-chevron-right text-lg text-primary mx-2"></i>
    {{ $ijazah['nomor'] }}
</p>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="employeeTab" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                    id="pegawai-tab" data-tabs-target="#pegawai" type="button" role="tab" aria-controls="pegawai"
                    aria-selected="true">Detail Ijazah</button>
            </li>
        </ul>
    </div>
    <div>
        <div class="p-4 bg-white rounded-md dark:bg-gray-800" id="pegawai" role="tabpanel" aria-labelledby="pegawai-tab">
            <form>
                @csrf
                <div class="flex flex-row flex-wrap">
                    <div class="flex-1 px-3">
                        <div class="mb-6">
                            <label for="nomor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor</label>
                            <input disabled type="text" name="nomor" id="nomor"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Joe Mama" value="{{ $ijazah['nomor'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="lampiran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">jurusan</label>
                            <input disabled type="text" id="jurusan" name="jurusan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $ijazah['jurusan'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="nama_sekolah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Sekolah</label>
                            <input disabled type="text" id="nama_sekolah" name="nama_sekolah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $ijazah['nama_sekolah'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="npsn"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">npsn</label>
                            <input disabled type="text" id="npsn" name="npsn"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $ijazah['npsn'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="kabupaten_kota"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kabupaten / Kota</label>
                            <input disabled type="text" id="kabupaten_" name="kabupaten_"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $ijazah['kabupaten_kota'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="provinsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provinsi</label>
                            <input disabled type="text" id="provinsi" name="provinsi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $ijazah['provinsi'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="nama_ortu"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Orang Tua</label>
                            <input disabled type="text" id="nama_ortu" name="nama_ortu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $ijazah['nama_ortu'] }}">
                        </div>

                        <div class="mb-6">
                            <label for="nis"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIS</label>
                            <input disabled type="number" id="nis" name="nis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $ijazah['nis'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="nisn"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NISN</label>
                            <input disabled type="text" id="nisn" name="nisn"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $ijazah['nisn'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="no_peserta_un"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">No Peserta UN</label>

                             <input disabled type="text" id="no_peserta_un" name="no_peserta_un"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $ijazah['no_peserta_un'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="ijazah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">ijazah</label>
                                <img id="ijazah-img" class="mx-auto" src="{{ asset('storage/'.$ijazah['ijazah'])}}" alt="" srcset="" style="width:20rem;height:15rem">
                        </div>
                        <div class="flex justify-end p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <a href="{{ route('employee.detail', $ijazah['employee_id']) }}" id="btn-add-employee" class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Kembali</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#ijazah-img').click(function(){
                $('#ijazah-img').attr('src', '{{ asset('storage/'.$ijazah['ijazah'])}}');
            });
        });
    </script>
@endsection
