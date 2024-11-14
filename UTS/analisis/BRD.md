Berikut adalah **Dokumen Persyaratan Bisnis (BRD)** untuk **Aplikasi Jual Beli Sepatu Online** yang disesuaikan dengan format yang telah Anda berikan.

---

# **Dokumen Persyaratan Bisnis (BRD)**  
### **Proyek:** Aplikasi Jual Beli Sepatu Online  
**Versi:** 1.2  
**Tanggal:** 14 November 2024  

---

## **1. Tujuan Proyek**
- **Objektif**: Aplikasi ini bertujuan mempermudah pelanggan membeli sepatu secara online dan membantu admin mengelola produk, pesanan, dan pembayaran secara efisien.

---

## **2. Fitur Utama**

### **Untuk Pelanggan**
- **Melihat Produk**: Pelanggan dapat melihat daftar sepatu yang tersedia dengan rincian:
  - Nama Produk
  - Deskripsi Produk
  - Harga
  - Stok
  - Merek
  - Kategori
  - Gambar Produk
  - Rating Produk
- **Menambah ke Keranjang**: Pelanggan dapat menambah produk ke keranjang belanja.
- **Melakukan Pembayaran**: Pelanggan dapat melakukan pembayaran dengan metode yang tersedia (misalnya, transfer bank, kartu kredit).
- **Melihat Riwayat Pesanan**: Pelanggan dapat melihat status pesanan yang telah dilakukan, termasuk detail produk dan status pengiriman.

### **Untuk Admin**
- **Pengelolaan Produk**: Admin dapat menambah, mengubah, dan menghapus produk sepatu.
- **Mengelola Pesanan**: Admin dapat melihat pesanan yang dilakukan pelanggan dan mengubah status pesanan.
- **Pengaturan Pembayaran**: Admin dapat mengelola status pembayaran untuk setiap pesanan.
- **Manajemen Kategori**: Admin dapat menambah, mengubah, atau menghapus kategori sepatu.
- **Manajemen Pembayaran**: Admin dapat mengelola data pembayaran pelanggan.

---

## **3. Persyaratan Fungsional**

### **Sistem Login**
- **Akses Berdasarkan Peran**: Pelanggan dan admin dapat login dengan hak akses berbeda.
  - **Admin**: Mengelola produk, pesanan, dan pembayaran.
  - **Pelanggan**: Mengakses dan membeli produk serta melacak pesanan.

### **Pengelolaan Produk**
- **Admin**: Admin dapat mengelola produk sepatu yang ada di aplikasi, termasuk menambah produk baru, memperbarui harga atau stok produk, dan menghapus produk.
  
### **Proses Pembayaran**
- **Pelanggan**: Pelanggan dapat melakukan pembayaran dan melihat status pembayaran mereka.
- **Admin**: Admin dapat memverifikasi dan mengonfirmasi pembayaran.

---

## **4. Persyaratan Non-Fungsional**

- **Kegunaan**: Antarmuka aplikasi harus mudah digunakan baik oleh pelanggan maupun admin.
- **Keamanan**:
  - Hanya admin yang dapat mengelola produk dan pesanan.
  - Pelanggan hanya dapat melihat dan membeli produk tanpa akses untuk mengubah data produk.
- **Skalabilitas**: Aplikasi harus mampu menangani banyak produk, pesanan, dan pelanggan secara simultan.

---

## **5. Model, Migrasi, Seeder, dan Resource yang Perlu Dibuat Pada Container `docker exec -it sample bash`**

### **Produk**
- **Model**: `Product`. Menyimpan rincian sepatu yang tersedia di toko.
  - **Atribut**: `id`, `name`, `description`, `price`, `stock`, `category`, `brand`, `image_url`, `created_at`, `updated_at`.
- **Migration**: Struktur tabel berikut akan dibuat pada database:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `name`: `varchar(255)` - Nama produk
  - `description`: `text` - Deskripsi produk
  - `price`: `decimal(10, 2)` - Harga produk
  - `stock`: `int(11)` - Jumlah stok produk
  - `category`: `varchar(255)` - Kategori produk
  - `brand`: `varchar(255)` - Merek sepatu
  - `image_url`: `varchar(255)` - URL gambar produk
  - `created_at`: `timestamp` - Waktu data dibuat
  - `updated_at`: `timestamp` - Waktu data diubah
- **Seeder**: Data produk awal untuk pengujian.
- **Resource**: Endpoint API untuk produk, dapat diakses oleh pelanggan dan admin.

### **Pesanan**
- **Model**: `Order`. Menyimpan informasi pesanan yang dilakukan oleh pelanggan.
  - **Atribut**: `id`, `user_id`, `total_amount`, `status`, `order_date`, `created_at`, `updated_at`.
- **Migration**: Struktur tabel berikut akan dibuat pada database:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `user_id`: `bigint UNSIGNED` - ID pengguna yang melakukan pesanan
  - `total_amount`: `decimal(10, 2)` - Total nilai pesanan
  - `status`: `varchar(255)` - Status pesanan (misalnya: `pending`, `completed`)
  - `order_date`: `timestamp` - Waktu pemesanan
  - `created_at`: `timestamp` - Waktu data dibuat
  - `updated_at`: `timestamp` - Waktu data diubah
- **Seeder**: Data pesanan awal untuk pengujian.
- **Resource**: Endpoint API untuk pesanan, dapat diakses oleh pelanggan dan admin.

### **Item Pesanan**
- **Model**: `OrderItem`. Menyimpan detail setiap item dalam pesanan.
  - **Atribut**: `id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`.
- **Migration**: Struktur tabel berikut akan dibuat pada database:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `order_id`: `bigint UNSIGNED` - ID pesanan
  - `product_id`: `bigint UNSIGNED` - ID produk yang dibeli
  - `quantity`: `int(11)` - Jumlah unit produk yang dibeli
  - `price`: `decimal(10, 2)` - Harga produk saat pembelian
  - `created_at`: `timestamp` - Waktu data dibuat
  - `updated_at`: `timestamp` - Waktu data diubah
- **Seeder**: Data item pesanan awal untuk pengujian.
- **Resource**: Endpoint API untuk item pesanan, dapat diakses oleh pelanggan dan admin.

### **Pembayaran**
- **Model**: `Payment`. Menyimpan informasi pembayaran untuk pesanan.
  - **Atribut**: `id`, `order_id`, `amount`, `method`, `status`, `payment_date`, `created_at`, `updated_at`.
- **Migration**: Struktur tabel berikut akan dibuat pada database:
  - `id`: `bigint UNSIGNED` (Primary Key)
  - `order_id`: `bigint UNSIGNED` - ID pesanan
  - `amount`: `decimal(10, 2)` - Jumlah yang dibayarkan
  - `method`: `varchar(255)` - Metode pembayaran
  - `status`: `varchar(255)` - Status pembayaran
  - `payment_date`: `timestamp` - Waktu pembayaran
  - `created_at`: `timestamp` - Waktu data dibuat
  - `updated_at`: `timestamp` - Waktu data diubah
- **Seeder**: Data pembayaran awal untuk pengujian.
- **Resource**: Endpoint API untuk pembayaran, dapat diakses oleh pelanggan dan admin.

### **Permissions**
- **Model**: `Permission`. Mengelola daftar permissions yang mengatur hak akses pengguna.
  
- **Seeder**: `PermissionsSeeder`, bertugas menambahkan permissions dan menetapkannya ke role `pelanggan` dan `admin`.

  - **Permissions untuk Admin**:
    - `manage_products`: Mengizinkan admin mengelola produk.
    - `manage_orders`: Mengizinkan admin mengelola pesanan.
    - `manage_payments`: Mengizinkan admin mengelola pembayaran.
  
  - **Permissions untuk Pelanggan**:
    - `view_products`: Mengizinkan pelanggan melihat daftar produk.
    - `place_orders`: Mengizinkan pelanggan melakukan pemesanan.
    - `view_orders`: Mengizinkan pelanggan melihat riwayat pesanan.

#### Mengapa Migration Permissions Tidak Dibuat? 
Karena migrasi untuk tabel permissions sudah disediakan oleh paket `spatie/laravel-permission`. Paket ini secara otomatis mengatur tabel dan kolom yang diperlukan untuk permissions dan roles, sehingga tidak perlu membuat migrasi permissions secara manual.

---

## **6. Analisis Permissions untuk Pelanggan dan Admin**

Pada proyek aplikasi jual beli sepatu online ini, permissions diperlukan untuk membatasi akses pelanggan terhadap fitur yang sesuai dengan kebutuhan dan peran mereka, sementara admin memiliki akses penuh ke seluruh sistem.

### **Permissions yang Diperlukan**

**Admin**:
1. **Permissions untuk Admin**:
   - `manage_products`: Mengizinkan admin mengelola produk sepatu.
   - `manage_orders`: Mengizinkan admin mengelola pesanan.
   - `manage_payments`: Mengizinkan admin mengelola pembayaran.

**Pelanggan**:
1. **Permissions untuk Pelanggan**:
   - `view_products`: Mengizinkan pelanggan melihat daftar produk.
   - `place_orders`: Mengizinkan pelanggan melakukan pemesanan.
   - `view_orders`: Mengizinkan pelanggan melihat riwayat pesanan mereka.

###