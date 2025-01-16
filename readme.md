
#  Website Rekapitulasi Nilai

Dokumentasi ini dibuat bertujuan untuk memudahkan developer dalam melakukan installasi project Rekapitulasi Nilai yang berbasis Codeigniter 3.




![Logo](https://i.postimg.cc/FFqn6Bv0/wp11840910-frieren-wallpapers-1.jpg)


## Requirements

- PHP versi 7.4 atau lebih tinggi
- Composer versi terbaru
- Database (MySQL)




## Installation

#### Clone the project

```bash
  git clone -b backend-dev https://github.com/NicoIzumi30/rekapitulasi-nilai.git
```
#### Go to the project directory
```bash
  cd rekapitulasi-nilai
```
#### Install dependencies
```bash
  composer install
```

#### Configuration Database
Edit `.application/config/database.php` file and set your database configuration

Example:
```bash
'hostname' => 'localhost',
'username' => 'username_anda',
'password' => 'password_anda',
'database' => 'nama_database_anda',
```

## Run Project
```bash
  php -S localhost:3000
```
