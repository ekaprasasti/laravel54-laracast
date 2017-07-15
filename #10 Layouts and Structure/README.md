# 10. Layouts and Structure

Untuk tutorial lengkapnya dapat di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/10). Kali ini kita akan menginstall project laravel baru, hapus project directory `blog` dan buat project baru dengan perintah berikut:

```bash
laravel new blog
```

- Tutorial kali ini kita akan belajar layout laravel menggunakan blade.
- Layout berisikan kumpulan dari tag html.
- Saat ini, jika kita ingin menggunakan eksternal source css atau javascript kita menggunakan tag link/script di semua file yang membutuhkannya.
- Pada layout laravel kita hanya mendefinisikan css atau javascript hanya sekali dan dapat di gunakan di semua file yang membutuhkannya.

1. Buat file di `resources/views/layout.blade.php`
- File ini merupakan wrapping html yang selanjutnya akan kita gunakan sebagai individual views.
- Masukan kode berikut:

```html
<!DOCTYPE html>
<html>
	<head>
		<title>My Application</title>
	</head>
	<body>
		@yield('content')
	</body>
</html>
```

- Kode `@yield('content')`, merupakan spesifik konten ari setiap page yang akan di tampilkan seakan di pastekan kodenya disini.

2. Buka file `routes/web.php` 
- Hapus semua baris kode, dan buat route baru seperti di bawah ini:

```php
Route::get('/', 'PostsController@index');
```

- Kita akan menghubungkan route ini dengan:
	- controller, PostsController => Plural
	- eloquent model, Post => singular
	- migration, create_posts_table

3. Cara membuat konfigurasi di atas ada 2
- Cara pertama:

```bash
php artisan make:controller PostsController
php artisan make:model Post
php artisan make:migration create_posts_table --create=posts
```

- Cara kedua:

```bash
php artisan make:model Post -mc
```

- Khusus jika menggunakan cara kedua, rename `PostController.php` menjadi plural untuk mengikuti naming convention `PostsController.php`, jangan lupa rename nama classnya juga.
- Di migrate `create_post_table` tambahkan schema berikut:

```php
$table->string('title');
$table->text('body');
```

4. Di class controller posts tambahkan function index:

```php
public function index(){
	return view('posts.index');
}
```

- Buat file `resources/views/posts/index.blade.php`, dan masukan kode berikut:

```php
@extends('layout')
@section('content')
	blablabla
@endsection
```

5. Buka getbootstrap.com
- Ambil sourcecode dari layout example album (bootstrap 4)
- Copy paste di `layout.blade.php` 
- Hapus file javascript yang ada di dalam body
- Paste css bootstrap dari cdn di head

6. Buat file `public/css/album.css`
- Copy source codenya https://v4-alpha.getbootstrap.com/examples/album/album.css
- Di `layout.blade.php` edit path link cssnya menjadi `/css/album.css`.

7. Cut navigasi & ganti codenya dengan `@include('layouts.nav')`
- Buat file `resources/views/layouts/nav.blade.php`
- Pastekan kodenya di file tersebut.

8. Buat cara yang sama untuk footer
- Buat file `resources/views/layouts/footer.blade.php`
- Pastekan kode footer di file tersebut.

9. Untuk content, ganti dengan:

```html
<div class="container">
	@yield('content')
</div>
```

- Lalu pastekan kode content `resources/views/posts/index.blade.php`
- Ganti header menjadi `My Blog`.

10. Buat file di `resources/views/posts/show.blade.php`

```php
@extends('layout')
@section('content')
	<h1>A place to show the post</h1>
@endsection
```

- Buatkan routenya di `routes/web.php`

```php
Route::get('/posts/{post}', 'PostsController@show');
```

- Buat function di class posts controller

```php
public function show(){
	return view('posts.show');
}
```

- Akses url `blog.dev/posts/1` pada browser.

11. Pindahkan file `layout.blade.php` ke folder `layouts` dan rename menjadi `master.blade.php`.
- Rename extends di `index.blade.php` dan `show.blade.php`.

```php
@extends('layouts.master')
```
