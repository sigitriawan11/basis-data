# 🧱 Panduan Tipe Kolom, Modifier & Foreign Key di Laravel Migration

Dokumen ini menjelaskan tipe-tipe kolom yang umum digunakan dalam **Laravel Migration**, lengkap dengan fungsi, contoh, dan penjelasannya.

---

## 📌 1. TIPE KOLOM UMUM

1. **`id()`**  
   Membuat kolom `id` bertipe *big integer unsigned* dan *auto increment*, otomatis menjadi *primary key*.  
   ```php
   $table->id();
   ```

2. **`bigIncrements()`**  
   Membuat kolom *big integer auto increment*, mirip dengan `id()`, tetapi dapat diberi nama sendiri.  
   ```php
   $table->bigIncrements('user_id');
   ```

3. **`increments()`**  
   Membuat kolom integer auto increment ukuran standar.  
   ```php
   $table->increments('id');
   ```

4. **`string()`**  
   Untuk teks pendek (default 255 karakter).  
   ```php
   $table->string('name', 100);
   ```

5. **`text()`**  
   Untuk teks panjang, seperti deskripsi.  
   ```php
   $table->text('description');
   ```

6. **`longText()`**  
   Untuk teks yang sangat panjang (misalnya isi artikel).  
   ```php
   $table->longText('content');
   ```

7. **`integer()`**  
   Menyimpan bilangan bulat (32-bit).  
   ```php
   $table->integer('age');
   ```

8. **`bigInteger()`**  
   Menyimpan bilangan bulat besar (64-bit).  
   ```php
   $table->bigInteger('views');
   ```

9. **`tinyInteger()`**  
   Menyimpan bilangan kecil (biasanya 0–255), cocok untuk status/flag.  
   ```php
   $table->tinyInteger('status');
   ```

10. **`boolean()`**  
    Menyimpan nilai benar/salah (`true/false`).  
    ```php
    $table->boolean('is_active');
    ```

11. **`float()`**  
    Menyimpan angka desimal dengan presisi mengambang (floating point).  
    ```php
    $table->float('rating', 8, 2);
    ```

12. **`decimal()`**  
    Menyimpan angka desimal presisi tetap (lebih aman untuk uang).  
    ```php
    $table->decimal('price', 10, 2);
    ```

13. **`date()`**  
    Menyimpan tanggal (YYYY-MM-DD).  
    ```php
    $table->date('birth_date');
    ```

14. **`dateTime()`**  
    Menyimpan tanggal dan waktu (YYYY-MM-DD HH:MM:SS).  
    ```php
    $table->dateTime('published_at');
    ```

15. **`time()`**  
    Menyimpan waktu saja (HH:MM:SS).  
    ```php
    $table->time('start_time');
    ```

16. **`timestamp()`**  
    Menyimpan waktu lengkap yang mendukung zona waktu dan auto-update.  
    ```php
    $table->timestamp('created_at');
    ```

17. **`binary()`**  
    Menyimpan data biner seperti file, hash, atau blob.  
    ```php
    $table->binary('data');
    ```

18. **`json()`**  
    Menyimpan data dalam format JSON (object atau array).  
    ```php
    $table->json('metadata');
    ```

19. **`uuid()`**  
    Menyimpan ID unik dalam format UUID.  
    ```php
    $table->uuid('uuid')->primary();
    ```

20. **`ipAddress()`**  
    Menyimpan alamat IP pengguna.  
    ```php
    $table->ipAddress('visitor_ip');
    ```

21. **`macAddress()`**  
    Menyimpan alamat MAC perangkat.  
    ```php
    $table->macAddress('device_mac');
    ```

22. **`enum()`**  
    Menyimpan nilai terbatas dari daftar tertentu.  
    ```php
    $table->enum('status', ['pending', 'success', 'failed']);
    ```

---

## ⚙️ 2. MODIFIER KOLOM

1. **`unique()`**  
   Menandai kolom agar nilainya tidak boleh sama (unik).  
   ```php
   $table->string('email')->unique();
   ```

2. **`nullable()`**  
   Mengizinkan kolom menyimpan nilai `NULL`.  
   ```php
   $table->string('nickname')->nullable();
   ```

3. **`index()`**  
   Menambahkan indeks untuk mempercepat pencarian data.  
   ```php
   $table->integer('user_id')->index();
   ```

4. **`unsigned()`**  
   Menjadikan kolom hanya menerima angka positif.  
   ```php
   $table->integer('balance')->unsigned();
   ```

5. **`onDelete()`**  
   Menentukan aksi saat data relasi dihapus (misalnya `cascade`, `restrict`, `set null`).  
   ```php
   $table->foreignId('user_id')->constrained()->onDelete('cascade');
   ```

6. **`softDeletes()`**  
   Menambahkan kolom `deleted_at` untuk fitur *soft delete* (data tidak dihapus permanen).  
   ```php
   $table->softDeletes();
   ```

---

## 🔗 3. FOREIGN KEY (RELASI ANTAR TABEL)

1. **`primary()`**  
   Menjadikan kolom sebagai *primary key* secara manual.  
   ```php
   $table->primary('uuid');
   ```

2. **`foreignId()`**  
   Membuat kolom foreign key dengan tipe *unsigned big integer*.  
   ```php
   $table->foreignId('user_id');
   ```

3. **`constrained()`**  
   Menambahkan relasi otomatis ke tabel dengan nama sama (tanpa `_id`).  
   ```php
   $table->foreignId('user_id')->constrained();
   ```

4. **`references()` dan `on()`**  
   Menentukan foreign key secara eksplisit.  
   ```php
   $table->foreign('user_id')->references('id')->on('users');
   ```

---

## ✳️ Contoh Penggunaan Lengkap

```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('body');
    $table->foreignId('user_id')
          ->constrained('users')
          ->onDelete('cascade');
    $table->timestamps();
});
```

---

## 🧩 Contoh Struktur Tabel Lengkap

```php
Schema::create('products', function (Blueprint $table) {
    $table->id(); // Primary key
    $table->string('name')->unique(); // Nama unik
    $table->text('description')->nullable(); // Bisa kosong
    $table->decimal('price', 10, 2)->unsigned(); // Harga positif
    $table->integer('stock')->default(0);
    $table->enum('status', ['active', 'inactive'])->default('active');
    $table->foreignId('category_id')
          ->constrained('categories')
          ->onDelete('cascade');
    $table->timestamps();
    $table->softDeletes();
});
```

---

## 📖 Kesimpulan

- **Tipe kolom** menentukan jenis data yang disimpan di tabel.  
- **Modifier** memberikan aturan tambahan seperti `nullable`, `unique`, atau `index`.  
- **Foreign key** menjaga integritas antar tabel agar relasi tetap konsisten.  
- Kombinasi yang tepat membantu menjaga performa dan kejelasan struktur database.

---
