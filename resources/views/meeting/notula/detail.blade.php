@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Notula')

@section('content')

    <p class="mb-4 text-2xl font-semibold text-gray-800">
        Notula
    </p>
    <a id="btn-add-employee" type="submit" href="{{route('meeting.notula.index')}}" class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary float-right mr-6">Kembali</a>
    <form action="#" method="post" class="mt-14" enctype="multipart/form">
                @csrf
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="mb-6">
                        <label for="pimpinan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pimpinan Rapat</label>
                        <input type="text" id="pimpinan" name="pimpinan" disabled value="Ayam goreng "
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="materi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Materi</label>
                        <input type="text" id="materi" name="materi" disabled value="Nasi Goreng"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             value="" required>
                    </div>

                        <div class="col-span-5">
                            <label for="tgl_rapat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal
                                 </label>
                            <input name="tgl_rapat" id="tgl_kegiatan" datepicker-format="dd/mm/yyyy" type="date"  value="" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                        </div>
                        <div class="mb-6">
                        <label for="pimpinan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Notulis</label>
                        <input type="text" id="pimpinan" name="pimpinan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                    </div>
                        <div class="mb-6">
                        <label for="presensi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Presensi</label>
                        <input type="number" min="0" step="10" value="0"  id="presensi" name="presensi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="tempat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pembukaan</label>
                        <textarea rows="2" id="tempat" name="tempat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                        </textarea>
                    </div>
                    <div class="mb-6">
                        <label for="tempat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pembahasan Rapat</label>
                        <textarea rows="4" id="tempat" name="tempat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                        </textarea>
                    </div>
                    <div class="mb-6">
                        <label for="tempat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penutup</label>
                        <textarea rows="2" id="tempat" name="tempat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                        </textarea>
                    </div>
                    <div class="mb-6">
                        <label for="tempat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pokok Pembahasan</label>
                        <textarea rows="4" id="tempat" name="tempat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                        </textarea>
                    </div>
                    <div class="mb-6">
                        <label for="tempat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hasil Pembahasan</label>
                        <textarea rows="3" id="tempat" name="tempat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                        </textarea>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button id="btn-add-employee" type="submit"
                        class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Simpan</button>

                </div>
            </form>

    @include('employee_affair.modal._add_agenda')

@endsection
