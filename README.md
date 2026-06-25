# 🌴 TourEase API

RESTfull API untuk Sistem Manajemen Pariwisata yang dibangun menggunakan Laravel dan JWT Authentication. API ini menyediakan fitur autentikasi pengguna, manajemen destinasi wisata, paket wisata, booking, pembayaran, dan review wisata.

## 📋 Fitur

* JWT Authentication
* Login & Logout User
* Manajemen Destinasi Wisata
* Manajemen Paket Wisata
* Manajemen Booking
* Manajemen Pembayaran
* Manajemen Review
* Relasi antar data
* RESTfull API
* JSON Response

---

## 🛠️ Teknologi

* PHP 8.4
* Laravel 12
* MySQL
* JWT Auth
* Composer
* Postman

---

## 🚀 Instalasi

### Clone Repository

```bash
git clone https://github.com/Zyxoo-z/api_sistem_manajemen_pariwisata_tourease.git
cd api_sistem_manajemen_pariwisata_tourease
```

### Install Dependency

```bash
composer install
```

### Copy Environment

```bash
cp .env.example .env
```

### Generate Application Key

```bash
php artisan key:generate
```

### Generate JWT Secret

```bash
php artisan jwt:secret
```

### Konfigurasi Database

Edit file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gifari
DB_USERNAME=root
DB_PASSWORD=
```

### Migrasi Database

```bash
php artisan migrate
```

### Jalankan Server

```bash
php artisan serve
```

Server akan berjalan pada:

```http
http://127.0.0.1:8000
```

---

## 👤 Informasi Akun Uji Coba

Setelah menjalankan seeder, akun berikut sudah tersedia dan siap digunakan:

| Email                   |  Password   |
|-------------------------|-------------|
| hannan@gmail.com        | hannan123   |
| riski@gmail.com         | Rizky123    |
| abin@gmail.com          | abin123     |

> **Cara login:** Kirim request `POST /api/login` dengan email dan password di atas, lalu gunakan token yang didapat sebagai `Bearer Token` di header Authorization untuk mengakses endpoint lainnya.

---

# 🔐 Authentication

| Method | Endpoint     | Description       |
| ------ | ------------ | ----------------- |
| POST   | /api/login   | Login User        |
| POST   | /api/logout  | Logout User       |
| POST   | /api/refresh | Refresh JWT Token |
| GET    | /api/me      | Data User Login   |

---

# 📍 Destinasi API

| Method | Endpoint                  | Description                 |
| ------ | ------------------------- | --------------------------- |
| GET    | /api/destinasi            | Menampilkan semua destinasi |
| GET    | /api/destinasi/{id}       | Detail destinasi            |
| POST   | /api/destinasi            | Tambah destinasi            |
| PUT    | /api/destinasi/{id}       | Update destinasi            |
| DELETE | /api/destinasi/{id}       | Hapus destinasi             |


---

# 🎒 Paket Wisata API

| Method | Endpoint                | Description               |
| ------ | ----------------------- | ------------------------- |
| GET    | /api/paket              | Menampilkan semua paket   |
| GET    | /api/paket/{id}         | Detail paket              |
| POST   | /api/paket              | Tambah paket              |
| PUT    | /api/paket/{id}         | Update paket              |
| DELETE | /api/paket/{id}         | Hapus paket               |


---

# 📖 Booking API

| Method | Endpoint                    | Description                 |
| ------ | --------------------------- | --------------------------- |
| GET    | /api/booking                | Menampilkan semua booking   |
| GET    | /api/booking/{id}           | Detail booking              |
| POST   | /api/booking                | Membuat booking             |
| PUT    | /api/booking/{id}           | Update booking              |
| DELETE | /api/booking/{id}           | Hapus booking               |


---

# 💳 Payment API

| Method | Endpoint                          | Description                    |
| ------ | --------------------------------- | ------------------------------ |
| GET    | /api/payment                      | Menampilkan semua pembayaran   |
| GET    | /api/payment/{id}                 | Detail pembayaran              |
| POST   | /api/payment                      | Tambah pembayaran              |
| PUT    | /api/payment/{id}                 | Update pembayaran              |
| DELETE | /api/payment/{id}                 | Hapus pembayaran               |


---

# ⭐ Review API

| Method | Endpoint                         | Description                |
| ------ | -------------------------------- | -------------------------- |
| GET    | /api/review                      | Menampilkan semua review   |
| GET    | /api/review/{id}                 | Detail review              |
| POST   | /api/review                      | Tambah review              |
| PUT    | /api/review/{id}                 | Update review              |
| DELETE | /api/review/{id}                 | Hapus review               |


---

## 📄 Dokumentasi API

Dokumentasi lengkap endpoint tersedia secara online melalui tautan berikut:

🔗 **[Lihat Dokumentasi API](https://documenter.getpostman.com/view/43095127/2sBXwwonvL)**

Dokumentasi mencakup detail endpoint, method, parameter, contoh request, dan contoh response untuk seluruh fitur sistem.

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|-----------|------------|
| Laravel 13 | Framework PHP untuk membangun RESTful API |
| MySQL | Database untuk menyimpan data sistem |
| JWT Auth | Autentikasi berbasis JSON Web Token (tymon/jwt-auth) |
| Postman | Tools untuk testing dan dokumentasi API |
| GitHub | Version control dan pengumpulan proyek |

---

## 👨‍💻 Tim Pengembang


| Nama                             | NIM                              | Tugas                                                                               |
| -------------------------------- | -------------------------------- | -----------------------------------------------------------------------------       |
| Muhammad Abin                    | 2301040038                       | End Point Payment & Review, Read me                                                 |
| Muhammad Anshori Hannan          | 2301040034                       | Pembuatan token JWT, Pembuatan Login & Logout, Pembuatan Endpoint Destinasi & Paket |
| Rizky Dewa Cahya Saputra         | 2301040014                       | Pembuatan Repository, End Point Booking, Pembuatan Alur DB, Dokumentasi postman     |


---

*Proyek UAS Mata Kuliah Pemrograman Web Service Genap 2025/2026 | Universitas Bumigora*
