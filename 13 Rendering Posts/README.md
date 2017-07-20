# 13. Rendering Posts

- Untuk tutorial lengkap dapat di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/13)
- Kita sudah mempunyai posting pada database, sekarang kita akan menampilkannya pada aplikasi.

1. Buka file `app/Http/controllers/PostController.php` pada function index edit kodenya menjadi seperti berikut:

```php
$posts = Post::all();
return view('posts.index', compact('posts'));
```

- View akan mengakses semua collection dari `$posts`.

2. Buka view `index.blade.php`.
- Hapus blog kedua dan seterusnya.
- Cut blog pertama, dan ganti kodenya menjadi seperti berikut:

```php
@include('posts.post');
```

- Buat view `post.blade.php` di foleder posts.
- Pastekan blog pertama di sini.
- Refresh browser, dan lihat hasilnya tidak ada yang berubah.

3. Kita akan membuatnya menjadi dynamic.i
- Ganti title blog dengan:

```html
<h1 class="blog-post-title"> {{ $post->title }} </h1>
```

- Jika di refresh akan terjadi error, karena kita belum melakukan looping pada data collection
- Kembali ke file `index.blade.php`, dan buat perulangan seperti berikut:

```php
@foreach ($posts as $post)
	@include ('posts.post')
@endforech
``` 

- Refresh browser, sekarang kita telah melihat title yang di ambil dari browser
- Delete paragraf article body dan ganti dengan kode berikut:

```html
{{ $post->body }}
```

- Refresh browser.
- Hapus nama author di samping tanggal.
- Buat tanggal menjadi dynamic dengan kode berikut:

```html
<p class="blog-post-meta">
	{{ $post->created_at }}
</p>
```

- Format tanggal masih kacau, kita akan memperbaikinya dengan library bawaan dari laravel yang bernama carbon, lihat dokumentasinya [di sini](http://carbon.nesbot.com/docs).
- Ganti format tanggal dengan kode berikut:

```html
{{ $post->created_at->toFormattedDateString() }}
```

- Buat supaya judul bisa di klik:

```html
<a href="/posts/{{ $post->id }}">
	{{ $post->title }}
</a>
```

- Uncomment route `/posts/{post}` di file `routes/web.php`.

4. Edit file `show.blade.php`.

```html
<div class="col-sm-8 blog-main">
	<h1>{{ $post->title }}</h1>
	{{ $post->body }}
</div>
```

- Refresh browser dan masih ada error, buka controller posts di function show, edit menjadi seperti ini:

```php
public function show($id){
	$post = Post::find($id);
	return view('posts.show', compact('post'));
}
```

- Refresh sekali lagi, saat ini aplikasi sudah tidak error.
- Selain dengan cara kode di atas, bisa juga menggunakan cara yang lebih sederhana, seperti kode berikut ini:

```php
public function show(Post $post){
	return view('posts.show', compact('post'));
}
```

- Refresh browser, dan create posting baru.

5. Kita lihat post paling baru berada di bawah, kita harus melakukan order pada list post agar posting terbaru berada di daftar paling atas.
- Di controller post pada function index edit variabel post menjadi seperti berikut:

```php
$posts = Post::latest()->get();
```

- Atau bisa juga dengan cara yang agak sedikit panjang:

```php
$posts = Post::orderBy('created_at', 'desc')->get();
```
