Responsi Praktikum PBO Teknik Komputer 2025

Nama Lengkap: Wisnu Satya Herlambang
NIM: H1H024033
Shift: A - D 

Deskripsi Proyek
Aplikasi ini adalah simulasi berbasis web untuk memantau dan melatih Pokémon Sandslash (Tipe Ground). Dibangun menggunakan PHP Native tanpa framework, proyek ini menerapkan 4 Pilar OOP (Encapsulation, Inheritance, Polymorphism, Abstraction) untuk mensimulasikan logika training.

Fitur Utama:
1.  Dashboard Interaktif: Menampilkan kartu Pokémon yang memuat statistik dan Full Art visual.
2.  Training Arena: Fitur latihan dengan animasi visual (glowing effect) yang menyesuaikan jenis latihan (Attack, Defense, Speed).
3.  Level Up System: Logika kenaikan level dan HP berdasarkan intensitas latihan.
4.  Riwayat Latihan: Pencatatan log aktivitas latihan secara real-time menggunakan Session.

Penerapan Konsep OOP
1.  Encapsulation: Properti seperti `level` dan `hp` dilindungi (`protected`) dan hanya dapat diakses/diubah melalui public methods (Getter/Setter).
2.  Inheritance: Class `Sandslash` mewarisi properti dan metode dasar dari *parent class abstrak `Pokemon`.
3.  Polymorphism: Metode `train()` pada `Sandslash` memiliki perhitungan unik (bonus stats) yang dikhususkan untuk tipe Ground.
4.  Abstraction: Class `Pokemon` adalah *abstract class* yang mendefinisikan kerangka kerja (blueprint) tanpa implementasi detail, yang kemudian dilengkapi oleh class anaknya.

Cara Menjalankan Aplikasi
1.  Pastikan Laragon sudah terinstall dan Web Server (Apache) berjalan.
2.  Pstikan folder repository ini ada dalam direktori server (`www`).
    Path: `D:\laragon\www\RESPONSI`
3.  Buka 'Laragon' lalu 'Start All'
4.  Klik kanan pada bagian kosong, klik 'www', lalu pilih file 'RESPONSI'
5.  Aplikasi sudah bisa dipakai

Demo Aplikasi
Berikut adalah demonstrasi penggunaan fitur Latihan dan melihat Riwayat:



https://github.com/user-attachments/assets/5280120a-8f87-4a5f-ba3a-974535128cb0

