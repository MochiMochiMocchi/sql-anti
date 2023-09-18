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
$ docker cp ./solution/XXXX/XXXX.sql <DBコンテナ名 or DBコンテナID>:/tmp/XXXX.sql

# enter a docker container
docker exec -it <DBコンテナ名 or DBコンテナID> bash

# login
$ mysql -u [name] -p[pass] -D [database]

# exec sql
mysql> source /tmp/XXXX.sql;
```