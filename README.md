🛍️ MyShop - Laravel E-Commerce Admin Panel

MyShop adalah aplikasi e-commerce berbasis **Laravel + Tailwind CSS** yang dilengkapi panel admin sederhana untuk mengelola produk, tampilan toko, dan pengaturan umum seperti logo, hero banner, serta nomor WhatsApp admin untuk transaksi cepat.

---

## 🚀 Fitur Utama

- 🧩 **CRUD Produk** (Tambah, Edit, Hapus, Lihat)
- ⚙️ **Pengaturan Toko Dinamis**  
  (nama toko, alamat, logo, hero banner, nomor WhatsApp)
- 🖼️ **Upload Gambar Produk** otomatis tersimpan ke `storage`
- 📱 **Tampilan Responsif** dengan Tailwind CSS
- 💬 **Tombol WhatsApp otomatis** untuk menghubungi admin
- 💾 **Simpan Pengaturan via Database** (tabel `settings`)
- 🛡️ Struktur kode rapi dan siap untuk deployment

---

## 🧠 Persyaratan Sistem

Pastikan kamu sudah menginstal:
- PHP ≥ 8.1  
- Composer  
- Node.js + npm / yarn  
- MySQL / MariaDB  
- Git (opsional)

---

## ⚙️ Cara Instalasi

```bash
# 1. Clone repositori
git clone https://github.com/username/myshop.git
cd myshop

# 2. Install dependensi Laravel
composer install

# 3. Install dependensi frontend
npm install
npm run dev

# 4. Copy file environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Buat database dan sesuaikan .env
DB_DATABASE=myshop
DB_USERNAME=root
DB_PASSWORD=

# 7. Jalankan migrasi
php artisan migrate

# 8. Jalankan storage link untuk upload gambar
php artisan storage:link

# 9. Jalankan server
php artisan serve
Akses aplikasi di:
👉 http://localhost:8000

👨‍💼 Login Admin
Jika sudah disiapkan akun admin, login melalui:
http://localhost:8000/admin

Atau kamu bisa tambahkan langsung lewat seeder atau Tinker.

📲 Fitur WhatsApp
Nomor WhatsApp admin bisa disetting di halaman Admin → Settings.
Format:

Copy code
628xxxxxxxxxx
Tombol “Hubungi Admin” akan langsung mengarah ke:

arduino
Copy code
https://wa.me/628xxxxxxxxxx
🖼️ Struktur Folder Utama
swift
Copy code
myshop/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── ...
├── database/
├── public/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   └── admin/
│   └── css/
├── routes/
│   └── web.php
└── ...
❤️ Dukungan & Donasi
Bantu terus pengembangan proyek-proyek open source dari Senz Tech Tutorial!

💬 Kontak & Sosial Media
📞 WhatsApp: 082234852025

📸 Instagram: @senztech_id

▶️ YouTube: Senz Tech Tutorial

🎵 TikTok: @senztech_official

💼 LinkedIn: Anzalnadi Azzukruf Fairly

☕ Dukung dengan donasi:
Platform	Nomor / Link
💸 Dana	083153529212
🏦 BRI	774801000721500
🏦 Mandiri	1020013635856
🏦 SeaBank	901318642470
💰 Flip	082234852025
💳 PayPal	anzalnadi111@gmail.com
🎁 Saweria	https://saweria.co/senztech

🧑‍💻 Pengembang
Senz Tech (Anzalnadi Azzukruf Fairly)

Follow dan dukung terus untuk update tutorial Laravel, Tailwind, dan fullstack web development.

🪪 Lisensi
Proyek ini dilisensikan di bawah MIT License.

© {{ date('Y') }} Senz Tech Tutorial — Build, Learn, and Share.