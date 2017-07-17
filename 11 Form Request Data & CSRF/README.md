# 11. Form Request Data & CSRF

- Untuk tutorial lengkap dapat di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/11)

1. Buka blog template di https://v4-alpha.getbootstrap.com/examples/blog

2. Cara yang sama dengan tutorial bagian 10, masukan template bootstrap blog ke template project.
-  Pastekan di `resources/views/layouts/master.blade.php`.
	- Replace path link bootsrap css dan js dengan source dari cdn.
	- Copy code blog css dari template bootstrap ke `public/cs/blog.css`.
- Cut paste kode navigasi ke file `resources/views/layouts/nav.blade.php`.
- Di dalam content row terdapat 2 kolom, yaitu blog dan sidebar.
	- Cut paste kode konten ke file `resources/views/posts/index.blade.php`.
	- Cut paste kode sidebar ke file `resource/views/layouts/sidebar.blade.php`. Replace dengan `@include('layout.sidebar')`
- Cut copy bagian footer ke file `footer.blade.php`.

3. Kita membutuhkan form untuk membuat post blog.
- buat route untuk form, sebelumnya commenting terlebih dahulu route `/posts/{post}`:

```php
Route::get('/posts/create', 'PostsController@create');
```

- Buat function di class `PostsController`:

```php
public function create(){
	return view ('posts.create');
}
```

- Buat file `posts/create.blade.php`, dan masukan kode berikut:

```php
@extends('layouts.master')
@section ('content')
	<div class="col-sm-8 blog-main">
		<h1>Create a post</h1>
	</div>
@endsection
```

4. Buka link https://getbootstrap.com/css/#forms
- Copy contoh form yang paling atas ke file `create.blade.php` di bawah heading.
- Tambah tag `<hr>` di bawah heading.
- Edit form menjadi seperti berikut:

```html
<div class="col-sm-8 blog-main">
  <h1>Create a post</h1>
  <hr>
  <form method="post" action="/posts" >
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea type="text" class="form-control" id="body" name="body"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Publish</button>
  </form>
</div>
```

5. Refrence action url:

```
GET /posts
GET /posts/create
POST /posts
GET /posts/{id}/edit
GET /posts/{id}
GET /posts/{id}
PATCH /posts/{id}
DELETE /posts/{id}
```

6. Buat route posts `/posts` di `routes/web.php`:

```php
Route::post('/posts', 'PostsController@store');
```

7. Tips generate controller dengan method CRUD di dalamnya gunakan `-r`.
- Contoh, ini hanya contoh tidak perlu di tambahkan ke project

```bash
php artisan make:controller TasksController -r
```

8. Buat function store di class `PostsController`:

```php
public function store() {
	dd(request()->all())
	// create a new post using the request data
	// save it to the database
	// and then redirect to the home page	
}
```

- Jika kita post form maka akan muncul error:
```
"TokenMismatchException in VerifyCsrfToken.php"
```

9. Apa itu CSRF?
- Lihat pengertiannya di dokumentasi: https://laravel.com/docs/5.3/csrf
- CSRF (cross-site request forgery) attack.
- Laravel secara otomatis men-generate CSRF token di setiap session.
- Dibawah tag `<form="POST" action="/posts">`, sisipkan kode berikut:

```php
{{ CSRF_field }}
```

- Jika kita lihat pada inspect sourcecode laravel membuatkan input hidden, dengan value kode token.
- Value token akan di compare oleh laravel disetiap session.
- Coba lagi post blog, sekarang sudah tidak muncul error dan di tampilkan data yang kita submit.

10. Simpan ke database.
- Di bawah baris kode `use Illuminate\HTTP\Request;` tambahkan kode berikut:

```php
use App\Post;
```

- Edit function store pada class `PostController` menjadi seperti berikut:

```php
public function store(){
	// dd(request()->all());
	// create a new post using the request data
	$post = new Post;
	$post->title = request('title');
	$post->body = request('body');

	// save it to the database
	$post->save();

 	// and than redirect to the home page
	return redirect('/');
}
```

- Input kembali blog dan periksa apakah datanya sudah berhasil di simpan dengan laravel shell:

```bash
php artisan tinker
App\Post::all();
```

11. Kita bisa mengganti kode create new post dan save menjadi lebih sederhana, yaitu:

```php
Post::create([
	'title' => request('title'),
	'body' => request('body')
]);
```

- Atau dengan cara seperti ini:

```php
Post::create(request(['title', 'body']));
```

- Jika tanpa validasi form, kita bisa menggunakan kode berikut:

```php
Post::create(request()->all());
```


