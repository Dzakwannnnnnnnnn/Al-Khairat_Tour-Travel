# Al-Khairat - Landing Page Umroh

Halaman landing modern untuk layanan umroh Al-Khairat yang dirancang dengan konsep design yang hangat dan profesional.

## 🎨 Konsep Design

### Palet Warna
- **Warna Utama (Gold/Sunset)**: #D4A574, #E8956A, #F39547
  - Terinspirasi dari logo yang memberikan kesan "Matahari Terbit"
- **Background**: #FBF8F3 (Off-White/Cream Muda)
  - Menjaga suasana hangat tanpa menggunakan putih murni
- **Text**: #2C2416 (Charcoal), #5D4E45 (Brown)
  - Lebih lembut dibanding hitam pekat, sangat serasi dengan emas

### Tipografi
- **Header**: Playfair Display (Font Serif elegan) - Kesan mewah dan resmi
- **Body**: Poppins (Font Sans-serif) - Mudah dibaca dan modern

### Visual & Elemen Grafis
- **Simbol Kurma (🌴)**: Digunakan sebagai watermark dan divider antar section
- **Gradasi Warna**: Gradient dari oranye ke emas pada tombol utama
- **Emoji Icons**: Masjid (🕌), Pesawat (✈️), Hotel (🏨), dll

### Pesan Utama
> "Perjalanan penuh kehangatan, pelayanan secerah mentari"

## 📁 Struktur File

```
resources/
├── views/
│   ├── welcome.blade.php (Landing page utama)
│   ├── layouts/
│   │   └── layout.blade.php
│   ├── components/
│   │   ├── header.blade.php
│   │   ├── sidebar.blade.php
│   │   ├── footer.blade.php
│   │   ├── breadcrumb.blade.php
│   │   └── alert.blade.php
│   ├── dashboard.blade.php
│   ├── products.blade.php
│   └── users.blade.php
├── css/
│   └── app.css (CSS custom dengan theme)
└── js/
    └── app.js (JavaScript untuk interaktivitas)
```

## 🎯 Fitur-Fitur Halaman

### 1. Header Navigation
- Logo dan brand name di kiri
- Menu navigasi di tengah (Keunggulan, Paket, Testimoni, FAQ)
- Tombol WhatsApp menonjol di kanan dengan warna gradient sunset

### 2. Hero Section
- Judul utama dengan animated gradient text
- Subheading dan deskripsi singkat
- Call-to-action buttons (Daftar Sekarang, Lihat Paket)
- Image placeholder dengan styling elegant

### 3. Section Keunggulan
- 4 kartu fitur dengan ikon emoji
- Background gradient cream
- Border gold yang elegant
- Responsive grid (1 kolom mobile, 4 kolom desktop)

### 4. Section Paket
- 3 paket umroh: Standar, Premium (highlighted), Ekonomis
- Detail fitur setiap paket
- Premium package mendapat special treatment dengan scale-up
- Tombol WhatsApp untuk setiap paket

### 5. Section Testimoni
- 3 testimonial dari jemaat
- Rating 5 bintang
- Avatar dengan inisial nama
- Left border dengan warna gold

### 6. FAQ Section
- Accordion interaktif untuk 4 pertanyaan umum
- Click untuk expand/collapse
- Smooth animation

### 7. CTA Section
- Gradient background sunset
- Pesan motivasi
- Tombol call-to-action yang mencolok

### 8. Footer
- Warna charcoal dengan aksen gold
- 4 kolom: Tentang, Menu, Kontak, Social
- Copyright dan legal links

## 🚀 Cara Menggunakan

### Development Mode
```bash
npm run dev
```
Akses di `http://localhost:5174`

### Production Build
```bash
npm run build
```

### Run Vite HMR
Vite akan otomatis hot-reload ketika ada perubahan di file

## 🔧 Customization

### Mengubah Warna
Edit di `resources/css/app.css` section `@theme`:
```css
@theme {
    --color-gold: #D4A574;
    --color-deep-orange: #E8956A;
    /* ... */
}
```

### Mengubah Konten
Edit langsung di `resources/views/welcome.blade.php`

### Menambah Section Baru
1. Buat section baru dalam `welcome.blade.php`
2. Tambahkan link di navigation header
3. Gunakan class utility yang sudah ada (`.section-py`, `.text-heading`, dll)

## 📱 Responsive Breakpoints
- **Mobile**: < 640px
- **Tablet**: 640px - 1024px
- **Desktop**: > 1024px

Menggunakan Tailwind CSS breakpoints: `sm:`, `md:`, `lg:`

## 🎓 CSS Utility Classes

### Typography
- `.text-display` - Judul utama (h1)
- `.text-heading` - Heading section (h2)
- `.text-subheading` - Subheading (h3)
- `.font-serif` - Font serif elegan

### Colors
- `.text-charcoal` - Warna teks utama
- `.text-gold` - Warna gold
- `.text-sunset-orange` - Warna orange sunset
- `.bg-cream` - Background cream

### Buttons
- `.btn-primary` - Tombol utama (gradient sunset)
- `.btn-secondary` - Tombol sekunder (border gold)

### Effects
- `.gradient-sunset` - Background gradient sunset
- `.divider-palm` - Divider dengan emoji kurma
- `.section-py` - Padding vertikal section

## 📝 Notes

- Menggunakan Google Fonts (Playfair Display, Poppins)
- Compatible dengan semua browser modern
- Optimasi loading dengan Vite + Laravel Vite Plugin
- SEO-friendly dengan semantic HTML

## 🔗 Links yang Perlu Diupdate

Di `welcome.blade.php` ubah:
- Link WhatsApp ke nomor sebenarnya: `https://wa.me/62XXXXXXXXXX`
- Email di footer: `info@alkhairat.com`
- Phone di footer: `+62 (XXX) XXX-XXXX`
- Alamat di footer
- Social media links

## 📚 Resources

- Color Palette: https://colorhunt.co/
- Font: https://fonts.google.com/
- Icons: Emoji Unicode
- Framework: Tailwind CSS + Laravel Vite Plugin
