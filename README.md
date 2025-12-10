# Proyecto Supplier - Api Almacenamiento De Proveedores

Proyecto creado en Laravel con el cual logramos exponer endpoints para su posterior consumo por un cliente

---
### 🔨 Requisitos
- PHP (Version mayor a la 8.1)
- Laravel
- Composer
- Base de datos (MySQL, PostgreSQL, etc,.)
---
### 🧩 Paso a paso en la instalacion

1. **Clonar el repositorio y acceder**
```bash
git clone https://github.com/Borregon117/supplier-laravel.git
cd supplier-laravel
```
2. **Descargar dependencias**
Descargar e instalar las dependencias necesarias.
```bash
composer install
```
3. **Variables de entorno**
Despues se procede a realizar la configuracion de las variables de entorno acorde a la base de datos.
```
DB_CONNECTION=[TU_TIPO_DE_BASE_DE_DATOS]
DB_HOST=127.0.0.1
DB_PORT=[PUERTO_EXPUESTO_DE_LA_DB]
DB_DATABASE=[NOMBRE_DE_BASE_DE_DATOS]
DB_USERNAME=[USUARIO_PARA_CONECTAR_A_DB]
DB_PASSWORD=[CONTRASEÑA_DEL_USUARIO_DE_LA_DB]
```
4. **Migraciones**
Posteriormente a conectar la base de datos, procedemos a migrar las tablas a la base de datos.
```bash
php artisan migrate
```
5. **Ejecucion**
Ejecutamos el comando para lanzar la aplicacion, podemos corroborar la disponibilidad usando, por ejemplo, Postman
```bash
php artisan serve
```
6. **Rutas**
Para conocer los endpoints disponibles, ejecutar el siguiente comando en la consola
```bash
php artisan route:list
```
