Proyecto Laravel: Gestión de Alumnos y Proyectos

Este proyecto es una aplicación web desarrollada con el framework Laravel, diseñada para gestionar información relacionada con alumnos y proyectos. A continuación, se presenta un paso a paso detallado de cómo se construyó este proyecto.

📌 Requisitos Previos

Antes de comenzar, asegúrate de tener instalado lo siguiente:

PHP (≥ 8.0)

Composer

Node.js (≥ 14)

MySQL o PostgreSQL

Laravel

⚙️ Paso 1: Creación del Proyecto Laravel

Se inició un nuevo proyecto con Laravel ejecutando:

composer create-project laravel/laravel gestion_alumnos_proyectos
cd gestion_alumnos_proyectos

🗄️ Paso 2: Configuración de la Base de Datos

Se crearon los modelos y migraciones para Alumno y Proyecto:

php artisan make:model Alumno -m
php artisan make:model Proyecto -m

Se definieron las estructuras de las tablas en los archivos generados en database/migrations/ y luego se ejecutaron las migraciones:

php artisan migrate

🚀 Paso 3: Creación de Controladores y Rutas

Se generaron los controladores para gestionar alumnos y proyectos:

php artisan make:controller AlumnoController --resource
php artisan make:controller ProyectoController --resource

Se definieron las rutas necesarias en routes/web.php:

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProyectoController;

Route::resource('alumnos', AlumnoController::class);
Route::resource('proyectos', ProyectoController::class);

🎨 Paso 4: Creación de Vistas con Blade

Se crearon vistas en resources/views/alumnos/ y resources/views/proyectos/ para mostrar la lista de alumnos y proyectos, formularios de creación y edición, y detalles individuales.

🎨 Paso 5: Estilizado con Tailwind CSS

Se instaló y configuró Tailwind CSS para mejorar la apariencia de la aplicación:

npm install -D tailwindcss
npx tailwindcss init

Se configuró el archivo tailwind.config.js y se aplicaron estilos en las vistas.

🛠️ Paso 6: Creación de Seeders para Datos de Prueba

Se crearon seeders para poblar la base de datos con alumnos y proyectos de prueba:

php artisan make:seeder AlumnoSeeder
php artisan make:seeder ProyectoSeeder

Se ejecutaron para insertar datos de prueba:

php artisan db:seed --class=AlumnoSeeder
php artisan db:seed --class=ProyectoSeeder

🌍 Paso 7: Configuración de Idiomas

Para manejar la traducción en la aplicación, se instaló el paquete laravel-lang/lang:

composer require laravel-lang/lang

Se configuraron los archivos de idioma en lang/.

🏗️ Paso 8: Implementación de Autenticación

Se instaló Laravel Breeze para la autenticación:

composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate

Esto agregó autenticación de usuario con login y registro.

🔗 Paso 9: Relación entre Alumnos y Proyectos

Se estableció una relación entre Alumno y Proyecto en los modelos de Laravel:

// Alumno.php
public function proyectos() {
    return $this->hasMany(Proyecto::class);
}

// Proyecto.php
public function alumno() {
    return $this->belongsTo(Alumno::class);
}

Se modificaron los controladores y las vistas para gestionar esta relación adecuadamente.

🖥️ Paso 10: Despliegue y Pruebas

Finalmente, se probó la aplicación en el servidor de desarrollo:

php artisan serve

Se realizaron pruebas manuales y con PHPUnit para validar su funcionamiento.

🎯 Consideraciones Finales

Este proyecto está estructurado siguiendo las mejores prácticas de Laravel, lo que facilita su escalabilidad y mantenimiento. Se recomienda revisar la documentación oficial de Laravel para profundizar en cada componente y adaptar la aplicación a necesidades específicas.

Para cualquier consulta o contribución, no dude en contactar al mantenedor del proyecto o abrir una incidencia en el repositorio.