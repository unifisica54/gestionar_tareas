## DESCARGAR LAS DESPEDENCIAS DEL VENDOR
composer install
## CREACION LA VARIABLE DE ENTORNO
cp .env.example .env
## CREACION DE LA BASE DE DATOS 
CREATE DATABASE 'db_gestion_tareas'
## CAÑADIR EL NOMBRE DE LA BASE DE DATOS
DB_DATABASE=db_gestion_tareas
## GENERAR EL KEY GENERATION
php artisan key:generate
## GENERAR LAS TABLAS
php artisan migrate
## GENERAR EL USUARIO
php artisan db:seed
## EL USUARIO GENERADO ES :
'email' = 'prueba@gmail.com',
'password' = '12345678',
## PROBAR LAS APIS :
ESTAN EN LA CARPETA TAREA.json