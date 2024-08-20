# Laravel ToDo List API

## Deskripsi

Proyek ini adalah sebuah aplikasi ToDo List yang dibangun menggunakan Laravel. Aplikasi ini memungkinkan pengguna untuk mendaftarkan diri, membuat daftar tugas (To Do), mengelompokkan tugas berdasarkan kategori, dan menyimpan data pengguna serta tugas mereka. API ini memvalidasi format email dan memastikan bahwa setiap pengguna memiliki username yang unik.

## Fitur

-   **Registrasi Pengguna:** Pengguna dapat mendaftar dengan nama, username, dan email.
-   **Membuat Tugas:** Pengguna dapat membuat tugas dengan deskripsi dan kategori.
-   **Manajemen Kategori:** Pengguna dapat memilih kategori untuk setiap tugas dari daftar kategori yang tersedia.
-   **Validasi Input:** Memeriksa kesesuaian format email dan memastikan username unik.

## Prasyarat

-   **PHP >= 8.1**
-   **Composer**
-   **MySQL/MariaDB**

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

1. Clone repositori ini:

    ```bash
    git clone https://github.com/username/repository.git
    ```

2. Masuk ke direktori proyek:

    ```bash
    cd repository
    ```

3. Install dependencies menggunakan Composer:

    ```bash
    composer install
    ```

4. Salin file `.env.example` menjadi `.env` dan konfigurasi database:

    ```bash
    cp .env.example .env
    ```

5. Generate application key:

    ```bash
    php artisan key:generate
    ```

6. Migrasi database:

    ```bash
    php artisan migrate
    ```

7. Jalankan server aplikasi:

    ```bash
    php artisan serve
    ```

8. Akses API di browser atau menggunakan Postman pada alamat `http://localhost:8000`.

## API Endpoints

Berikut adalah daftar endpoint yang tersedia di aplikasi ini:

### **1. Daftar Kategori**

-   **GET** `/api/categories`
-   Mengembalikan daftar kategori tugas.

### **2. Membuat Tugas**

-   **POST** `/api/tasks`
-   Membuat tugas baru.
-   **Body Request:**
    ```json
    {
        "name": "Nama Pengguna",
        "username": "username",
        "email": "email@example.com",
        "tasks": [
            {
                "description": "Deskripsi tugas",
                "category_id": 1
            }
        ]
    }
    ```
