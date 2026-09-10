
### 2. Instal Dependensi

```bash
composer install
npm install
npm run build
```

### 3. Konfigurasi File `.env`

Salin file contoh environment:

```bash
cp .env.example .env

```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Migrasi dan Seed Database

```bash
php artisan migrate --seed
```

### 6. Jalankan Server

```bash
php artisan serve
npm run dev
`