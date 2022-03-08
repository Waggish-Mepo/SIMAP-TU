<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
    id="modal-add-certificate">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class=" bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Tambah Sertifikat
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="modal-add-certificate">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="{{route('employee.certificates.create', $employee['id'])}}" method="post" id="form-add-certificate" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <!-- Modal body -->
                <div class="p-6 space-y-3">
                    <div class="mb-3">
                        <label for="nama_s" class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Sertifikat</label>
                        <input type="text" id="nama" name="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="contoh: Fundamental Flutter" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal</label>
                        <input name="tanggal" id="tanggal" datepicker-format="dd/mm/yyyy" type="date" value="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                    </div>
                    <div class="mb-3">
                        <label for="penyelenggara" class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Penyelenggara</label>
                        <input type="text" id="penyelenggara" name="penyelenggara"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="contoh: Waggish Mepo" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-400">Jenis</label>
                        <select id="jenis" name="jenis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                            <option disabled selected value> -- Pilih Jenis Sertifikat -- </option>
                            @foreach (config('constant.certificate.jenis') as $jenis)
                                <option value="{{$jenis}}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tingkat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tingkat</label>
                        <select id="tingkat" name="tingkat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            required>
                            <option disabled selected value> -- Pilih Tingkatan -- </option>
                            @foreach (config('constant.certificate.tingkat') as $tingkat)
                                <option value="{{$tingkat}}">{{ $tingkat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="sertifikat">Unggah Sertifikat</label>
                        <div class="bg-gray-200 w-full mb-2">
                            <img id="sertifikat-img" class="h-36 mx-auto" src="" alt="" srcset="">
                        </div>
                        <input onchange="document.getElementById('sertifikat-img').src = window.URL.createObjectURL(this.files[0])"
                        accept=".jpg, .jpeg, .png, .pdf" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="sertifikat_help" id="sertifikat" type="file" name="sertifikat">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="sertifikat_help">Maksimal ukuran file: 2mb</div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button id="btn-add-certificate" type="submit"
                        class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Tambah</button>
                    <button data-modal-toggle="modal-add-certificate" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
