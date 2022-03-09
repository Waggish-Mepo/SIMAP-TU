@extends('layout.app')

@section('title', $activity['nama_kegiatan'])

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-500">
        <a href="{{ route('employee.activity.index') }}" class="text-gray-800" href="">Kegiatan Pegawai</a>
        <i class="fa-solid fa-chevron-right text-lg text-primary mx-2"></i>
        {{ $activity['nama_kegiatan'] }}
    </p>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="employeeTab" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                    id="pegawai-tab" data-tabs-target="#pegawai" type="button" role="tab" aria-controls="pegawai"
                    aria-selected="true">Activity Pegawai</button>
            </li>
        </ul>
    </div>
    <div>
        <div class="p-4 bg-white rounded-md dark:bg-gray-800" id="pegawai" role="tabpanel" aria-labelledby="pegawai-tab">
            <form action="{{ route('employee.activity.update', $activity['id']) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="flex flex-row flex-wrap">
                    <div class="flex-1 px-3">
                        <div class="mb-6">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                                Lengkap</label>
                            <input type="text" name="nama" id="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Joe Mama" value="{{ $activity['nama_pegawai'] }}" disabled>
                        </div>
                        <div class="mb-6">
                            <label for="nama_kegiatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                                Kegiatan</label>
                            <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $activity['nama_kegiatan'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="tgl_kegiatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal
                                Kegiatan</label>
                            <input type="date" id="tgl_kegiatan" name="tgl_kegiatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $activity['tgl_kegiatan'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="kategori"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kategori</label>
                            <select id="kategori" name="kategori"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                required>
                                <option disabled selected value="{{ $activity['kategori'] }}">
                                    {{ $activity['kategori'] }}</option>
                                @foreach (config('constant.employee_activity.kategori') as $kategori)
                                    <option value="{{ $kategori }}">{{ $kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-end p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button id="btn-add-employee" type="submit"
                                class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Simpan</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
