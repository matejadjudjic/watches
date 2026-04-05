⌚ Watches Shop


👤 Test kredencijali
RolaEmailLozinkaAdminnina@gmail.combojanaUsermatejadjudjic55@gmail.commateja

⚙️ Instalacija
bash# 1. Kloniraj repozitorijum
git clone https://github.com/matejadjudjic/watches.git
cd watches

# 2. Instaliraj PHP zavisnosti
composer install

# 3. Instaliraj Node zavisnosti
npm install && npm run dev

# 4. Kopiraj .env fajl
cp .env.example .env

# 5. Generiši application key
php artisan key:generate

# 6. Podesi bazu podataka u .env fajlu
DB_DATABASE=satovi-laravel
DB_USERNAME=root
DB_PASSWORD=

# 7. Pokreni migracije i seedere
php artisan migrate --seed

# 8. Napravi storage link za slike
php artisan storage:link

# 9. Pokreni lokalni server
php artisan serve
