<!DOCTYPE html>
<html lang="id">
<head>
    @include('layout.head')
    <title>SIMAP Tata Usaha
        @hasSection('title')
            - @yield('title')
        @endif
    </title>
</head>
<body>

<div class="flex min-h-screen mx-auto max-w-fit flex-nowrap" >

<div class=" xl:ml-0 xl:mt-0 sm:content-center sm:-ml-64 sm:mt-44">
        <div class="mt-32 xl:px-0 sm:px-40">
            <img class="mb-5 ml-52 xl:w-56 sm:w-10/12 sm:mr-20" src="{{ asset('src/logo.png') }}" alt="description of myimage">
            <form class="font-bold ml-44 w-44 font-hpoppins ">
                <div class="mb-7 ">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 xl:text-base sm:text-4xl ">Username</label>
                    <input type="email" id="email" class="block p-2 text-sm text-gray-900 bg-gray-100 border-0 rounded-lg w-72 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 xl:px-5 xl:h-11 sm:h-16 sm:px-72" placeholder="Ketik Username" required>
                </div>
                <div class="mb-6 " x-data="{ show: true }">
                    <label for="password" class="relative block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 xl:text-base sm:text-4xl">Password</label>
                    <input type="show ? 'password' : 'text'" id="password" class="block p-2 text-sm text-gray-900 bg-gray-100 border-0 rounded-lg w-72 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 xl:px-5 xl:h-11 sm:h-16 sm:px-72" required>

                    <div class="relative inset-y-0 flex items-center pr-3 text-sm leading-5 -right-64 -top-8 ">

                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                        :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 576 512">
                        <path fill="currentColor"
                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                        </path>
                        </svg>

                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                        :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 640 512">
                        <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                        </svg>

                  </div>
                </div>

                <button type="submit" class="px-5 py-2 text-sm font-medium text-center text-white bg-blue-900 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 w-72 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 xl:px-0 xl:h-11 xl:text-base sm:h-16 sm:px-72 sm:text-2xl ">Login</button>
            </form>
        </div>
    </div>
    <div class="xl:flex sm:hidden ">
         <img class="bg-blue-900 xl:w-full xl:h-screen ml-52 " src="{{ asset('src/wave.png') }}" alt="description of myimage">
    </div>
    <div class="flex w-full h-screen text-center bg-blue-900 ml-36 flex-nowrap xl:flex sm:hidden">
        <div class="w-2/3 mt-24 ml-20 transition-transform bg-blue-900 sm:max-w-7xl">
                <img class="max-w-sm mx-6 ml-9" src="{{ asset('src/pic1.png') }}" alt="description of myimage">
                <br/>
            <div class="w-full max-w-md mx-6 ">
                <h6 class="text-lg font-bold text-white">Sistem Informasi Management Tata Usaha</h6>
                <a class="text-sm text-white font-poppins">
                    simapTu merupakan inovasi dibidang IT yang dikembangkan
                untuk memudahkan pelayanan persuratan dan layanan
            informasi secara praktis dan efesien.
                </a>
            </div>
        </div>
    </div>
</div>
@include('layout.script')
</body>
</html>
