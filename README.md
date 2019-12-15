# Parcel G

## Prerequisites
Git (Others) or GitBash (Windows)<br/>
PHP >= 7.1.3 <br/>
PHP Extensions (OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath) <br/>
[Composer](https://getcomposer.org/) <br/>
[NodeJS](https://nodejs.org/en/) <br/>
[Visual Studio Code](https://code.visualstudio.com/)

## Cloning a Repository

### Cloning
```
git clone git@github.com:dr5hn/parcelg.git
cd parcelg
```

### Create a `.env` file (Copy from .env.example) in `Root Folder` & Update DB & APP Config
Tip: Copy Content of .env.example and paste it into .env
(If text contains spaces, then encapsulate it with double quotes)
```
APP_NAME="ParcelG"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://local.parcelg.com

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=parcelg
DB_USERNAME=root
```

### Directory Permissions (Except Windows)
```
sudo chmod -R 0777 storage/
sudo chmod -R 0777 bootstrap/cache
```

### Installing Composer & Node Dependencies
```
composer install
npm install
```

### Run Migration & Seeding
```
php artisan migrate
php artisan db:seed

** specific migration and seeder**
php artisan migrate:refresh --path=/database/migrations/file_name
php artisan db:seed --class=UsersTableSeeder
```

### Creating `public/.htaccess` (If not available)
**Apache :** <br/>
If the .htaccess file that ships with Laravel does not work with your Apache installation, try this alternative:
```

Options +FollowSymLinks -Indexes
RewriteEngine On

RewriteCond %{HTTP:Authorization} .
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```
**Nginx :** <br/>
If you are using Nginx, the following directive in your site configuration will direct all requests to the index.php front controller:
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### Generate APP Key
```
php artisan key:generate
```

### Generate Passport Keys
```
php artisan passport:install
```


### Compiling Controllers
```
composer dump-autoload
```


### Starting the Engine
Tighten up the seatbelt and You're ready to ride...
```
php artisan serve
```

## Caveats & Solutions

**Issue :** Specified key was too long error

**Solution :**
Edit your `app/Providers/AppServiceProvider.php` and inside the boot method set a default string length to 191.
```
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
```

**Issue :** symlink(): Permission denied

**Solution :**
Run following command
```
php artisan storage:link
```

## Create a Migration File from DB
```
php artisan migrate:generate
```

## Create a Seed From Data
```
php artisan iseed projects,project_logs,permission_role,permissions,menu_items,menus,data_types,data_rows,roles --force
```

## Docker Fans
This application can be also run on docker
-- Development Friendly
-- Not for Production

### PreRequisites
[Docker Desktop](https://www.docker.com/products/docker-desktop)
MySQL Workbench or Any Native MYSQL Tools except PHPMYADMIN

### Play Commands
```
Start containers in background
$ docker-compose up -d

Stop containers
$ docker-compose kill

Force rebuild of Dockerfiles
$ docker-compose up -d --build

See list of running containers
$ docker ps

Dive inside container (Example : cms_app)
$ docker exec -ti [CONTAINER ID] bash

Remove dangling/untagged images
$ docker images -q --filter dangling=true | xargs docker rmi

Remove stopped containers
$ docker ps -aq --no-trunc -f status=exited | xargs docker rm
```

### Access App
http://127.0.0.1:8080/

### Access DB
Server : 127.0.0.1
User : root
Password : mysql
Port : 33061

### Access Generator
http://localhost:8081/generator_builder

### Access Routes
http://localhost:8081/routes

### Access API Doc
http://localhost:8081/api/docs

### Login
http://localhost:8081
user: gadadarshan@gmail.com
pass: 12345678


## References
https://labs.infyom.com/laravelgenerator/docs/6.0/installation<br/>
