📘 Employee Management System – Laravel + Filament

Aplikasi Manajemen Pegawai yang dibangun menggunakan Laravel v12 dan FilamentPHP v3.2. 
Aplikasi ini menyediakan fitur login admin, dashboard informatif, dan pengelolaan data pegawai.

🚀 Fitur aplikasi Employee Management System
🔐 Admin Login

Autentikasi admin menggunakan Filament Login yang disertai dengan  password dan juga email.

Tidak menggunakan multi-role (single admin access).

📊 Admin Dashboard

- **Total keseluruhan pegawai**
- **Grafik pegawai per jabatan**
- **Tabel 5 pegawai terbaru**
- **Quick Actions**:
  - Tambah Pegawai
  - Lihat Pegawai
## 👥 Data Pegawai
Admin dapat:
- Menambah pegawai  
- Mengedit pegawai  
- Menghapus pegawai  
- Melihat daftar pegawai  

Setiap data pegawai memiliki:
- **ID unik otomatis** dengan menggunakan uuid

# 🛠️ Tech Stack

| Komponen | Versi |
|---------|--------|
| Framework | Laravel **v12** |
| PHP | **8.2** |
| Admin Panel | FilamentPHP **v3.2** |
| Database | MySQL (Laragon) |
| Composer | **2.8.6** |
| Node.js | **v22.14.0** |

# 📦 Installation Guide

## 1️⃣ Clone Repository
```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
```
## 2️⃣ Install Dependencies
```bash
composer install
npm install
npm run build
```
## 3️⃣ Setup Environment

Copy file .env:
```
cp .env.example .env
```
Atur konfigurasi database MySQL (Laragon) di file .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_db
DB_USERNAME=root
DB_PASSWORD=
```
## 4️⃣ Generate Key
```
php artisan key:generate
```
## 5️⃣ Run Migration
```
php artisan migrate
```
---
# ⚙️ Filament Setup
## 6️⃣ Install Filament
```
composer require filament/filament:"^3.2"
```

## 7️⃣ Create Admin User
```
php artisan make:filament-user
```
## 8️⃣ Create Employee Resource
```
php artisan make:filament-resource Employee
```

## 9️⃣ Create Filament Widgets

Widget yang dibuat:

- Overview Widget (Total Pegawai)

- Chart Widget (Grafik Pegawai per Jabatan/Divisi)

- Table Widget (5 Pegawai Terbaru)

- Quick Actions Widget

Contoh command:
```
php artisan make:filament-widget EmployeeOverview
php artisan make:filament-widget EmployeeChart
php artisan make:filament-widget EmployeeLatest
php artisan make:filament-widget QuickActions
```

## 🔔 Filament Notifications

Digunakan untuk feedback:

- Pegawai berhasil ditambahkan

- Pegawai berhasil diperbarui

- Pegawai berhasil dihapus
## ▶️ Menjalankan Aplikasi (Laragon)

Karena menggunakan Laragon, aplikasi berjalan otomatis melalui virtual host.

Akses melalui:
```
http://nama-project.test/admin
```

(Jika tidak otomatis, gunakan http://localhost/nama-project/public/admin)
