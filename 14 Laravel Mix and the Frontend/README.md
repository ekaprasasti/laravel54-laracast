# 14. Laravel Mix and the Frontend

- Untuk tutorial lengkap dapat di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/14)
- Kita telah belajar basic fundamentall dari laravel, sekarang kita akan focus ke frontend, yaitu sass/lass dan javascript.

1. Buka file `resources/assets/sass/app.scss`.
- Delete semua kode di file tersebut.
- Ganti kode dengan kode berikut:

```css
body {
	background: blue;
}
```

2. Kita akan mereferensikan file di atas dengan build tool yang bernama webpack
- Buka file `webpack.min.js`
- Laravel menyediakan library yang bernama `laravel-mix` yang berguna sebagai configuration layer.
- Laravel mengcompile file js ke `public/js/` begitu juga untuk file scss.

3. Install laravel mix dengan nodejs
- Install nodejs & npm.
- jalankan perintah `npm install`.

4. Untuk mengcompile webpack, jalankan `npm run dev`.
- Untuk detail apa saja yang di jalankan dengan perintah ini adalah dengan membuka file `package.josn` pada `srcipt`.
- Periksa filenya apakah sudah di compile di `public/css` dan `public/js`.

5. Copy kode dari file `blog.css` dan delete filenya.
- Hapus kode pada `resources/assets/sass/app.scss` dan paste kode `blog.css` di file tersebut.
- Jalankan kembali `npm run dev"
- Buka file `master.blade.php` dan edit link `blog.css` menjadi seperti ini:

```html
<link href="/css/app.css">
```

- Refresh browser dan tidak ada yang berubah, tapi sekarang kita menggunakan sass.

6. Dari pada menggunakan `npm run dev` setiap kali ada perubahan, kita gunakan `npm run watch` jika ada perubahan kita hanya tinggal merfresh nya.
6. Pada file `resources/assets/js/app.js` kita merender view component yang tersimpan di `resources/assets/js/components/Example.vue`.
- Jika kita tidak memakai vue, kita bisa menghapus semua kode di `app.js`.

