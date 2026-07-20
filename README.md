# Aplikasi Manajemen Anggota Koperasi

Sistem informasi manajemen anggota koperasi berbasis web dengan 3 peran: Super Admin, FO (Front Office), dan Anggota.

## Fitur Utama

- Login & Register dengan role-based access
- Super Admin: CRUD data FO
- FO: CRUD data anggota (termasuk generate nomor anggota otomatis KOP-000X)
- Anggota: Edit profil sendiri (alamat, no telepon, password)
- Dashboard statistik (total FO, total anggota)
- Pencarian & pagination data anggota
- Export data anggota ke Excel
- Dark/Light mode
- Sidebar collapse
- Responsive mobile

## Teknologi

- Laravel 10
- Bootstrap 5
- MySQL
- Laravel Breeze (authentication)
- Font Awesome 6
- maatwebsite/excel

## Cara Instalasi

### 1. Clone Repository

git clone https://github.com/ammarFir/kop-app.git
cd kop-app

### 2. Install Dependencies PHP

composer install

### 3. Install Dependencies Node.js

npm install
npm run build

### 4. Setup Environment

cp .env.example .env
Edit file .env dan sesuaikan konfigurasi database:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kop_db
DB_USERNAME=root
DB_PASSWORD=

### 5. Generate Key

php artisan key:generate

### 6. Jalankan Migrasi & Seeder

php artisan migrate --seed
Seeder akan membuat akun default:
Super Admin: admin@kop.com / password
FO: fo@kop.com / password
Anggota: budi@email.com / password

### 7. Jalankan Aplikasi

php artisan serve
Buka http://127.0.0.1:8000
