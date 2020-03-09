# Tickets App

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local._

### Pre-requisitos 📋

_Que necesitas:_

    -Laravel 7.x
    -Composer
    -PHP 7.3
 [Tutorial para instalar Laravel](https://laravel.com/docs/7.x#installing-laravel)

### Instalación 🔧

_Clonar proyecto desde github con:_

```
git clone https://github.com/claudioxz/tickets-app.git
```

_Instalar librerias con el siguiente comando:_

```
composer install
```

_Crear una copia del .env.example_

```
cp .env.example .env
```

_Configurar .env para la conexión con la base de datos_

_Generar clave de la aplicación_

```
php artisan key:generate
```

_Generar las tablas en la DB con las migraciónes de Laravel_

```
php artisan migrate
```


_Poblar datos para la tabla tipo_usuario_

```
composer dump-autoload
php artisan db:seed
```


_Correr la aplicación con el siguiente comando_

```
php artisan serve
```