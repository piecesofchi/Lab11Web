# Lab11Web

# Praktikum 11

## Persiapan Struktur Folder

Buat folder project:

    lab11_php_oop/

Struktur akhir harus seperti ini:

    lab11_php_oop/ 
    ├── .htaccess           
    ├── config.php          
    ├── index.php           
    ├── class/              
    │   ├── Database.php 
    │   └── Form.php 
    ├── module/            
    │   └── artikel/ 
    │       ├── index.php   
    │       ├── tambah.php  
    │       └── ubah.php 
    ├── template/          
    ├── header.php 
    ├── footer.php 
    └── sidebar.php


---

## Konfigurasi Database (config.php)

    <?php
    $config = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db_name' => 'latihan_oop'
    ];
    ?>


---

## Class Library (OOP)

### 3.1 Database.php

Digunakan untuk koneksi database, insert, update, get, dan query.


### 3.2 Form.php

Digunakan untuk membuat form dinamis (text, textarea, select, radio, checkbox).


---

## Routing Menggunakan .htaccess

Buat file .htaccess di root project:

    <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteBase /lab11_php_oop/
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^(.*)$ index.php/$1 [L]
    </IfModule>
    
    Fungsi:
    ✔ Mengaktifkan URL rewrites
    ✔ Mengubah URL menjadi format /module/page
    ✔ Mengarahkan semua request ke index.php sebagai router


---

🛣 5. Router Utama (index.php)

File ini membaca URL lalu memanggil modul yang sesuai:

- `localhost/lab11_php_oop/artikel/index` → module artikel halaman index
  <img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/41538832-b8a9-4fb5-a2d4-e16f1dad654f" />


- `localhost/lab11_php_oop/artikel/tambah` → module tambah artikel
  <img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/dda3b1e2-195e-4ad2-80af-799d326ea997" />


- `localhost/lab11_php_oop/artikel/ubah?id=1` → edit artikel
  <img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/59d639bb-e778-4ec5-8fa7-ccb5ced11ee0" />



Router memanggil file sesuai dengan struktur:

    module/{module}/{page}.php

Jika file tidak ditemukan → tampil “Modul tidak ditemukan”.


---

## Template (header.php, sidebar.php, footer.php)

Template digunakan untuk menampilkan layout yang sama pada semua halaman.

### header.php

Berisi HTML head + sidebar + pembuka div content.

### sidebar.php

Menu navigasi seperti:

- Artikel
- Tambah Artikel

### footer.php

Berisi penutup tag body & html.


---

## Modul Artikel (CRUD Sederhana)

### index.php

Menampilkan daftar artikel dari database.

### tambah.php

Form tambah menggunakan class Form.

### ubah.php

Form edit artikel.

Semua modul menggunakan Database.php dan dipanggil oleh router.


---

## Pembuatan Database

Database: latihan_oop

SQL:
    
    CREATE TABLE artikel (
        id INT AUTO_INCREMENT PRIMARY KEY,
        judul VARCHAR(255),
        keterangan TEXT
    );


# Praktikum 12 – Autentikasi dan Session



## Struktur Folder Project

```
lab11_php_oop/
├── index.php
├── config.php
├── class/
│   └── Database.php
├── module/
│   ├── home/
│   │   └── index.php
│   ├── artikel/
│   │   └── index.php
│   └── user/
│       ├── login.php
│       └── logout.php
└── template/
    ├── header.php
    └── footer.php
```

---

## A. Persiapan Database

### 1. Membuat Database

Membuat database dengan nama `latihan_oop` melalui phpMyAdmin.

### 2. Membuat Tabel Users

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100)
);
```

### 3. Insert Data Dummy

```sql
INSERT INTO users (username, password, nama)
VALUES (
    'admin',
    '$2y$10$uWdZ2x.hQfGqGz/..q7wue.3/a/e/e/e/e/e/e/e/e/e/e',
    'Administrator'
);
```

Password asli untuk user admin adalah **admin123**.

---

## B. Konfigurasi Database

File `config.php` digunakan untuk menyimpan konfigurasi koneksi database:

```php
<?php
$config = [
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name'  => 'latihan_oop'
];
```

---

## C. Class Database

File `class/Database.php` digunakan untuk mengelola koneksi dan query database. Class ini mengambil konfigurasi dari file `config.php` dan menggunakan ekstensi `mysqli` untuk koneksi ke MySQL.

---

## D. Routing Utama

File `index.php` berfungsi sebagai router utama aplikasi. File ini:

* Mengaktifkan session
* Mengecek status login user
* Mengatur halaman publik dan halaman yang membutuhkan autentikasi
* Memuat modul sesuai URL

---

## E. Modul User

### 1. Login

File `module/user/login.php` berisi:

* Form login
* Proses autentikasi user
* Verifikasi password menggunakan `password_verify()`
* Pembuatan session saat login berhasil

### 2. Logout

File `module/user/logout.php` digunakan untuk:

* Menghapus session menggunakan `session_destroy()`
* Mengarahkan kembali ke halaman login

---

## F. Pengujian Sistem

1. Mengakses halaman artikel tanpa login

   * Sistem otomatis mengarahkan ke halaman login
2. Login menggunakan akun admin

   * Username: admin
   * Password: admin123
3. Login berhasil

   * User diarahkan ke halaman artikel
   * Menu logout muncul pada navbar
4. Logout

   * Session dihapus
   * User kembali ke halaman login

---


## Dokumentasi

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/86ce95b9-0d0a-4ecc-a53f-529b4ed62133" />

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/43a45f09-d073-4370-bfe6-c4ab5adefa36" />




