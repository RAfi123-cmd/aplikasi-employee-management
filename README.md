### 📘 Employee Management System – Laravel + Filament
---
## Login
<img width="1366" height="721" alt="image" src="https://github.com/user-attachments/assets/94d4c106-bd42-437d-95d9-283ed9d1e719" />

## Dashboard
<img width="1366" height="727" alt="image" src="https://github.com/user-attachments/assets/b50624ab-431d-42f7-a039-9981d80808a0" />

---
Aplikasi Manajemen Pegawai ini dibangun menggunakan Laravel v12 dan FilamentPHP v3.2, dirancang untuk mempermudah proses administrasi dan pengelolaan data pegawai.
Di dalam aplikasi ini, admin dapat melakukan autentikasi, mengakses dashboard informatif, dan mengelola data pegawai secara lengkap melalui interface yang modern dan responsif. Dashboard menyajikan rangkuman data seperti total pegawai, grafik pegawai berdasarkan jabatan, daftar 5 pegawai terbaru, serta berbagai quick action untuk mempercepat navigasi.
Sistem ini mendukung proses CRUD pegawai dengan ID unik otomatis berbasis UUID, sehingga data tercatat dengan aman, terstruktur, dan mudah dikelola.

---
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
