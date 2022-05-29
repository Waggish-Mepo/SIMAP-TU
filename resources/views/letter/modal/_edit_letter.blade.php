<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="modal-edit-letter">
    <div class="relative px-4 w-full max-w-4xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Perbarui {{Route::currentRouteName() === 'letter.in.index' ? 'Surat Masuk' : 'Surat Keluar'}}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="modal-edit-letter">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form">
                @csrf
                @method('PATCH')
                <input type="hidden" name="jenis" value="{{Route::currentRouteName() === 'letter.in.index' ? 'Surat Masuk' : 'Surat Keluar'}}">
                <!-- Modal body -->
                <div class="flex flex-row flex-wrap  p-6">
                    <div class="flex-1 px-3 space-y-6">
                        <div class="mb-6">
                            <label for="no-surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No Surat</label>
                            <input type="text" id="no-surat" name="no_surat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="" value="" required>
                        </div>
                        @if (Route::currentRouteName() === 'letter.in.index')
                        <div class="mb-6">
                            <label for="pengirim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pengirim</label>
                            <input type="text" id="pengirim" name="pengirim"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="contoh: PT Mepo Sejahtera" value="" required>
                        </div>
                        @endif
                        <div class="mb-6">
                            <label for="perihal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perihal</label>
                            <input type="text" id="perihal" name="perihal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="contoh: Pemberitahuan PTM Terbatas" value="" required>
                        </div>
                        <div class="mb-6">
                            <label for="sifat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Sifat Surat</label>
                            <select id="sifat" name="sifat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                required>
                                <option disabled selected value> -- Pilih Sifat Surat -- </option>
                                @foreach (config('constant.letter.sifat') as $sifat)
                                    <option value="{{ $sifat }}">{{ $sifat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex-1 px-3 space-y-6">
                        <div class="mb-6">
                            <label for="tgl-surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Surat</label>
                            <input name="tgl_surat" id="tgl-surat" type="date" value="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih tanggal surat">
                        </div>
                        @if (Route::currentRouteName() === 'letter.in.index')
                        <div class="mb-6">
                            <label for="tgl-terima" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Terima</label>
                            <input name="tgl_terima" id="tgl-terima" type="date" value="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih tanggal terima">
                        </div>
                        @endif
                        <div class="mb-6">
                            <label for="lampiran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lampiran <span class="text-gray-600 font-italic font-light">(opsional)</span></label>
                            <input type="text" id="lampiran" name="lampiran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="" value="">
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button id="btn-edit-letter" type="submit"
                        class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Perbarui</button>
                    <button data-modal-toggle="modal-edit-letter" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
