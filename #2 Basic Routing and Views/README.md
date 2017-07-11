# 2. Basic Routing and Views 

Lihat tutorial lengkapnya [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/2)

1. Jalankan project
- Pada terminal ketikan perintah berikut ini:

```bash
php artisan serve
```

- Buka browser pada port 8000, `http://127.0.0.1:8000` atau `http://localhost:8000`.

2. Dari mana datangnya tampilan pada browser?
- Route pada laravel berada pada file `routes/web.php` pada function `get('/', callback)`.
- Tampilan atau view berada pada file `resources/views/welocome.blade.php`.
- Untuk latihan buat route `/about`. Pada file `routes/web.php` tambahkan kode berikut:

```php
Router::get('/about', function() {
	router view('about');
});
``` 

- Mengikuti *naming convention* dari laravel, beranjak dari kode `router view('about');`, kita akan membuat view dengan nama file `about.blade.php` pada folder `resources/views/welcome.blade.php`.

3. Bukan project pada browser di port 8000
- Buka link url http://localhost:8000/about
