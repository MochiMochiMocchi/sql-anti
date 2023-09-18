FROM php:7.4-cli

# PDO MySQL extensionをインストール
RUN docker-php-ext-install pdo_mysql

