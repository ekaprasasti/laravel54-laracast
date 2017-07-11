# 1. Laravel Installation and Composer

Author: Jeffery Way, tutorial dapat di akses [di sini](https://laracasts.com/series/laravel-from-scratch-2017/episodes/1)

1. Untuk installasi buka dokumentasi official dari laravel [di sini](https://laravel.com/docs/5.4#installation)
- Requirement: PHP >= 5.6.4 (dirokemndasikan PHP 7.1)

2. Composer Install
- Kunjungin [getcomposer.org](https://getcomposer.org/)
- Composer adalah basic dependency manager dari PHP, semua yang kita butuhkan ada di sini. Sama seperti npm pada nodejs.
- Download, pandual lengkap ada [di sini](https://getcomposer.org/download/)
	- copy code berikut di temrinal dan tekan enter:

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

- Pada kasus, akan muncul error seperti ini:

![composer install error](/assets/composer-install-error.png)

3. Composer Getting Started
- Untuk dokomentasi lengkap lihat [di sini](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
- Install secara global
- Pindahkan file `composer.phar`

```bash
mv composer.phar /usr/local/bin/composer
```

- Ketik `composer` pada terminal, jika muncul dokumentasi dari command composer maka kita telah berhasil menginstalnya.

3. Buat project laravel baru pada terminal
- Ada dua cara, dengan `laravel new app` atau dengan composer `composer create-project --prefer-dist laravel/laravel blog`
- Direkomendasikan menggunakan `laravel new app`, maka kita harus menginstall command global laravel. Buka terminal ketikan perintah berikut:

```bash
composer global require "laravel/installer"
```

4. Laravel global adalah package dari composer, kalo mau lihat package lainnya di [packagist.org](https://packagist.org/).

5. Pastikan path composer berada pada `$HOME/.composer/vendor/path`.
- Cara pertama pada file `~/.bashrc` masukan `export PATH="$HOME/.composer/vendor/bin:$PATH`
- Atau jika kita menggunakan `zsh` buka file `~/.zshrc` masukan kode berikut

```bash
export PATH=$HOME/bin:/usr/local/bin:~/.composer/vendor/bin:$PATH
```

6. PHP Artisan, adalah laravel command line utility
- check terminal dengan command berikut:

```bash
php artisan -v
```

7. Buat project dengan development environment

```bash
laravel new blog --dev
```
