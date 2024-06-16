<?php

$project_path = dirname(__DIR__).'/';

return [
  'root_path' => $project_path,
  'mtc-message' => 'Server dalam perbaikan/pemeliharaan',
  'db_path' => $project_path.'database/database.sqlite',
  #File Upload related
  'public_storage_path' => $project_path.'public/storage/',
  'default_upload_rules' => [
    'max_size' => 10*(1024*1024),# = ~10MB
    'filter' => 'png jpg jpeg webp'# EKSTENSI file yang boleh diupload
  ],
  'page-before' => '<a href="?page={page}" style="margin: 5px; font-size: 18px;">&lt;</a>',
  'page-active' => '<a href="?page={page}" style="color:dodgerblue; margin: 5px; font-size: 18px;">{page}</a>',
  'page-normal' => '<a href="?page={page}" style="margin: 5px; font-size: 18px;">{page}</a>',
  'page-next' => '<a href="?page={page}" style="margin: 5px; font-size: 18px;">&gt;</a>',
  // 'auth' => [
  //   'model' => "\\models\\user",
  //   'columns' => [
  //     'username' => 'username',#value bisa diganti 'email' atau column lainnya yang mirip
  //     'password' => 'password'
  //   ]
  // ],
  #Other
  'faker_locale' => 'id_ID',
  'custom_validation' => [
    // contoh :
    // 'nama-validasi' => function($args) {
    //   return ['nama-validasi', (data lain untuk format 'err_msg')]; (jika ada kesalahan)
    //   return true; (jika tidak ada kesalahan)
    // }
  ],
  'err_msg' => [
    'required' => 'kolom input \'%s\' tidak boleh kosong!',
    'numeric' => 'kolom input \'%s\' harus sebuah numerik!',
    'min' => 'kolom input \'%s\' harus lebih panjang dari %d karakter',
    'max' => 'kolom input \'%s\' tidak boleh lebih panjang dari %d karakter',
    'between' => 'kolom input \'%s\' harus diantara %2$d karakter sampai %3$d karakter',
    'int' => 'kolom input \'%s\' harus sebuah bilangan bulat',
    'float' => 'kolom input \'%s\' harus sebuah bilangan desimal',
    'accepted' => 'kolom input \'%s\' harus disetujui',
    'url' => '\'%2$s\' bukanlah URL yang valid',
    'domain' => '\'%2$s\' bukanlah domain yang valid',
    'email' => '\'%2$s\' bukanlah email yang valid',
    'contains' => '\'%$2s\' tidak memiliki kata/karakter : %3$s',
    'unique' => '\'%2$s\' sudah ada, coba yang lain',
    // 'login_cred' => '\'%3$s\' atau \'%4$s\' salah, coba cek lagi', future...

    #HANYA UNTUK FILE UPLOAD, JANGAN DIPAKAI UNTUK 'REQUEST VALIDATION' SELAIN FILE
    'empty' => 'kolom input \'%s\' harus diisi',
    'too_large' => 'file \'%s\' terlalu besar, ukuran maksimal %dMB',
    'filter' => 'file \'%1$s\' bukan termasuk file: %2$s',
  ]
];
