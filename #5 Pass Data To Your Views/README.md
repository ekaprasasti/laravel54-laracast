# 5. Pass Data to Your Views

Tutorial lengkap lihat [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/5)

Review:
- Install latest PHP version 7.1
- Install nginx
- Laravel valet
- Mysql setup
- Sequel Pro
- Install composer

1. Edit `welcome.blade.php`
- Buka file `blog/resources/views/welcome.blade.php` dan edit menjadi seperti berikut:

```php
<h1>Hello, <?= $name; ?></h1>
```

- Jika di akses akan muncul error `undevined variable name`.

2. Edit `web.php`
- Untuk membuatnya tidak error, kita edit file `blog/routes/web.php`, dan edit routes menjadi seperti ini:

```php
Route::get('/', function(){
	return view('welcome', [
		'name' => 'world'
	]);
});
``` 

- Passing variabel cara ke 2:

```php
Route::get('/', function(){
	return view('welcome')->with('name', 'world');
});
``` 

- Passing variabel cara ke 3:

```php
Route::get('/', function(){
	$name = 'eka';
	return view('welcome', ['name' => $name]);
});
```

- Passing variabel cara ke 4:

```php
Route::get('/', function(){
	$name = 'prasasti';
	return view('welcome', compact('name'));
});
```

3. Passing array variabel
- Array bisa kita definisikan terlebih dahulu atau bisa dari database atau di panggil dari API

```php
Route::get('/', function(){
	$tasks = [
		'go to the store',
		'finish my screencast',
		'clean the house'
	];
});
```

- Edit file `welcome.blade.php` untuk menampilkan array:

```php
<ul>
	<?php foreach ($tasks as $task); ?>
		<li><?= $task ?></li>
	<?php endforeach; ?>
</ul>
```

4. Blade
- Blade merupakan laravel templating engine.
- Kita bisa menggunakan helper seperti berikut:

```php
@foreach ($tasks as $task)
	<li> {{ $task }}  </li>
@endforeach
```
