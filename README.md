# api_laravel

docker volume create db_volumen

docker run --name mariadb -e MYSQL_ROOT_PASSWORD=root_password_here -e MARIADB_PASSWORD=7654321 -e MARIADB_USER=user -e MARIADB_DATABASE=db -e TZ=America/Bogota -e ALLOW_EMPTY_PASSWORD=no -p 3306:3306  -v db_volumen:/var/lib/mysql  -d mariadb:11.1
