# 15. Eloquent Relationships and Comments

- Tutorial lengkap dapat di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/15)
- Kita akan membuat fitur komentar.
- kita membutuhkan relation antara table `posts` dengan tabel `comments`.
- Setiap post mempunyai 1 atau lebih komentar.
- Dengan kata lain bisa di sebut seperti ini

```
"post has many comment"
```

- Juga kebalikannya hubungan antara comment dengan post

```
"comment belong to post"
```

1. Buat model & migration Comment.
- Ketik perintah berikut pada terminal:

```bash
php artisan make:model Comment -m
```

- Buka file `app/Comment.php`, hapus kode berikut:

```php
use Illmuate\Database\Eloquent\Model;
```

2. Di `database/migrations/create_comments_table` buat field melalui schema dengan kode berikut:

```php
$table->integer('post_id');
$table->stirng('body');
```

- Buka terminal dan jalankan perintah berikut:

```bash
php artisan migrate
```

3. Buka sequel pro dan refresh, sekarang sudah di tambahkan tabel `comments`.
- Pada sequel pro, tambahkan comment pada body & post id di isi 6.
- Tambahkan sekali lagi komentar seperti langkah di atas, sehingga sekarng kita mempunyai 2 komen yang berelasi dengan post yang ber-id 6.

4. Deklarasi relation di setiap model.
- Buka file `app/Post.php`.
- Tambahkan function comments seperti berikut ini:

```php
public function comments(){
	return $this->hasMany(Comment::class);
}
```

- Buka laravel shell pada terminal:

```bash
php artisan tinker
$post = App\Post::find(6);
$post->comments;
```

- Jika relation berhasil kita akan melihat data yang berelasi satu sama lain.
- Coba buka relation yang tidak ada datanya:

```bash
php artisan tinker
$post = App\Post::find(3);
$post->comments;
```

- Hanya menampilkan array kosong, karena saat ini post dengan id 3 belum mempunyai komentar.

5. Bagaimana dengan kebalikannya, kita akan setting comment yang berelasi dengan post.
- Buka file `app/comment.php`.
- Tambahkan function post, seperti berikut:

```php
public function post(){
	return $this->belongsTo(Post::class);
}
```

- Buka laravel shell melalui terminal:

```bash
php artisan tinker
$c = App\Comment::first();
$c->post;
```

- Sekarang kita dapat melihat data relasi ntara comment dengan post.	

6. Edit layout untuk menampilkan komentar.
- Buka file `show.blade.php`.
- Di bawah kode `{{ $post->body }}` tambahkan kode berikut:

```html
<div class="comments">
	@foreach ($post->comments as $comment)
		<article>
			{{ $comment->body }}
		</article>
	@endforeach
</div>
```

- Styling komentar menjadi seperti ini:

```html
<div class="comments">
	<ul class="list-group">
	@foreach ($post->comments as $comment)
		<li class="list-group-item">
			{{ $comment->body }}
		</li>
	@endforeach
	</ul>
</div>
```

- Tambahkan history waktu di dalam looping di dalam tag `<li>`.

```html
<strong>
	{{ $comment->created_at->diffForHumans() }} &nbsp;
</strong>
```

7. Coba dengan menambahkan data komentar baru di sequel pro dengan `post_id` sama dengan 1.

8. Catatan pribadi:
- Dikarenakan tutorial ini pada `app/Comment.php` menghapus bagian `use Illuminate\..` dan di eksekusi membuat error, jadi saya flashback ke tutorial nomer 11 dan mengganti schema save di Controller Posts pada function store. Serta membuat secara manual file `app/Model.php`.
