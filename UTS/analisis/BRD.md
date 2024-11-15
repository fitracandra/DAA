# **Dokumen Persyaratan Bisnis (BRD)**  
### **Proyek:** Aplikasi Pengelolaan Data Pelanggan  
**Versi:** 1.0  
**Tanggal:** 15 November 2024  

---

## **1. Tujuan Proyek**
- **Objektif**: Aplikasi ini bertujuan mempermudah pengelolaan data pelanggan, melacak riwayat transaksi, dan memberikan analisis sederhana berdasarkan kategori pelanggan.

---

## **2. Fitur Utama**

### **Untuk Admin**
- **Pengelolaan Data Pelanggan**: Admin dapat:
  - Menambah data pelanggan.
  - Mengubah informasi pelanggan.
  - Menghapus pelanggan yang tidak aktif.
- **Pengelolaan Transaksi**:
  - Menambah transaksi pelanggan.
  - Melihat daftar transaksi pelanggan.
  - Menghapus data transaksi jika diperlukan.
- **Analisis Pelanggan**:
  - Mengelompokkan pelanggan berdasarkan kategori (baru, reguler, VIP).
  - Menampilkan laporan sederhana berdasarkan jumlah transaksi, nilai transaksi, atau kategori pelanggan.

---

## **3. Persyaratan Fungsional**

### **Sistem Login**
- **Akses Berdasarkan Peran**: Admin dapat login untuk mengelola data pelanggan dan transaksi.

### **Pengaturan & Tampilan Data**
- **Admin**: 
  - Mengelola data pelanggan (menambah, mengubah, menghapus).
  - Mengelola data transaksi pelanggan.
  - Melihat laporan sederhana terkait data pelanggan dan transaksi.

---

## **4. Persyaratan Non-Fungsional**

- **Kegunaan**: Antarmuka yang intuitif dan mudah digunakan untuk admin.
- **Keamanan**:
  - Hanya admin yang dapat mengelola data pelanggan dan transaksi.
  - Data pelanggan harus disimpan dengan aman dan hanya dapat diakses oleh pengguna dengan otorisasi.

---

## **5. Model, Migrasi, Seeder, dan Resource yang Perlu Dibuat Pada Container `docker exec -it sample bash`**

### **Customers**
- **Model**: `Customers`. Menyimpan informasi pelanggan, seperti nama, alamat, kontak, dan kategori.
- **Migration**: Struktur tabel berikut akan dibuat pada database:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `name`: `varchar(255)` - Nama pelanggan.
  - `address`: `text` - Alamat pelanggan.
  - `contact`: `varchar(255)` - Informasi kontak pelanggan.
  - `category`: `varchar(255)` - Kategori pelanggan (baru, reguler, VIP).
  - `created_at`: `timestamp` - Waktu data dibuat.
  - `updated_at`: `timestamp` - Waktu data diubah.
- **Seeder**: Data awal pelanggan untuk pengujian.
- **Resource**: Endpoint API untuk mengelola data pelanggan (CRUD).

### **Transactions**
- **Model**: `Transactions`. Menyimpan rincian transaksi pelanggan.
- **Migration**: Struktur tabel berikut akan dibuat pada database:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `customer_id`: `bigint UNSIGNED` - Referensi ke pelanggan.
  - `date`: `date` - Tanggal transaksi.
  - `amount`: `double` - Jumlah transaksi.
  - `description`: `text` - Deskripsi transaksi.
  - `created_at`: `timestamp` - Waktu data dibuat.
  - `updated_at`: `timestamp` - Waktu data diubah.
- **Seeder**: Data awal transaksi untuk pengujian.
- **Resource**: Endpoint API untuk mengelola data transaksi.

---

## **6. Analisis Permissions untuk Admin**

### **Permissions yang Diperlukan**
Admin memiliki hak penuh untuk mengakses dan mengelola data pelanggan serta transaksi. Berikut adalah permissions yang dibutuhkan:

1. **Permissions untuk Admin**
   - `view_customers`: Mengizinkan melihat daftar pelanggan.
   - `manage_customers`: Mengizinkan mengelola data pelanggan (CRUD).
   - `view_transactions`: Mengizinkan melihat daftar transaksi.
   - `manage_transactions`: Mengizinkan mengelola data transaksi (CRUD).
   - `view_reports`: Mengizinkan melihat laporan pelanggan dan transaksi.

---


---