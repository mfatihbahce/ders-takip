# Ders Takip

Öğrenci kayıt başvurularını toplayan, sınıfları yöneten ve yönetici paneli sunan **Laravel** tabanlı web uygulaması. Arayüz Türkçe; formdaki “katılmak istenen sınıflar” veritabanından dinamik gelir.

![PHP](https://img.shields.io/badge/PHP-^8.2-777BB4?style=flat-square&logo=php)
![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)
![License](https://img.shields.io/badge/license-MIT-green?style=flat-square)

---

## Özellikler

| Alan | Açıklama |
|------|----------|
| **Genel kayıt formu** | Öğrenci, veli, acil iletişim, isteğe bağlı ek alanlar (cinsiyet, öğrenci telefonu, sınıf düzeyi) ve çoklu sınıf seçimi |
| **Yönetici girişi** | Laravel oturumu (`/admin/login`) |
| **Gösterge paneli** | Başvuru ve sınıf özetleri, son başvurular |
| **Başvurular** | Gelen formların listelenmesi |
| **Sınıf oluşturma** | Kayıt formunda listelenecek sınıfların eklenmesi (aktif / pasif) |
| **Profil & site ayarları** | Yönetici bilgileri ve site adı / iletişim alanları |

---

## GitHub’a gönderme (senkronizasyon)

Bu depo **`origin`** adresini **HTTPS** olarak kullanacak şekilde ayarlanmıştır (Windows’ta kimlik doğrulama genelde daha kolaydır):

```text
https://github.com/mfatihbahce/ders-takip.git
```

Yerel değişiklikleri GitHub’a yüklemek için:

```bash
git add -A
git status
git commit -m "Mesajınız"
git push origin main
```

İlk kez klonluyorsanız:

```bash
git clone https://github.com/mfatihbahce/ders-takip.git
cd ders-takip
composer install
```

**SSH** kullanmak isterseniz:

```bash
git remote set-url origin git@github.com:mfatihbahce/ders-takip.git
git push origin main
```

(GitHub’da SSH anahtarınızın tanımlı olması gerekir.)

---

## Gereksinimler

- **PHP** 8.2+
- **Composer**
- **MySQL** (ör. XAMPP üzerinde `phpMyAdmin`)
- İsteğe bağlı: **Node.js** (Vite/asset derlemesi için)

---

## Kurulum

### 1. Depoyu alın ve bağımlılıkları yükleyin

```bash
git clone https://github.com/mfatihbahce/ders-takip.git
cd ders-takip
composer install
```

### 2. Ortam dosyası

```bash
copy .env.example .env   # Windows
php artisan key:generate
```

### 3. Veritabanı

phpMyAdmin veya MySQL’de veritabanı oluşturun (örnek: `ders-takip`). `.env` içinde:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ders-takip
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Tablolar ve örnek veri

```bash
php artisan migrate --seed
```

### 5. Çalıştırma

```bash
php artisan serve
```

- Kayıt formu: `http://127.0.0.1:8000/`
- Yönetici: `http://127.0.0.1:8000/admin/login`

**XAMPP:** Apache’de site kökünü `public` klasörüne yönlendirin; `APP_URL` değerini güncelleyin.

---

## Varsayılan yönetici (seeder)

| Alan | Değer |
|------|--------|
| E-posta | `admin@kesfetlab.local` |
| Şifre | `admin123` |

Üretimde bu hesabı değiştirin veya kaldırın.

---

## Önemli URL’ler

| Yol | Açıklama |
|-----|----------|
| `/` | Öğrenci kayıt formu |
| `POST /basvuru` | Form gönderimi |
| `/admin/login` | Yönetici girişi |

---

## Veri modeli (özet)

- `users` — yöneticiler  
- `school_classes` — formda listelenen sınıflar  
- `applications` — başvurular  
- `application_class` — başvuru ↔ sınıf  
- `site_settings` — site adı ve iletişim  

---

## Güvenlik

- `.env` dosyasını repoya eklemeyin (`.gitignore` içindedir).
- Üretimde `APP_DEBUG=false` kullanın.

---

## Lisans

**MIT** — Laravel bileşenleri için [laravel.com/license](https://laravel.com/license).
