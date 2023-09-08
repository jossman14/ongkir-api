
# Implementasi Raja Ongkir API

Implementasi Raja Ongkir API paket starter untuk fetch data kota dan provinsi.

  

## Persyaratan Instalasi

  

- **PHP**: versi 8+

- **Composer**

- **Database**: MySQL

  

## Cara Instalasi

  

1. Clone repositori.

2. Buka direktori.

3. Jalankan `composer install`.

4. Salin berkas `.env.example` ke `.env` dan sesuaikan konfigurasi database.

5. Jalankan `php artisan migrate`.

6. Jalankan `php artisan db:seed` untuk menyertakan data dummy.

7. Jalankan `php artisan fetch:rajaongkir_prov_city` untuk mengambil data kota dan provinsi dari API Raja Ongkir.

8. Jalankan `php artisan jwt:secret` untuk generate key JWT pada `.env`

  

## Setting ENV

  

Pastikan Anda memiliki konfigurasi berikut di berkas `.env` Anda:

  

```makefile

RAJAONGKIR_API_KEY=<token anda>

RAJAONGKIR_API_URI=https://api.rajaongkir.com/starter/

JWT_SECRET=<key jwt>
```

## Akun Dummy

Untuk login, gunakan detail berikut:

```makefile
Email: hehe@hehe.com
Password: hehe
```


## Endpoint API

### Autentikasi

-   **Login**: `POST /login` _(Apabila gagal login sebanyak 3 kali, tunggu 30 menit sebelum mencoba kembali)_
-   **Register**: `POST /register`
-   **Logout**: `POST /logout`
-   **Refresh Token**: `POST /refresh`

### Province

-   **Cari Semua Provinsi**: `GET /search/provinces`
-   **Detail Provinsi Berdasarkan ID**: `GET /search/provinces/{id}`

### City

-   **Cari Semua Kota**: `GET /search/cities`
-   **Detail Kota Berdasarkan ID**: `GET /search/cities/{id}`
  
## Cara Testing

Untuk menjalankan unit test, gunakan perintah:

```makefile
php artisan test
```
