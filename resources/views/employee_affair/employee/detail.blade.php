@extends('layout.app')

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
    </div>
@endsection

@section('script')
    <script>
        @if (session('success'))
            toast('Berhasil memperbarui data pegawai', 'success');
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

        @if (Route::currentRouteName() === 'employee.detail')
            $('input').attr('disabled', true);
            $('select').attr('disabled', true);
        @endif
    </script>
@endsection
