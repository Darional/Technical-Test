# Test técnico para Ulern

## Instalación y ejecución

### 1. Clonar el repositorio
```bash
git https://github.com/Darional/Technical-Test.git
cd Technical-Test `
```

### 2. Configuración del Backend
```bash
cd backend-laravel-sqlite
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

