# 4. Database Setup and Sequel Pro

1. Buka mysql pada terminal:

```bash
mysql -u root -p
```

2. Buat database blog

```bash
create database blog
```

3. Bukan file `.env` pada project
- Di file tersebut terdapat semua informasi yang terkait dengan database, juga di gunakan untuk menyimpan informasi dari data yang sensitif, seperti token, dan lain-lain.
- Ganti value DB_DATABASE dengan blog.
- Ganti value DB_USERNAME dan DB_PASSWORD di sesuaikan dengan username dan password pada konfigurasi mysql kita.

4. PHP artisan migrate
- Di folder project pada terminal ketikan perintah berikut:

```bash
php artisan migrate
```

- Maka akan di buatkan secara otomatis schema dan table yang di butuhkan.

5. Lihat hasilnya di mysql
- Kembali di terminal masuk pada mysql dan jalankan perintah berikut:

```bash
use blog
show tables
```

- Sekarang sudah ada tiga table yaitu:
	- Migration
	- password_resets
	- Users
- Lihat pada directory project `blog/databasemigration/`
	- Terlihat file konfigurasi project dengan database kita.

6. Selamat sekarang database anda sudah terkoneksi dengan database.
- Coba lihat di GUI mysql seperti Sequel Pro
