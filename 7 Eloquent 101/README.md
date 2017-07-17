# 7 Eloquent 101

Tutorial lengkap bisa di lihat [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/7)

1. Buat model
- Model mempresentasikan sesuatu di dalam system.

```bash
php artisan make:model task
```

- Representation of task.
- Hasilnya bisa di lihat di `blog/app/task.php`.

2. Eloquent
- Active record implementation.
- Open laravel shell

```bash
php artisan tinker
```

3. Laravel shell
- Melihat semua isi database:

```bash
App\Task::all();
```

- App adalah namespace.
- Melihat data yang idnya lebih dari 2:

```bash
App\Task::where('id', '>', 2)->get();
```

- Melihat semua data field body:

```bash
App\Task::pluck('body');
```

- Melihat data body yang pertama:

```bash
App\Task::pluck('body')->first();
```

3. Kembali ke project, buka `routes/web.php`.
- Ganti route `/tasks` menjadi seperti ini:

```php
Route::get('tasks', function(){
	$tasks = App\Task::all();
	return view('tasks.index', compact('tasks'));
});
```

- Jika di refresh hasilnya tidak berubah.
- Kita mengganti query builder dengan eloquent.

4. Pada model kita bisa menambahkan method/function sebagai tambahan behaviour.
- Contoh, tambahkan function di dalam class pada model:

```php
public function isComplete(){
	return false;
}
```

- Jika kita akses pada laravel shell:

```bash
php artisan tinker
$task = App\Task::first();
$task->isComplete();
```

- Command diatas akan mengembalikan `false`.
- Setiap kali terjadi perubahan pada kode jangan lupa untuk merestart laravel shell.

5. Ganti route `/tasks/{ task }` untuk mengambil data dari parameter menjadi seperti berikut ini:

```php
Route::get('/tasks/{ task }', function($id){
	$task = App\Task::find($id);
	return view ('tasks.show)
});
```
- Refresh browser dan tidak akan terjadi perubahan
- Kita bisa hanya menggunakan `Task::find($id);` jika mengimport model terlebih dahulu dengan menambahkan kode berikut di `web.php` di baris kode paling atas.

```php
use App\Task;
```

6. Kita bisa membuat migration sekaligus model dengan kode berikut:

```bash 
php artisan make:model Task -m
```

- Sebelumnya jalankan perintah berikut:

```bash
php artisan migrate:reset
```

7. Hapus file migration dan model task, lalu jalankan command di atas.
- Jika terjadi error, jalankan perintah berikut:

```bash
composer dump-autoload
```

8. Di schema migration task tambahkan kode berikut:

```php
$table->text('body');
$table->boolean('completed');
```

- Jalankan, `php artisan migrate`.

9. Kita bisa isi field data di mysql dari laravel shell.
- Pada terminal jalankan perintah berikut:

```bash
php artisan tinker
$task = new App\Task;
$task->body = 'Go to market';
$task->complete = false;
$task->save();
```

- Buat field boolean `completed` default adalah false, pada schema:

```php
$table->boolean('completed')->default(false);
```

- Jalankan `php artisan migrate:refresh`.

10. Masukan data lagi pada database:

```bash
php artisan tinker
$task = new App\Task;
$task->body = 'Finish screencast`;
$task->save();
```

- Sekarang data telah terisi dengan field `completed` false atau `0`.
- Lihat di sequel pro, coba salah satu field `completed` diganti jadi `1`.

11. Query scopes
- Di model task `app/Task.php` di dalam class tambahkan function berikut:

```php
public function incomplete() {
	return static::where('complete', 0)->get();
}
```

- Cek di laravel shell

```bash
php artisan tinker
App\Task::incomplete();
```

- Kegunaan pemakaian scope kita bisa menggunakan query secara manual, edit model menjadi seperti berikut:

```php
public function scopeIncomplete($query) {
	return $query->where('completed', 0);
}
```

- Akses di terminal:

```bash
php artisan tinker
App\Task::Incompleted()->get();
App\Task::Incompleted()->where('id', '>=', 2)->get();
```

12. Setiap kali ada perubahan kode laravel shell harus di restart.
