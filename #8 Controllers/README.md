# 8. Controllers

Untuk tutorial lengkap dapat di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/8)

- Saat ini kita membuat logic secara langsung di route.
- Untuk project kecil ini mungkin di sarankan & lebih memudahkan, seperti project API atau statis website.
- Di controller kita akan menerima request.

1. Passing controller di routes `web.php` seperti berikut:

```php
Route::get('/tasks', 'TasksController@index');
```

- `@index` artinya mengakses method index.
- Lalu di mana menaruh controller? di app/HTTP/controllers.

2. Membuat controller dengan generator:

```php
php artisan make:controller TasksController
```

- Akan dibuatkan file `TasksController.php`.
- Di dalam class buat function `index`:

```php
public function index() {
	$tasks = Task::all();
	return view('tasks.index', compact('tasks'));
}
```

- Isi function index hasil dari paster route `/tasks` di `web.php`.
- Ganti `use Illumate\HTTP\Request;` menjadi `use App\Task;`;
- Hapus route `/tasks` yang lama.

3. Buat route untuk mengambil parameter dengan controller:

```php
Route::get('/tasks/{task}', 'TasksController@show');
```

- Buat method show di TasksController, dan caranya sama, paste logic dari route `tasks/{task}`.
- Passing id di method show menjadi `show($id)`.
