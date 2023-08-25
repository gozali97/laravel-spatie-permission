# Technical Test

Project untuk menyelsaikan technical test interview

## Fitur

Untuk halaman yang sudah bisa digunakan adalah konfigurasi dimana terdapat sub menu

-   Role
-   Menu
-   Permission

Terdapat juga fitur verfy email dan lupa password mengunakan mailtrap

Selain itu masih belum bisa diakses halamannya

## Instalasi

Berikut adalah langkah-langkah untuk menginstal dan menjalankan proyek ini di mesin lokal Anda.

Pastikan Anda telah menginstal PHP, Composer, dan Node.js di mesin Anda sebelum melanjutkan.

### Langkah-langkah Instalasi

1. Clone repositori ini ke mesin lokal Anda:

git clone git@github.com:okanemo/Ahmad-Gozali.git

2. Pindah ke direktori proyek:

cd Ahmad-Gozali

3. Instal dependensi PHP dengan Composer:

composer install

4. Instal dependensi JavaScript dengan Node.js:

npm install

5. Salin file .env.example ke .env:

6. Generate key aplikasi:

php artisan key:generate

7. Atur konfigurasi database di file .env sesuai dengan pengaturan mesin lokal Anda.

jangan lupa membuat database terlebih dahulu

8. Jalankan migrasi untuk membuat tabel database:

php artisan migrate

9. Jalankan server pengembangan lokal:

php artisan serve
