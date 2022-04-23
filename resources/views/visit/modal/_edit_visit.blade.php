<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="modal-edit-visit">
    <div class="relative px-4 w-full max-w-7xl h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Kunjungan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-edit-visit">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form">
                @csrf
                @method('PATCH')
                <div class="p-6 space-y-6">
                    <div class="flex flex-row flex-wrap">
                <div class="flex-1 px-3">
                    <div class="mb-6">
                        <label for="no_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No Surat</label>
                        <input type="text" name="no_surat" id="no_surat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="" value="" required>
                    </div>
                    <div class="mb-6">
                        <label for="lampiran"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lampiran</label>
                        <input type="text" id="lampiran" name="lampiran"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="" value="" required>
                    </div>
                    <div class="mb-6">
                        <label for="perihal"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perihal</label>
                        <input type="text" id="perihal" name="perihal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            >
                    </div>
                    <div class="mb-6">
                        <label for="kepada"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kepada</label>
                        <input type="text" id="kepada" name="kepada"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            >
                    </div>
                    <div class="mb-6">
                        <label for="jam"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jam Kunjungan</label>
                        <input type="time" id="jam" name="jam"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            >
                    </div>
                    <div class="mb-6">
                        <label for="hari"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Hari Kunjungan</label>
                        <select id="hari" name="hari"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                            <option disabled selected value="-- Pilih Hari --">
                                -- Pilih Hari --</option>
                            <option value="Senin">
                                Senin</option>
                            <option value="Selasa">
                                Selasa</option>
                            <option value="Rabu">
                                Rabu</option>
                            <option value="Kamis">
                                Kamis</option>
                            <option value="Jumat">
                                Jumat</option>
                        </select>
                    </div>
                </div>
                <div class="flex-1 px-3">
                    <div class="mb-6">
                        <label for="tgl-kunjungan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Kunjungan</label>
                        <input type="date" id="tgl-kunjungan" name="tanggal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            >
                    </div>
                    <div class="mb-6">
                        <label for="tempat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tempat Kunjungan</label>
                        <input type="text" id="tempat" name="tempat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            >
                    </div>
                    <div class="mb-6">
                        <label for="jumlah_peserta"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah Peserta</label>
                        <input type="number" id="jumlah_peserta" name="jumlah_peserta"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            >
                    </div>
                    <div class="mb-6">
                        <label for="keterangan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Keterangan Kunjungan</label>
                        <input type="text" id="keterangan" name="keterangan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            >
                    </div>
                    <div class="mb-6">
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
                        <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                            <option disabled selected value="--Pilih Status--">
                                -- Pilih Status --</option>
                            <option value="Belum Selesai">
                                Belum Selesai</option>
                            <option value="Selesai">
                                Selesai</option>
                        </select>
                    </div>

                     <div class="mb-6">
                            <label for="dokumentasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dokumentasi</label>
                            <div class="bg-gray-200 w-full mb-2">
                            <img id="dokumentasi-imgs" class="h-20 mx-auto" src="" alt="" srcset="">
                        </div>
                        <input onchange="document.getElementById('dokumentasi-imgs').src = window.URL.createObjectURL(this.files[0])"
                        accept=".jpg, .jpeg, .png, .pdf" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="dokumentasi_help" id="dokumentasi" type="file" name="dokumentasi">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="dokumentasi_help">Maksimal ukuran file: 2mb</div>
                    </div>
                        </div>
                </div>
                    </div>
                </div>
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="btn-edit-visit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Data</button>
                <button data-modal-toggle="modal-edit-visit" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Batal</button>
            </div>
        </form>
        </div>
    </div>
</div>
