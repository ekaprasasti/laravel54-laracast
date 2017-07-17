# 12. Form Validation 101

- Tutorial lengkap dapat di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/12)
- Jika form tidak di isi apa2 dan di submit, maka akan terjadi error.
- Kita akan melakukan protection pada form.

1. Ada beberapa yang bisa kita lakukan salah satunya dengan menggunakan validation dari HTML5.
- Caranya dengan menambahkan attribute `required` pada tag input.
- Setiap browser menampilkan styling validation yang berbeda.

2. Kita tidak menggunakan client side validation, tapi kita menggunakan server side validation pada laravel.
- Pada function store di class `PostsController`, sebelum kita menyimpan data, validasi terlebih dahulu dengan kode berikut:

```php
$this->validate(request(), [
	'title' => 'required',
	'body' => 'required'
]);
``` 

- Refresh browser, jika di submit tanpa input maka tidak terjadi apa2/tidak tersimpan.
- Dengan kata lain jika error maka akan ter-redirect ke form inputan.

3. Kita akan menampilkan error status pada browser, buka file `create.blade.php` dan tambahkan kode berikut setlah tag form:

```html
<div class="alert alert-danger>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
```

- Jika kita submit form tanpa input akan muncul status error di browser.
- Edit notif validation dengan memasukannya di dalam tag form dengan di wrap class `form-group`.
- Tambahkan condition agar alert box tidak selalu muncul:

```html
@if (count(erros))
	<div class="form-group">
		<div class="alert alert-danger">
			...
		</div>
	</div>
@endif
```

- Pada button tambahkan form group:

```html
<div class="form-group">
	<button>...</button>
</div>
```

4. Kita tidak menulis kode berulang pada setiap form.
- cut kode validasi dan ganti dengan kode berikut:

```php
@include('layouts.errors')
```

- Buat file `errors.blade.php` di dalam folder layout.
- Pastekan kode notif validation di file tersebut.
