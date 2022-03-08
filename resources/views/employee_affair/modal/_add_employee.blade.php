<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
    id="modal-add-employee">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Tambah Pegawai
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="modal-add-employee">
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
                        <input type="text" id="nama" name="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Joe Mama" required>
                    </div>
                    <div class="mb-6">
                        <label for="niy_nigk"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIY/NIGK</label>
                        <input type="number" id="niy_nigk" name="niy_nigk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="status-pegawai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status
                            Pegawai</label>
                        <select id="status-pegawai" name="status_pegawai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                            <option disabled selected value> -- Pilih Status Pegawai -- </option>
                            @foreach (config('constant.employee.status_pegawai') as $status)
                                <option value="{{$status}}">{{ $status }}</option>
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
                                <option value="{{$ptk}}">{{ $ptk }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button id="btn-add-employee" onclick="createUser()" type="button"
                        class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Tambah</button>
                    <button data-modal-toggle="modal-add-employee" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
