# Установка и использование
___

## Composer

Для установки пакетов и зависимостей

```
composer install
```
или 
```
composer install --ignore-platform-req=ext-dom --ignore-platform-req=ext-curl
```

## .env

Переименовать .env-example в .env 

Заполнить данные о БД.

## Docker

Для сборки docker-контейнера использовал Laravel Sail.

После установки пакетов для удобства использования необходимо создать alias

```
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

Сборка контейнера

```
sail up -d 
```
___

В случае ошибки `[ERROR] Another process with pid # is using unix socket file.` удалить `docker/volumes/project_name/_data/mysql.sock.lock` файл.

## БД

После запуска контейнера создайте БД test_task и запустите миграции 

```
sail artisan migrate --seed
```

Таким образом буду созданы два пользователя с email admin@admin.ru и user@user.ru . Пароль для обоих пользователей password.

## Admin panel 

Для установки 

```
sail artisan voyager:install
```

Для создания администратора 
```
sail artisan voyager:admin admin@admin.ru
```

Теперь пользователь с email `admin@admin.ru` обладает доступом к панели администратора.

### функции

Просмотр пользователей, возможность блокировки.

*Заблокированный пользователь теряет доступ к аккаунту.*

![Imgur](https://i.imgur.com/VEGhk3u.png)
___
**Просмотр *"паст"***

![](https://i.imgur.com/hlVKJmq.png)
___
**Просмотр жалоб**

![](https://i.imgur.com/H9w1yO6.png)
___

## Api

Написанны Api запросы  для пользователей, "паст" , жалоб.

Запросы могут выполняться с использованием `JwtToken`. Для этого необходимо раскомментировать middleware в `rotes/api.php`

Далее 
```
sail artisan jwt:secret
```

Будет создан jwt token в .env. После необходимо послать POST запрос по маршруту `http://localhost:3002/api/auth/login` с параметрами `email` и `password`

[JwtAuth](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/)

## Планировщик 

Чтобы не захламлять таблицу "пастами", время жизни которых истекло, в планировщике описал задачу для их удаления из таблицы. 

Для запуска задачи

```
sail artisan schedule:work 
```











