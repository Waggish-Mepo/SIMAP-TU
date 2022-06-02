<p align="center"><img src="https://raw.githubusercontent.com/Waggish-Mepo/SIMAP-TU/master/public/img/logo-wikrama-bogor.png" width="100"></p>

## About SIMAP TU

Sistem Informasi Manajemen Administrasi Pegawai Tata Usaha atau SIMAP TU merupakan inovasi dibidang IT yang dikembangkan untuk memudahkan pihak sekolah dalam mengelola pencatatan, pengumpulan, penyimpanan data, dan dokumen yang dapat dipergunakan untuk membantu pimpinan dalam pengambilan keputusan, urusan surat menyurat serta laporan mengenai kegiatan sekolah.

## Tech Stacks
- Laravel 8
- TailwindCSS
- Flowbite
- Datatables

## Getting Started
### Requirements
- PHP 8
- Composer
- NodeJS

### Setup

- Clone repositori ini (https://github.com/Waggish-Mepo/SIMAP-TU.git) ke lokal
- Duplikasi file `.env.example`, lalu ubah menjadi `.env`
- Buat database dengan nama yang sama seperti value dari `DB_DATABASE` yang terletak pada file .env
- Jalankan perintah cmd ini pada folder root:
    - `composer install`
    - `npm install`
    - `php artisan key:generate`
    - `php artisan migrate --seed`
    - `php artisan storage:link`

### Debugging/Run Server
- `php artisan serve`
- `npm run watch`

## Contributor

- **[Suryo Mujahid](https://github.com/suryomujahid)**
- **[Reski Junaidi Shalat](https://github.com/Saekyo)**
- **[Azriel Fauzi Hermansyah](https://github.com/Azrielfhr2)**
- **[Fandi Ahmad](https://github.com/FandiA6)**
- **[Muhamad Geovalza Valeriandi](https://github.com/geovalza25)**
- **[I Made Dhanan Diar W.](https://github.com/imadedhanan)**
- **[Desy Fajriani](https://github.com/desyfajriani)**
- **[Devita Hasnasya Rahma](https://github.com/devitahsnsyr)**
