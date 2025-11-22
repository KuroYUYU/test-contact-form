# アプリケーション名
FashionablyLate（お問い合わせフォーム）

# 環境構築
## Dockerビルド
・
・docker-compose up -d --build

## Larabel環境構築
・docker-compose exec php bash

・composer install

・cp .env.example .env , 環境変数を適宣変更

・php artisan key:generate

・php artisan migrate

・php artisan db:seed

# 開発環境
・お問い合わせ画面：http://localhost/

・ユーザー登録画面：http://localhost/register

・phpMyAdmin：http://localhost:8080/

# 使用技術(実行環境)
・PHP:8.1.33


・Laravel:8.83.29

・MySQL:Ver 8.0.26

・nginx:1.21.1

# ER図

<img width="574" height="451" alt="ER" src="https://github.com/user-attachments/assets/49261d27-711f-43fc-b945-da881118da1a" />
