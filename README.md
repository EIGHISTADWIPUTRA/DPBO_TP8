# README - TP_8 (MVC)

## Janji

Saya Muhammad Bintang Eighista dengan NIM 2304137 mengerjakan TP 8 dalam mata kuliah Desain
dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan
seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi

Aplikasi ini mengimplementasikan arsitektur Model-View-Controller (MVC) untuk manajemen mahasiswa, mata kuliah, dan kontrak mata kuliah (KRS).

## Desain Program

### Struktur Folder dan File

```
mvc_project/
├── config/
│   └── database.php                 # Konfigurasi database
├── controllers/
│   ├── StudentController.php        # Controller mahasiswa
│   ├── MataKuliahController.php     # Controller mata kuliah
│   └── MengontrakController.php     # Controller KRS
├── models/
│   ├── Student.php                  # Model mahasiswa
│   ├── MataKuliah.php               # Model mata kuliah
│   └── Mengontrak.php               # Model KRS
├── views/
│   ├── layouts/
│   │   ├── header.php               # Template header
│   │   └── footer.php               # Template footer
│   ├── students/                    # View mahasiswa
│   │   ├── index.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── show.php
│   ├── mata_kuliah/                 # View mata kuliah
│   │   ├── index.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── show.php
│   └── mengontrak/                  # View KRS
│       ├── index.php
│       ├── create.php
│       ├── edit.php
│       └── show.php
├── assets/
│   ├── css/
│   │   ├── style.css
│   │   └── bootstrap.min.css
│   └── js/
│       ├── script.js
│       ├── bootstrap.bundle.min.js
│       ├── bootstrap.min.js
│       ├── jquery.min.js
│       └── popper.min.js
└── index.php
```

### Desain Database

Database `db_mvc` berisi 3 tabel utama:

1. **students** - Data mahasiswa
   - id (PK, AUTO_INCREMENT)
   - name (VARCHAR, NOT NULL)
   - nim (VARCHAR, NOT NULL, UNIQUE)
   - phone (VARCHAR)
   - join_date (DATE)
2. **mata_kuliah** - Data mata kuliah
   - id (PK, AUTO_INCREMENT)
   - kode_matkul (VARCHAR, NOT NULL, UNIQUE)
   - nama_matkul (VARCHAR, NOT NULL)
   - sks (INT, NOT NULL)
3. **mengontrak** - Relasi antara mahasiswa dan mata kuliah (KRS)
   - id (PK, AUTO_INCREMENT)
   - student_id (INT, FK, NOT NULL)
   - matkul_id (INT, FK, NOT NULL)
   - semester (VARCHAR, NOT NULL)
   - tahun_ajaran (VARCHAR, NOT NULL)
   - nilai (CHAR)

Relasi:

- Mahasiswa 1:N Mengontrak (Satu mahasiswa bisa mengontrak banyak mata kuliah)
- Mata Kuliah 1:N Mengontrak (Satu mata kuliah bisa dikontrak oleh banyak mahasiswa)

### Arsitektur MVC

1. **Model**: Berinteraksi dengan database, mengimplementasikan CRUD
   - `Student.php`: Pengelolaan data mahasiswa
   - `MataKuliah.php`: Pengelolaan data mata kuliah
   - `Mengontrak.php`: Pengelolaan data kontrak mata kuliah
2. **View**: Tampilan untuk pengguna
   - Folder `views` berisi semua tampilan untuk masing-masing entitas
   - Layout umum (header, footer) dipisahkan untuk digunakan kembali
3. **Controller**: Menangani request dan response
   - `StudentController.php`: Mengatur aksi terkait mahasiswa
   - `MataKuliahController.php`: Mengatur aksi terkait mata kuliah
   - `MengontrakController.php`: Mengatur aksi terkait kontrak mata kuliah

## Alur Program

### 1. Alur Umum Request-Response

1. User mengakses URL (misalnya: `index.php?controller=student&amp;action=index`)
2. `index.php` (Front Controller) menerima request dan mengekstrak parameter
3. Controller yang sesuai dipanggil (misalnya: `StudentController-&gt;index()`)
4. Controller meminta data dari Model
5. Model mengambil data dari database
6. Controller meneruskan data ke View
7. View menampilkan data ke user

### 2. Alur CRUD Mahasiswa

#### Create (Tambah Data)

1. User mengakses `index.php?controller=student&amp;action=create`
2. Form kosong ditampilkan
3. User mengisi data dan submit
4. `StudentController-&gt;create()` memproses data
5. `Student-&gt;create()` menyimpan data ke database
6. Redirect ke halaman index

#### Read (Tampil Data)

1. User mengakses `index.php?controller=student&amp;action=index`
2. `StudentController-&gt;index()` meminta data dari model
3. `Student-&gt;getAll()` mengambil semua data mahasiswa
4. View menampilkan tabel mahasiswa

#### Update (Edit Data)

1. User mengklik tombol edit
2. `StudentController-&gt;edit()` mengambil data mahasiswa berdasarkan ID
3. Form edit ditampilkan dengan data yang ada
4. User mengubah data dan submit
5. `Student-&gt;update()` menyimpan perubahan ke database
6. Redirect ke halaman index

#### Delete (Hapus Data)

1. User mengklik tombol hapus
2. Konfirmasi penghapusan muncul
3. Jika dikonfirmasi, `StudentController-&gt;delete()` dipanggil
4. `Student-&gt;delete()` menghapus data dari database
5. Halaman di-refresh

### 3. Alur KRS (Mengontrak)

1. User membuka form tambah KRS
2. Sistem menampilkan dropdown mahasiswa dan mata kuliah
3. User memilih mahasiswa, mata kuliah, semester, dan tahun ajaran
4. Data disimpan dalam tabel `mengontrak`
5. User dapat melihat KRS pada detail mahasiswa atau detail mata kuliah

## Dokumentasi

Semua dokumentas (foto dan video) terdapat di folder ss.
