@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
@endsection

@section('title', $employee['nama'])

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-500">
        <a href="{{route('employee.index')}}" class="text-gray-800" href="">Pegawai</a>
        <i class="fa-solid fa-chevron-right text-lg text-primary mx-2"></i>
        {{ $employee['nama'] }}
    </p>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="employeeTab" data-tabs-toggle="#employeeTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                    id="pegawai-tab" data-tabs-target="#pegawai" type="button" role="tab" aria-controls="pegawai"
                    aria-selected="true">Identitas Pegawai</button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                    id="kepegawaian-tab" data-tabs-target="#kepegawaian" type="button" role="tab" aria-controls="kepegawaian"
                    aria-selected="false">Kepegawaian</button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                    id="sertifikat-tab" data-tabs-target="#sertifikat" type="button" role="tab" aria-controls="sertifikat"
                    aria-selected="false">Sertifikat</button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                    id="ijazah-tab" data-tabs-target="#ijazah" type="button" role="tab" aria-controls="ijazah"
                    aria-selected="false">Ijazah</button>
            </li>
        </ul>
    </div>
    <div id="employeeTabContent">
        <div class="p-4 bg-white rounded-md dark:bg-gray-800" id="pegawai" role="tabpanel" aria-labelledby="pegawai-tab">
            <form action="{{route('employee.update', $employee['id'])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="flex flex-row flex-wrap">
                    <div class="flex-1 px-3">
                        <div class="mb-6">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Joe Mama" value="{{$employee['nama']}}">
                        </div>
                        <div class="mb-6">
                            <label for="niy_nigk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIY/NIGK</label>
                            <input type="number" id="niy_nigk" name="niy_nigk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['niy_nigk']}}">
                        </div>
                        <div class="mb-6">
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['alamat']}}">
                        </div>
                    </div>
                    <div class="flex-1 px-3">
                        <div class="mb-6">
                            <label for="status-pegawai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status Pegawai</label>
                            <select id="status-pegawai" name="status_pegawai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                                <option disabled selected value> -- Pilih Status Pegawai -- </option>
                                @foreach (config('constant.employee.status_pegawai') as $status)
                                    <option value="{{$status}}" {{$status === $employee['status_pegawai'] ? 'selected' : ''}}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="jenis-ptk"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Jenis PTK</label>
                            <select id="jenis-ptk" name="jenis_ptk"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                required>
                                <option disabled selected value> -- Pilih Jenis PTK -- </option>
                                @foreach (config('constant.employee.jenis_ptk') as $ptk)
                                    <option value="{{$ptk}}" {{$ptk === $employee['jenis_ptk'] ? 'selected' : ''}}>{{ $ptk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    @if ($user->role === 'ADMIN')
                        <button type="button" onclick="toggleStatus()" class="
                        {{$employee['user']['status'] ? 'bg-red-500 hover:bg-red-700' : 'bg-green-500 hover:bg-green-700'}} btn-toggle-status text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                            {{$employee['user']['status'] ? 'Nonaktifkan Akun' : 'Aktifkan Akun'}}
                        </button>
                    @endif
                    @if (Route::currentRouteName() === 'employee.edit')
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan
                        </button>
                    @else
                        <a href="{!! route('employee.edit', $employee['id']) !!}" class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Edit
                        </a>
                    @endif
                </div>
            </form>
        </div>
        <div class="hidden p-4 bg-white rounded-md dark:bg-gray-800" id="kepegawaian" role="tabpanel" aria-labelledby="kepegawaian-tab">
            <form action="{{route('employee.update', $employee['id'])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="flex flex-row flex-wrap">
                    <div class="flex-auto px-3">
                        <div class="mb-6">
                            <label for="niy_nigk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIY/NIGK</label>
                            <input type="number" id="niy_nigk" name="niy_nigk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['niy_nigk']}}">
                        </div>
                        <div class="mb-6">
                            <label for="nuptk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NUPTK</label>
                            <input type="number" id="nuptk" name="nuptk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['nuptk']}}">
                        </div>
                        <div class="mb-6">
                            <label for="sk_pengangkatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">SK Pengangkatan</label>
                            <input type="number" name="sk_pengangkatan" id="sk_pengangkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['sk_pengangkatan']}}">
                        </div>
                        <div class="mb-6">
                            <label for="lembaga-pengangkatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Lembaga Pengangkatan</label>
                            <select id="lembaga-pengangkatan" name="lembaga_pengangkatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                required>
                                <option disabled {{$employee['lembaga_pengangkatan'] === null ? 'selected' : ''}} value> -- Pilih Lembaga Pengangkatan -- </option>
                                @foreach (config('constant.employee.lembaga_pengangkatan') as $lembaga)
                                    <option value="{{$lembaga}}" {{$lembaga === $employee['lembaga_pengangkatan'] ? 'selected' : ''}}>{{ $lembaga }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="sk-cpns" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">SK CPNS</label>
                            <input type="number" name="sk_cpns" id="sk-cpns" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['sk_cpns']}}">
                        </div>
                        <div class="mb-6">
                            <label for="tmt-pns" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">TMT PNS</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input name="tmt_pns" id="tmt-cpns" datepicker datepicker-format="dd/mm/yyyy" type="text" value="{{$employee['tmt_pns']}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="kartu-suami" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kartu Suami</label>
                            <input type="number" name="kartu_suami" id="kartu-suami" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['kartu_suami']}}">
                        </div>
                        <div class="mb-6">
                            <label for="ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">KTP</label>
                            <input type="number" name="ktp" id="ktp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['ktp']}}">
                        </div>
                    </div>
                    <div class="flex-auto px-3">
                        <div class="mb-6">
                            <label for="status_pegawai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status Pegawai</label>
                            <select id="status_pegawai" name="status_pegawai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                                <option disabled {{$employee['status_pegawai'] === null ? 'selected' : ''}} value> -- Pilih Status Pegawai -- </option>
                                @foreach (config('constant.employee.status_pegawai') as $status)
                                    <option value="{{$status}}" {{$status === $employee['status_pegawai'] ? 'selected' : ''}}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="jenis-ptk"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Jenis PTK</label>
                            <select id="jenis-ptk" name="jenis_ptk"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                required>
                                <option disabled {{$employee['jenis_ptk'] === null ? 'selected' : ''}} value> -- Pilih Jenis PTK -- </option>
                                @foreach (config('constant.employee.jenis_ptk') as $ptk)
                                    <option value="{{$ptk}}" {{$ptk === $employee['jenis_ptk'] ? 'selected' : ''}}>{{ $ptk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIP</label>
                            <input type="number" name="nip" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['nip']}}">
                        </div>
                        <div class="mb-6">
                            <label for="sumber-gaji" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Sumber Gaji</label>
                            <select id="sumber-gaji" name="sumber_gaji"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                required>
                                <option disabled {{$employee['sumber_gaji'] === null ? 'selected' : ''}} value> -- Pilih Sumber Gaji -- </option>
                                @foreach (config('constant.employee.sumber_gaji') as $sumber)
                                    <option value="{{$sumber}}" {{$sumber === $employee['sumber_gaji'] ? 'selected' : ''}}>{{ $sumber }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="tmt-pengangkatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">TMT Pengangkatan</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input name="tmt_pengangkatan" id="tmt-pengangkatan" datepicker datepicker-format="dd/mm/yyyy" type="text" value="{{$employee['tmt_pengangkatan']}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="kartu-pegawai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kartu Pegawai</label>
                            <input type="number" name="kartu_pegawai" id="kartu-pegawai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['kartu_pegawai']}}">
                        </div>
                        <div class="mb-6">
                            <label for="kartu-istri" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kartu Istri</label>
                            <input type="number" name="kartu_istri" id="kartu-istri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['kartu_istri']}}">
                        </div>
                        <div class="mb-6">
                            <label for="kk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">KK</label>
                            <input type="number" name="kk" id="kk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" value="{{$employee['kk']}}">
                        </div>
                    </div>
                </div>
                <div class="flex align-middle justify-end">
                    @if ($user->role === 'ADMIN')
                        <button type="button" onclick="toggleStatus()" class="
                        {{$employee['user']['status'] ? 'bg-red-500 hover:bg-red-700' : 'bg-green-500 hover:bg-green-700'}} btn-toggle-status text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                            {{$employee['user']['status'] ? 'Nonaktifkan Akun' : 'Aktifkan Akun'}}
                        </button>
                    @endif
                    @if (Route::currentRouteName() === 'employee.edit')
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan
                        </button>
                    @else
                        <a href="{!! route('employee.edit', $employee['id']) !!}" class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Edit
                        </a>
                    @endif
                </div>
            </form>
        </div>
        <div class="hidden p-4 rounded-md dark:bg-gray-800" id="sertifikat" role="tabpanel" aria-labelledby="sertifikat-tab">
            @if (Route::currentRouteName() === 'employee.edit')
                <div class="grid justify-items-end mb-4">
                    <div class="flex flex-row">
                        <button type="button" data-modal-toggle="modal-add-certificate" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="fa-solid fa-file-certificate"></i>
                            Tambah Sertifikat
                        </button>
                    </div>
                </div>
            @endif
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="table-certificate" class="min-w-full border-separate table-spacing">
                                <thead class="bg-primary dark:bg-primary">
                                    <tr>
                                        <th scope="col"
                                            class="rounded-l-lg py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Nama
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Penyelenggara
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Jenis
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Tingkat
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Sertifikat
                                        </th>
                                        <th scope="col"
                                            class="rounded-r-lg py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="render-certificate"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden p-4 rounded-md dark:bg-gray-800" id="ijazah" role="tabpanel" aria-labelledby="ijazah-tab">
            @if (Route::currentRouteName() === 'employee.edit')
                <div class="grid justify-items-end mb-4">
                    <div class="flex flex-row">
                        <button type="button" data-modal-toggle="modal-add-ijazah" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="fa-solid fa-file-ijazah"></i>
                            Tambah Ijazah
                        </button>
                    </div>
                </div>
            @endif
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="table-ijazah" class="min-w-full border-separate table-spacing">
                                <thead class="bg-primary dark:bg-primary">
                                    <tr>
                                        <th scope="col"
                                            class="rounded-l-lg py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Nomor
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Jurusan
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Nama Sekolah
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Kabupaten/Kota
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Provinsi
                                        </th>
                                        <th scope="col"
                                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Ijazah
                                        </th>
                                        <th scope="col"
                                            class="rounded-r-lg py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="render-ijazah"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('employee_affair.modal._add_certificate')
    @include('employee_affair.modal._edit_certificate')
    @include('employee_affair.modal._add_ijazah')
    @include('employee_affair.modal._edit_ijazah')
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

        @if (Route::currentRouteName() === 'employee.detail')
            $('input').attr('disabled', true);
            $('select').attr('disabled', true);
        @endif

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function toggleStatus(){
            let btn = $('.btn-toggle-status');
            $.ajax({
                type: 'PATCH',
                url: '{{route('employee.update.status', $employee['id'])}}',
                success: function(data){
                    toast('Berhasil mengubah status akun', 'success');
                    if(!data.status){
                        btn.removeClass('bg-red-500 hover:bg-red-700').addClass('bg-green-500 hover:bg-green-700');
                        btn.text('Aktifkan Akun');
                    }else{
                        btn.removeClass('bg-green-500 hover:bg-green-700').addClass('bg-red-500 hover:bg-red-700');
                        btn.text('Nonaktifkan Akun');
                    }
                }
            });
        }


        getCertificates();
        function getCertificates(){
            url = '{{route('employee.certificates.index', $employee['id'])}}';
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data){
                    renderCertificate(data);
                }
            });
        }


        function renderCertificate(data){
            let html = ``;

            if (data.length < 1) {
                html += `
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                        <td class="rounded-lg py-6 px-6 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="8">
                            Tidak dapat menemukan data sertifikat
                        </td>
                    </tr>
                `
                return $(`#render-certificate`).html(html);
            }
            $.each(data, function (key, data) {
            html += `
                <tr
                    class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                    <td
                        class="rounded-l-lg py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ${key + 1}
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div id="data-nama-${data.id}" class="whitespace-normal w-44">${data.nama}</div>
                    </td>
                    <td id="data-tanggal-${data.id}" class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">${data.tanggal}</td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div id="data-penyelenggara-${data.id}" class="whitespace-normal w-24">${data.penyelenggara}</div>
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div id="data-jenis-${data.id}" class="whitespace-normal w-24">${data.jenis}</div>
                    </td>
                    <td id="data-tingkat-${data.id}" class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">${data.tingkat}</td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <img id="data-sertifikat-${data.id}" class="w-24 " src="{{ asset('storage/${data.sertifikat}')}}"></img>
                    </td>
                    <td class="rounded-r-lg py-6 px-6 text-sm text-center font-medium flex-nowrap">
                        <div class="inline-flex" role="group">
                            <button type="button" onclick="btnEditCertificate('${data.id}')" class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type"button" onclick="btnDeleteCertificate('${data.id}')" class="text-white bg-red-700 opacity-90 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                    `
            });
            html += `</tr>`

            $(`#render-certificate`).html(html);
            $(`#table-certificate`).DataTable();
            $(`#table-certificate`).removeClass('dataTable');
        };

        function btnDeleteCertificate(id){
            url = `{{route('employee.certificates.delete', ['employeeId' => "employeeId", 'certificateId' => "certificateId"])}}`;
            url = url.replace('employeeId', id).replace('certificateId', id);
            $.ajax({
                type: 'DELETE',
                url: url,
                success: function(data){
                    toast('Berhasil menghapus sertifikat', 'success');
                    getCertificates();
                }
            });
        }

        function btnEditCertificate(id){
            toggleModal('modal-edit-certificate');
            console.log($('#data-tanggal-'+id).html());
            const jenis = $('#data-jenis-'+id).html(),
                tingkat = $('#data-tingkat-'+id).html(),
                tanggal = $('#data-tanggal-'+id).html().replaceAll("/", "-").split("-").reverse().join("-");

                console.log(tanggal);

            $(`#modal-edit-certificate #jenis option`).attr('selected', false);
            $(`#modal-edit-certificate #tingkat option`).attr('selected', false);

            $('#modal-edit-certificate #sertifikat-id').val(id);
            $('#modal-edit-certificate #nama_s').val($('#data-nama-'+id).html());
            $('#modal-edit-certificate #tanggal').val(tanggal);
            $('#modal-edit-certificate #penyelenggara').val($('#data-penyelenggara-'+id).html());
            $(`#modal-edit-certificate #jenis option[value=${jenis}]`).attr('selected', 'selected');
            $(`#modal-edit-certificate #tingkat option[value=${tingkat}]`).attr('selected', 'selected');
            $('#modal-edit-certificate #sertifikat-imgs').attr('src', $(`#data-sertifikat-${id}`).attr(`src`));
        }


        getIjazah();
        function getIjazah(){
            url = '{{ route('employee.ijazah.index', $employee['id']) }}';
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data){
                    console.log(data);
                    renderIjazah(data);
                },
                error: function(data){
                    console.log(data);
                }
            });
        }

        function renderIjazah(data){
            let html = ``;

            if (data.length < 1) {
                html += `
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                        <td class="rounded-lg py-6 px-6 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="8">
                            Tidak dapat menemukan data ijazah
                        </td>
                    </tr>`
                return $(`#render-ijazah`).html(html);
            }
            $.each(data, function (key, data) {
            html += `
                <tr
                    class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                    <td
                        class="rounded-l-lg py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ${key + 1}
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div id="data-nomor" class="whitespace-normal w-44">${data.nomor}</div>
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div id="data-jurusan" class="whitespace-normal w-24">${data.jurusan}</div>
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div id="data-nama_sekolah" class="whitespace-normal w-24">${data.nama_sekolah}</div>
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div id="data-kabupaten_kota" class="whitespace-normal w-24">${data.kabupaten_kota}</div>
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div id="data-provinsi" class="whitespace-normal w-24">${data.provinsi}</div>
                    </td>
                    <td class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <img id="data-ijazah" class="w-24 " src="{{ asset('storage/${data.ijazah}')}}"></img>
                    </td>
                    <td class="rounded-r-lg py-6 px-6 text-sm text-center font-medium flex-nowrap">
                        <div class="inline-flex" role="group">
                            <a href="{!! URL::to('/employee/ijazah/${data.employee_id}/${data.id}/detail') !!}" class="text-white bg-primary opacity-90 hover:bg-blue-900 focus:ring-4 focus:ring-blue-700 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-primary dark:hover:bg-blue-900 dark:focus:ring-blue-700">
                                        <i class="fa-solid fa-eye"></i>
                            </a>
                            <button type="button" onclick="btnEditIjazah('${data.id}','${data.employee_id}','${data.nomor}','${data.jurusan}','${data.nama_sekolah}','${data.npsn}','${data.kabupaten_kota}','${data.provinsi}','${data.nama_ortu}','${data.nis}','${data.nisn}','${data.no_peserta_un}','${data.ijazah}')" class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type"button" onclick="btnDeleteIjazah('${data.id}')" class="text-white bg-red-700 opacity-90 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                    `
            });
            html += `</tr>`

            $(`#render-ijazah`).html(html);
            $(`#table-ijazah`).DataTable();
            $(`#table-ijazah`).removeClass('dataTable');
        };

        function btnDeleteIjazah(id){
            url = `{{route('employee.ijazah.delete', ['employeeId' => $employee['id'], 'ijazahId' => 'ijazahId'])}}`;
            url = url.replace('employeeId', id).replace('ijazahId', id);
            $.ajax({
                type: 'DELETE',
                url: url,
                success: function(data){
                    toast('Berhasil menghapus ijazah', 'success');
                    getIjazah();
                }
            });
        }

        function btnEditIjazah(id, employee_id, nomor, jurusan, nama_sekolah, npsn, kabupaten_kota, provinsi, nama_ortu, nis, nisn, no_peserta_un, ijazah){
            toggleModal('modal-edit-ijazah', true);

            console.log(nomor);

            $(`#modal-edit-ijazah #nomor`).val(nomor);
            $(`#modal-edit-ijazah #jurusan`).val(jurusan);
            $(`#modal-edit-ijazah #nama_sekolah`).val(nama_sekolah);
            $(`#modal-edit-ijazah #npsn`).val(npsn);
            $(`#modal-edit-ijazah #kabupaten_kota`).val(kabupaten_kota);
            $(`#modal-edit-ijazah #provinsi`).val(provinsi);
            $(`#modal-edit-ijazah #nama_ortu`).val(nama_ortu);
            $(`#modal-edit-ijazah #nis`).val(nis);
            $(`#modal-edit-ijazah #nisn`).val(nisn);
            $(`#modal-edit-ijazah #no_peserta_un`).val(no_peserta_un);
            $('#modal-edit-ijazah #ijazah-img').attr('src', $(`#data-ijazah`).attr(`src`));

            const updateRoute = `{{route('employee.ijazah.update', 'employeeId')}}`.replace('employeeId', employee_id);
            $(`#modal-edit-ijazah form`).attr('action', updateRoute);
        }
    </script>

@endsection
