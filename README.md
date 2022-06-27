# REST API Penjualan Kendaraan

## Install laravel versi 8 dan package mongodb

Unduh laravel versi 8
```
composer create-project laravel/laravel:^8.0 rest-api-penjualan-kendaraan
```

Install Package Laravel Mongodb sesuai versi laravel yang diinstal. [(Daftar package dan versi laravel)](https://github.com/jenssegers/laravel-mongodb#laravel)
```
composer require jenssegers/mongodb 3.8.x
```
Pada folder `config/app.php` tambahkan service provider :
```
Jenssegers\Mongodb\MongodbServiceProvider::class,
```
Ubah konfigurasi database pada folder `config/database.php`. Ubah default koneksi database menjadi `'mongodb'`
```
'default' => env('DB_CONNECTION', 'mongodb'),
```
Lalu tambahkan koneksi baru untuk `mongodb`
```
'mongodb' => [
            'driver' => 'mongodb',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', 27017),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'options' => [
                'database' => env('DB_AUTHENTICATION_DATABASE', 'admin'),
            ],
        ],
```
Ubah konfigurasi database pada file `.env`
```
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=rest_api_penjualan_kendaraan
DB_USERNAME=
DB_PASSWORD=
```

## Buat model baru
Buka terminal dan buat sebuah model dengan nama `Model`
```
php artisan make:model Model
```
Buka file `Model.php ` yang ada di folder `app/Models/` dan ubah seperti berikut :
```
<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected $guarded = [];
}
```
