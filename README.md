# 概要
[SQLアンチパターン](https://www.oreilly.co.jp/books/9784873115894/)のサンプルデータベースと、PHP の実行環境を構築します。<br>
<br>
※全章分のクエリやPHPプログラムの用意はある？<br>
　→ ありません。<br>
※テストデータの投入について<br>
　→ Bugテーブル（＋関連テーブル）の分がちょっこっとあります。他のテーブルについてはありません。適宜各自でご対応ください。<br>
※版の違いに伴う差分について<br>
　→ こちらのリポジトリは、2021年5月に発行された12刷の書籍を参考に作成しています。版の違いから発生する差分については適宜各自でご対応ください。

# 目的
「SQLアンチパターン」を読みながら、実際に手を動かしたいけど、環境用意めんど。。って人のお役に立てればとおもって公開しました。

# 使い方
## コンテナを起動する
```
$ docker-compose up -d
```
## PHP を実行する
```
$ docker-compose run php-cli php /app/XXXX.php
$ docker-compose run php-cli php /app/XXXX/XXXX.php
```
## SQL を実行する
```
# コンテナに、実行したい SQL をコピー
$ docker cp ./query_solution/XXXX/XXXX.sql <DBコンテナ名 or DBコンテナID>:/tmp/XXXX.sql

# コンテナにはいる
docker exec -it <DBコンテナ名 or DBコンテナID> bash

# SQL にログイン
$ mysql -u [name] -p[pass] -D [database]

# SQL 実行
mysql> source /tmp/XXXX.sql;
```
