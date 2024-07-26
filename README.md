# Gampil Framework
Gampil Framework adalah sebuah framework dengan struktur MVC yang sederhana dan ringan

## Fitur-Fitur

- Proses routing yang cepat
- `Pring` View Compiler
- Query Builder dalam class `Model` yang sederhana
- Request validation dengan `RequestHandler`
- Ukuran yang kecil tapi memiliki fitur yang lebih dari cukup

## Instalasi

1. Pastikan anda telah menginstal `composer`, jika belum maka anda harus menginstal composer terlebih dahulu di [getcomposer.org](https://getcomposer.org/download)
2. instal `Gampil Framework` lewat `composer` dengan menjalankan :<br> `composer create-project gampil/gampil`
3. Tunggu sampai instalasi selesai dan `Gampil Framework` siap digunakan

## Contoh Tampilan Kode

```php
# app/routes.php
# Pendefinisian route

return [
  # format = '/route-name' => ['controller:method', 'REQUEST_METHOD'] (default `REQUEST_METHOD` = 'GET')
  '/' => ['main:home'],
  '/register' => ['user:register-view'],
  '/register-user' => ['user:register-user', 'POST']
  '/view-user/{username}' => ['user:view-user']# route parameter juga didukung
]
```

```html
...
<!-- `Pring View Compiler` -->
<form action='/foo' method='post'>
  #csrf <!-- (tambahkan #csrf di setiap form yang memiliki method='post' untuk menangani CSRF) -->
  #method('PUT') <!-- (`method overriding`, pastikan bahwa method dari form adalah 'post') -->
  <input type='text' name='bar'>
  <button type='submit'>Submit</button>
</form>
{{ echo statement (dengan `htmlspecialchars`) }}
{ echo statement (tanpa `htmlspecialchars`)}
<!-- dan lain-lain... -->

...

```

```php
$user_model = new \models\user;
$user_model->all(); # mendapatkan seluruh user
$user_model->insert([...]) # menambahkan data
$user1 = $user_model->where('username', 'Hengker')->get(true); # mendapatkan satu user
$user_model->id(1)->update([...]]); # update data
$user_model->id(2)->delete(); #menghapus data

$user1->id;# menggunakan class(model itu sendiri) dan properti
$user1->profile->bio;# relationship juga didukung :)

```

Dokumentasi belum dipersiapkan, saya mohon maaf sebesar-besarnya
