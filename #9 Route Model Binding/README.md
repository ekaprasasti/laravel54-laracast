# 9. Route Model Binding

Untuk tutorial lengkap bisa di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/9)

- Pada route `/tasks/{task}` kita mempunyai `{task}` yang bertugas secara spesifik menampilkan/mengambil parameter id dari url.
- Pada controller Task di method `show($id)` kita mempassing id untuk menemukan data yang cocok dengan id tersebut.

1. Jika kita me-return variabel `$task` secara direct maka akan mengembalikan data json.

```php
return $task;
```

2. Hapus `$task = Task::find($id)` menjadi seperti ini:

```php
show(Task $task)
```

- Ini yang di sebut route model binding

3. Jika di refresh hasilnya tetap sama.
- Pastikan nama passing di url yaitu `{task}` sama dengan nama variable di parameter function `show(Task $task)`.
- Hapus `return $task;`.
