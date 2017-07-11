# 1. Laravel Installation and Composer

Author: Jeffery Way

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
