# 3. Laravel Valet is Your Best Friend

Untuk tutorial lengkap klik [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/3)

1. Homestead, seperti virtual machine untuk laravel. Dokumentasi lengkap klik [di sini](https://laravel.com/docs/5.4/homestead)

2. Valet, di gunakan hanyak untuk mac/OSX user. Dokumentasi lengkap klik [di sini](https://laravel.com/docs/5.4/valet)
- Tidak membutuhkan virtual machine
- Tidak membutuhkan tambahan file dengan manual
- Tidak membutuhkan setup nginx/apache/dll

3. Install Valet
- Install atau update Homebrew dengan `brew update`, mirip seperti composer pada php.
- Install PHP 7.1 menggunakan homebrew dengan `brew install homebrew/php/php71`.
- Install Valet dengan composer dengan `composer global require laravel/valet`.
	- Pastikan kita sudah mensetting path `~/.composer/vendor/bin`.
- Cek apakah valet sudah terinstall dan di kenali pada terminal dengan perintah `valet`.
- Jalankan dengan perintah `valet install`.

4. Menjalankan Valet
- coba ping dengan `ping foo.dev`.

5. Valet database setting
- Install mysql dengan `brew install mysql`.

6. Valet mempunyai 2 command yaitu `park` dan `link`
- Di rekomendasikan menggunakan `park`.
- Buat directory di `~/code`, atau di mana saja di directory yang kita inginkan project di simpan.
- Masuk ke directory tersebut dan ketikan perintah berikut:

```bash
valet park
```

- Jika di dalam folder tersebut terdapat project dengan nama folder `app`, maka buka project di browser dengan url `app.dev`

7. Valet Secure
- Masuk ke directory project dan jalankan perintah berikut:

```bash
valet secure
```

- Jalankan project di browser, sekarang aplikasi sudah di jalankan dengan mode secure menggunakan `https`.

