<!-- Extra Large Modal -->
<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="modal-edit-ijazah">
    <div class="relative px-4 w-full max-w-7xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Ijazah
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-edit-ijazah">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="flex flex-row flex-wrap">
                <div class="flex-1 px-3">
                    <input type="hidden" name="id" id="id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                        >
                    <div class="mb-6">
                        <label for="nomor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor Ijazah</label>
                        <input type="text" name="nomor" id="nomor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="contoh: DN-Mk/13 00066050" required>
                    </div>
                    <div class="mb-6">
                        <label for="jurusan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="contoh: Kedokteran" required
                            >
                    </div>
                    <div class="mb-6">
                        <label for="nama_sekolah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Universitas/ Sekolah</label>
                        <input type="text" id="nama_sekolah" name="nama_sekolah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="contoh: Universitas Negeri Malang" required
                            >
                    </div>

                    <div class="mb-6">
                        <label for="npsn"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NPSN</label>
                        <input type="text" id="npsn" name="npsn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required placeholder="Masukan NPSN">
                    </div>
                    <div class="mb-6">
                        <label for="kabupaten_kota"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kabupaten Kota</label>
                        <input type="text" id="kabupaten_kota" name="kabupaten_kota"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="contoh: Malang" required
                             required>
                    </div>
                    <div class="mb-6">
                        <label for="provinsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="contoh: Jawa Barat" required
                            >
                    </div>
                </div>
                <div class="flex-1 px-3">
                    <div class="mb-6">
                        <label for="nama_ortu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Orang Tua</label>
                        <input type="text" id="nama_ortu" name="nama_ortu"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required placeholder="Masukan Nama Orang Tua">
                    </div>
                    <div class="mb-6">
                        <label for="nis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIS</label>
                        <input type="number" id="nis" name="nis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                             required placeholder="Masukan NIS">
                    </div>
                    <div class="mb-6">
                        <label for="nisn"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NISN</label>
                        <input type="number" id="nisn" name="nisn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required placeholder="Masukan nisn">
                    </div>
                    <div class="mb-6">
                        <label for="no_peserta_un"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No Peserta Ujian Nasional</label>
                        <input type="text" id="no_peserta_un" name="no_peserta_un"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required placeholder="Masukan No Perserta UN">
                    </div>
                    <div class="mb-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="ijazah">Unggah ijazah</label>
                        <div class="bg-gray-200 w-full mb-2">
                            <img id="ijazah-img" class="h-36 mx-auto" src="" alt="" >
                        </div>
                        <input onchange="document.getElementById('ijazah-img').src = window.URL.createObjectURL(this.files[0])"
                        accept=".jpg, .jpeg, .png, .pdf" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="ijazah" id="ijazah" type="file" name="ijazah">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="ijazah">Maksimal ukuran file: 2mb</div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="btn-edit-ijazah" type="submit" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Edit Data</button>
                <button data-modal-toggle="modal-edit-ijazah" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Batal</button>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>
