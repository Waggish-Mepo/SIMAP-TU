<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800 shadow-md">
    <div class="flex flex-wrap justify-between lg:justify-end lg:items-end mx-auto">
        <button class="btn-mobile-sidebar lg:hidden ml-2" type="button">
            <svg class="w-8 h-8 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <div class="flex items-center md:order-2">
            <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?background=random&name={{$user->name}}" alt="user photo">
            </button>
            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
                <div class="py-3 px-4">
                    <span class="block text-sm text-gray-900 dark:text-white">{{$user->name}}</span>
                </div>
                <ul class="py-1" aria-labelledby="dropdown">
                    <li>
                        <a href="{{route('employee.edit', $user->userable_id)}}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Perbarui Data</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Ganti Password</a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
