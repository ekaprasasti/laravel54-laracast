# 6 Working with the query builder

- Di pertemuan sebelumnya kita telah berhasil menampilkan beberapa data.
- Kita tidak akan menuliskan data secara hardcode tapi kita akan mengambilnya melalui database.
- Perhatikan file user table pada folder `blog/database/migration`.
- Tidak seperti file tersebut kita akan membuat migration dengan manual.

1. Pada terminal jalankan perintah berikut:

```bash
php artisan
```

- perhatikan dokumentasi command make, merupakan file generator secara otomatis.

2. Buat table baru:

```bash
php artisan make:migration create_task_table
``` 

- create_task_table merupakan nama class dari table tasks.
- Maka akan di buatkan sebuat file baru di dalam folder `blog/database/migration/`.
- Setelah itu delete file, kita akan mengulanginya dengan menambahkan perintah `--create=tasks`.

```bash
php artisan make:migration create_task_table --create=tasks
```

- Jika muncul error, jalankan perintah berikut dan ulangi kembali perintah di atas:

```bash
composer dump-autoload
```

- Karena menggunakan perintah `create=tasks`, maka di buatkan schema:

```php
Schema::create('tasks', function(Blueprint $table){
	$table->increament('id');
	$table->timestamp();
});
```

3. Kita bisa menambahkan field baru pada schema, tambahkan kode berikut pada schema:

```php
$table->integer('user_id');
$table->text('body');
```

- Untuk menginstall field baru yang sudah kita tambahkan pada schema, gunakan perintah berikut di terminal:

```bash
php artisan migrate
```

4. Kita ingin menghapus field `user_id`, kita tidak membutuhkannya karena sudah ada field `id` di setiap kolom.
- Hapus `$table->integer('user_id')` pada schema.
- Pada terminal jalankan perintah berikut:

```bash
php artisan migrate:refresh
```

5. Pada table tasks, buat 2 buah data langsung pada sequel pro.
- data pertama, body: go to save, created_at: NOW(), update_at: NOW()
- data kedua, body: finish screenshot, created_at: NOW(), update_at: NOW()

6. Tampilkan di view
- Buka web.php di route `/`

```php
Route::get('/', function(){
	$tasks = DB::table('tasks')->get();
	// return $tasks;
	// jika kita hanya mereturnnya seperti kode diatas, data hanya akan menampilkan format json.

	return view('welcome', compact('task'));
});
```

- Task sekarang adalah collection dari object, maka kita harus edit view di  `welcome.blade.php`:

```html
<li>{{ $task->body }}</li>
```

- Coba tambahkan data baru pada database, body: clean the house, maka ketika browser di refresh akan muncul data yang baru kita tambahkan.

7. Buat route baru untuk mencoba query builder yang lain:

```php
Route::get('/tasks/{ task }', function($id){
	dd($id) // helper dari laravel untuk debugging, dan mengabaikan kode di bawahnya.
});
```

- Kita belajar bagaimana melewatkan parameter pada url, jika kita akses browser `blog.dev/tasks/3`, browser akan menampilkan "3".

8. Sekarang kita akan mengambil data tasks dengan parameter id
- Edit route `tasks` menjadi seperti ini:

```php
Route::get('/tasks/{ task }', function($id){
	$task=DB::table('tasks')->find($id);
	dd($task);
});
```

- Refresh browser, jika kita akses url `blog.dev/tasks/3`, maka akan di tampilkan property table tasks dengan id 3.

9. Return routes dengan view yang berbeda
- Pada route `/tasks/{ task }`, return pada view `show`.

```php
return view('tasks/show', compact('task'));
```

- Kode di atas artinya mengakses view `blog/resources/views/tasks/show.blade.php`.
- Selain akses view menggunakan `tasks/show` bisa juga menggunakan `tasks.show`.

10. Buat file `blog/resources/view/tasks/show.blade.php`.
- Edit file `show.blade.php`

```html
<h1>{{ $task->body }}</h1>
```

11. Edit route `/` menjadi seperti berikut:

```php
Route::get('/tasks', function(){
	$tasks = DB::table('tasks')->latest()->get();
	return view('tasks.index', compact('tasks'));
});
```

12. Buat file `blog/resources/views/tasks/index.blade.php`, dan paste isi dari file `welcome.blade.php`.

13. Url `blod.dev/tasks` untuk menampilkan semua data, url `blog.dev/tasks/{task}` untuk menampilkan data pada parameter tertentu.

14. Buat link pada tiap data pada `index.blade.php`:

```html
<li>
	<a href="/tasks/{{ $task->id }}" >
		{{ $task->body }}
	</a>
</li>
```
