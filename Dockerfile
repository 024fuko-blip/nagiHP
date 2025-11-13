# PHPがインストールされた公式の軽量イメージを使用
FROM php:8.2-apache

# mbstringに必要な依存関係をインストールする
RUN apt-get update && apt-get install -y libonig-dev

# 必要な拡張機能を有効にする
RUN docker-php-ext-install mbstring

# アプリケーションファイルをコンテナのウェブディレクトリにコピー
COPY . /var/www/html/

# Apacheのmod_rewriteを有効にする（必要であれば）
RUN a2enmod rewrite

# 権限を設定
RUN chown -R www-data:www-data /var/www/html