<button type="button" class="flex items-center w-full p-1 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-surat-menyurat" data-collapse-toggle="dropdown-surat-menyurat">
    <i class="ml-1 fa-solid fa-envelopes-bulk text-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Surat Menyurat</span>
    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
</button>
<ul id="dropdown-surat-menyurat" class="{{Route::currentRouteName() === 'letter.in.index' || Route::currentRouteName() === 'letter.out.index' ? '' : 'hidden'}}  py-2 space-y-2">
    <li>
        <a href="{{route('letter.in.index')}}"
            class="{{Route::currentRouteName() === 'letter.in.index' ? 'border-l-8 border-l-primary bg-gray-100 -ml-2' : ''}}
            flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">
            Surat Masuk
        </a>
    </li>
    <li>
        <a href="{{route('letter.out.index')}}" class="
            {{Route::currentRouteName() === 'letter.out.index' ? 'border-l-8 border-l-primary bg-gray-100 -ml-2' : ''}}
            flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">
            Surat Keluar
        </a>
    </li>
</ul>

