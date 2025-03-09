# User API

## Deskripsi
User API adalah sebuah aplikasi berbasis Laravel yang menyediakan endpoint untuk mengelola data pengguna, termasuk fitur CRUD (Create, Read, Update, Delete). API ini dapat digunakan sebagai backend untuk aplikasi yang membutuhkan sistem manajemen pengguna.

## Instalasi dan Menjalankan Aplikasi

### 1. Clone Repository
```sh
git clone https://github.com/username/user-api.git
cd user-api
```
Gantilah `username` dengan username GitHub.

### 2. Instal Dependensi
Pastikan sudah menginstal Composer dan Node.js, lalu jalankan perintah berikut:
```sh
composer install
npm install
```

### 3. Konfigurasi Lingkungan
Salin file `.env.example` menjadi `.env`:
```sh
cp .env.example .env
```
Lalu atur koneksi database di file `.env`:

### 4. Generate Application Key
```sh
php artisan key:generate
```

### 5. Migrasi dan Seeder Database
```sh
php artisan migrate --seed
```

### 6. Menjalankan Aplikasi
```sh
php artisan serve
```
Aplikasi akan berjalan di `http://127.0.0.1:8000`.

### 7. Menjalankan API Tests
Pastikan server berjalan, lalu jalankan:
```sh
npx jest tests/api.test.js
```

## Endpoint API
- `GET /api/users` – Mendapatkan daftar pengguna
- `POST /api/users` – Menambahkan pengguna baru
- `GET /api/users/{id}` – Mendapatkan detail pengguna berdasarkan ID
- `PUT /api/users/{id}` – Memperbarui data pengguna
- `DELETE /api/users/{id}` – Menghapus pengguna


