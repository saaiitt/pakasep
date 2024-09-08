<h2>PERUBAHAN YANG HARUS DI LAKUKAN</h2>
1. Gunakan Xampp atau laragon atau yang lainya yang suport min PHP 7 max PHP 8.0<br>
2. Kemudian buka folder application - config<br>
3. Buka file config.php<br>
4. Rubah bagian $config['base_url'] = 'http://nama-folder.test/';<br>
5. bagian http://nama-folder.test/ sesuaikan dengan url masing masing<br>

<h2>CONTOH</h2>
Jika menggunakan XAMPP biasanya link http://localhost/nama_folder_project<br>
jadi dirubah menjadi $config['base_url'] = 'http://localhost/nama-folder/';
