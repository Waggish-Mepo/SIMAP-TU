<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
    id="modal-add-activity">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Tambah Kegiatan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="modal-add-activity">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form>
                @csrf
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="mb-6">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                            Lengkap</label>
                        <input type="text" id="nama" name="nama" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Joe Mama" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="nama_kegiatan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                            Kegiatan</label>
                        <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="tgl_kegiatan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal
                            kegiatan</label>
                        <input name="tgl_kegiatan" id="tgl_kegiatan" datepicker-format="dd/mm/yyyy" type="date" value=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date" required>
                    </div>

                    <div class="mb-6">
                        <label for="kategori"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kategori</label>
                        <select id="kategori" name="kategori"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                            <option disabled selected value> -- Pilih Kategori -- </option>
                            @foreach (config('constant.employee_activity.kategori') as $kategori)
                                <option value="{{ $kategori }}">{{ $kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button id="btn-add-activity" onclick="createActivity()"  type="submit"
                        class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Tambah</button>
                    <button data-modal-toggle="modal-add-activity" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
