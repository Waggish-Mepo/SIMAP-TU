@extends('layout.app')

@section('title', 'Kunjungan')

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-500">
        <a href="{{ route('visit_letter.index') }}" class="text-gray-800">Kunjungan</a>
        <i class="fa-solid fa-chevron-right text-lg text-primary mx-2"></i>
        {{ $visit['no_surat'] }}
    </p>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px" id="employeeTab" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block py-2 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                    id="pegawai-tab" data-tabs-target="#pegawai" type="button" role="tab" aria-controls="pegawai"
                    aria-selected="true">Detail Kunjungan</button>
            </li>
        </ul>
    </div>
    <div>
        <div class="p-4 bg-white rounded-md dark:bg-gray-800" id="pegawai" role="tabpanel" aria-labelledby="pegawai-tab">
            <form action="{{ route('visit_letter.update', $visit['id']) }}" method="post" enctype="multipart/form-data">
                <form>
                @csrf
                @method('PATCH')
                <div class="flex flex-row flex-wrap">
                    <div class="flex-1 px-3">
                        <div class="mb-6">
                            <label for="no_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No Surat</label>
                            <input type="text" name="no_surat" id="no_surat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Joe Mama" value="{{ $visit['no_surat'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="lampiran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lampiran</label>
                            <input type="text" id="lampiran" name="lampiran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $visit['lampiran'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="perihal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perihal</label>
                            <input type="text" id="perihal" name="perihal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $visit['perihal'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="kepada"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kepada</label>
                            <input type="text" id="kepada" name="kepada"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $visit['kepada'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="jam"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jam Kunjungan</label>
                            <input type="time" id="jam" name="jam"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $visit['jam'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="tanggal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Kunjungan</label>
                            <input type="date" id="tanggal" name="tanggal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $visit['tanggal'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="Tempat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tempat Kunjungan</label>
                            <input type="text" id="Tempat" name="Tempat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $visit['tempat'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="jumlah_peserta"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah Peserta</label>
                            <input type="number" id="jumlah_peserta" name="jumlah_peserta"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $visit['jumlah_peserta'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="keterangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Keterangan Kunjungan</label>
                            <input type="text" id="keterangan" name="keterangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $visit['keterangan'] }}">
                        </div>
                        <div class="mb-6">
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
                            <select id="status" name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                required>
                                <option disabled selected value="--Pilih Status--">
                                    -- Pilih Status --</option>
                                    @foreach( config('constant.visit.status') as $status)
                                    <option value="{{$status}}"
                                        {{$visit['status'] === $status ? 'selected' : ''}}>{{ $status }}</option>
                                        @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="dokumentasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dokumentasi</label>
                                <img id="dokumentasi-img" class="mx-auto" src="{{ asset('storage/'.$visit['dokumentasi'])}}" alt="" srcset="" style="width:15rem;height:15rem">
                            <input onchange="document.getElementById('dokumentasi-img').src = window.URL.createObjectURL(this.files[0])" type="file" id="dokumentasi" name="dokumentasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ $visit['dokumentasi'] }}">
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

@section('script')
<script>


    $(document).ready(function(){
         const tanggal = `{{$visit['tanggal']}}`.replaceAll("/", "-").split("-").reverse().join("-");

    $('#tanggal').val(tanggal)
    console.log(tanggal)
    })

</script>
@endsection
