# start
```
$ docker-compose up -d
```
# execute src/XXXX.php | src/XXXX/XXXX.php
```
$ docker-compose run php-cli php /app/XXXX.php
$ docker-compose run php-cli php /app/XXXX/XXXX.php
```
# execute solution/XXXX.sql
```
# cp
$ docker cp ./solution/XXXX/XXXX.sql <コンテナ名 or コンテナID>:/tmp/XXXX.sql

# login
$ mysql -u [name] -p[pass] -D [database]

# exec
mysql> source /tmp/XXXX.sql;
```