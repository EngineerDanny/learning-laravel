# LEARNING LARAVEL
This is a backend project to fuel a frontend project which supports
viewing and uploading images.

Only Models involved should be users and images

## MYSQL config
Commands

| ```mysql.server start```     | Starts MYSQL server                   |
|------------------------------|---------------------------------------|
| ```mysql.server stop```      | Stop MYSQL server                     |
| ```mysql.server restart```   | Restart MYSQL server                  |
| ```mysql -uroot```           | Shows MYSQL monitor                   |
| ```top```                    | To show all processes on the computer |
| ```sudo killall mysqld```    | To Kill All MYSQL processes           |
| ```composer dump-autoload``` | Autoload the app                      |



# Run 👇 inside the monitor
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';      


# Starting a Laravel Project
```bash
composer create-project laravel/laravel example-app
 
cd example-app
 
php artisan serve
```

## Temporal UPDATE of PHP Version to support packages (MACOS)
```bash
export PATH="/usr/local/opt/php@8.1/bin:$PATH"
export PATH="/usr/local/opt/php@8.1/sbin:$PATH"
```
