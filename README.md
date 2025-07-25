# NusantaraQuest - Game Edukasi Budaya Indonesia

## Deskripsi Aplikasi
NusantaraQuest adalah sebuah permainan edukasi interaktif yang mengajak pemain untuk menelusuri kekayaan budaya Indonesia. Dalam permainan ini, kamu dapat menguji wawasanmu tentang berbagai aspek budaya Indonesia seperti makanan khas, kesenian, tempat ikonik, dan pahlawan nasional. Jadilah sang jawara budaya dengan menjawab pertanyaan dan menyelesaikan tantangan yang ada!

## Fitur Utama
- Permainan kuis edukasi budaya Indonesia
- Sistem skor dan papan peringkat
- Halaman belajar untuk menambah wawasan budaya
- Autentikasi pengguna (login dan registrasi)
- Tampilan interaktif dengan audio dan video latar belakang

## Persyaratan Sistem
- PHP 8.2 atau lebih baru
- Composer
- Node.js dan npm
- Database MySQL atau SQLite (sesuai konfigurasi Laravel)

## Instalasi

1. **Clone repository ini:**
   ```bash
   git clone <repository-url>
   cd game-budaya-indonesia
   ```

2. **Install dependensi PHP dengan Composer:**
   ```bash
   composer install
   ```

3. **Install dependensi frontend dengan npm:**
   ```bash
   npm install
   ```

4. **Salin file environment dan konfigurasi aplikasi:**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

6. **Konfigurasi database di file `.env`:**  
   Sesuaikan pengaturan database (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD) sesuai dengan lingkungan Anda.

7. **Jalankan migrasi dan seeding database:**
   ```bash
   php artisan migrate --seed
   ```

8. **Jalankan server development Laravel:**
   ```bash
   php artisan serve
   ```

9. **Jalankan Vite untuk build frontend (opsional untuk development):**
   ```bash
   npm run dev
   ```

## Cara Bermain

- Buka browser dan akses `http://localhost:8000`
- Daftar akun baru atau login jika sudah memiliki akun
- Mulai petualangan budaya dengan klik "Lanjutkan Petualangan" atau akses `/play`
- Jawab pertanyaan dan kumpulkan skor
- Lihat papan skor di halaman `/scores`
- Pelajari lebih lanjut di halaman `/belajar`

## Struktur Proyek

- `app/` - Kode backend Laravel (Controllers, Models, dll)
- `database/` - Migrasi dan seeder database
- `public/` - Aset publik seperti CSS, JS, gambar, audio
- `resources/views/` - Template Blade untuk tampilan frontend
- `routes/` - Definisi rute aplikasi
- `composer.json` - Dependensi PHP
- `package.json` - Dependensi frontend dan build tools

## Testing

Untuk menjalankan pengujian otomatis, gunakan perintah berikut:

```bash
php artisan test
```

## Lisensi

Proyek ini menggunakan lisensi MIT.

---

© {{ date('Y') }} NusantaraQuest. All rights reserved.
