# Test técnico para Ulern
## Descripción
Al ingresar a http://localhost:8080, se observa la página en la que se puede seleccionar tanto el login como el register. Una vez registrado un usuario, puede acceder a los datos de este seleccionando la opción de login.
## Requerimientos

* PHP 8.2 o superior
```bash
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php8.3 php8.3-cli php8.3-{bz2,curl,mbstring,intl}
sudo apt install php8.3-sqlite3
```
* Composer 2.2.6
```bash
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
sudo apt install -y php8.3-xml
sudo apt install php8.3-sqlite3
```

* NPM 11.0.0
```bash
sudo apt install npm
```

### 1. Clonar el repositorio
```bash
git https://github.com/Darional/Technical-Test.git
cd Technical-Test `
```

### 2. Configuración del Backend
```bash
cd backend-laravel-sqlite
composer update
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```
### 3. Configuración del Frontend

```bash
cd frontend_vue3_tailwind
npm install
npm run serve
```

### 4. Acceso a la Aplicación
* Frontend http://localhost/8080

