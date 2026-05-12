# Ders Takip

Öğrenci kayıt başvurularını toplayan, sınıfları yöneten ve yönetici paneli sunan **Laravel** tabanlı web uygulaması. Arayüz Türkçe; formdaki “katılmak istenen sınıflar” veritabanından dinamik gelir.

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

## Gereksinimler

- **PHP** 8.2+
- **Composer**
- **MySQL** (ör. XAMPP üzerinde `phpMyAdmin`)
- İsteğe bağlı: **Node.js** (Vite/asset derlemesi için; bu projede ağırlık Blade + gömülü CSS)

---

## Kurulum

```bash
copy .env.example .env   # Windows
# veya: cp .env.example .env
php artisan key:generate
```

### 3. Veritabanı

phpMyAdmin veya MySQL istemcisinde boş bir veritabanı oluşturun (örnek ad: `ders-takip`). `.env` içinde:

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


## Lisans

Bu proje Laravel iskeleti ile uyumlu olarak **MIT** lisansı altındadır. Laravel bileşenleri için [laravel.com/license](https://laravel.com/license) sayfasına bakın.
