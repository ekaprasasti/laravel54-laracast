# 16. Add Comments

- Tutorial lengkap dapat di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/16)
- Pada tutorial sebelumnya kita memasukan comment secara manual di sequel pro, kali ini kita akan membuat form untuk mengirim comment ke database.

1. Buka file `show.blade.php`, di bawah div class comment buat form comment seperti berikut:

```html
{{-- Add a Comment --}}
<hr>

<div class="card">
	<div class="card-block">
		<form>
			<div class="form-group">
				<textarea name="body" placeholder="your comment here" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">add comment</button>
			</div>	
		</form>
	</div>
</div
```

- Edit form method seperti berikut:

```html
<form method="POST" action="/posts/{{ $post->id }}/comments">
```


2. Buat route post di `Route/web.php` seperti berikut:

```php
Route::post('/posts/{post}/comments', 'CommentsController@store');
```

- Buat controller comment di terminal:

```bash
php artisan make:controller CommentsController
```

3. Buka file `App/Http/CommentsController.php`
- Hapus `use Illuminate\..` menjadi seperti berikut:

```php
use App\Post;
use App\Comment;
``` 

- Buat function store pada class comment controller:

```php
public function store(Post $post){
	Comment::create([
		'body' => request('body'),
		'post_id' => $post->id
	]);

	return back();
}
```

4. Refresh browser, submit form maka akan error, karena kita tidak mensetting token pada form.
- Buka file `show.blade.php`.
- Dibawah tag `<form>` tambahkan kode berikut:

```
{{ csrf_field() }}
```

- Refresh browser dan submit ulang form.
-  Comment telah berhasil di simpan, tetapi tidak ada flash message pemberitahuan bahwa komentar telah berhasil tersimpan.

5. Kita akan meminahkan logic penyimpanan ke dalam model.
- Buka comment controller pada function store, edit menjadi seperti ini:

```php
public function store(Post $post){
	Comment::create([
		'body' => $body,
		'post_id' => $this->id
	]);
}
```

- Refresh browser, dan coba submit kembali comment baru.

6. Atau ada yang lebih sederhana lagi dengan memanfaatkan relasi dari function comment.
- Buka file `App/Posts.php`, edit function `addComment` menjadi seperti ini:

```php
public function addComment($body){
	$this->comments()->create(compact('body'));
}
```

- Refresh browser dan coba submit ulang.

7. Buat validasi di form comment.
- Di dalam function store pada comment controller, tambahkan kode berikut:

```php
$this->validate(request(), ['body' => 'required | min:2']);
```

8. Buat flash notifikasi.
- Buka file `show.blade.php` tambahkan kode berikut di bawah form comment:

```php
@include(layouts.errors)
```
