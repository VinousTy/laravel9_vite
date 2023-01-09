# お手軽 LAMP 環境構築

PHP + Nginx + MySQL

# ファイル置き場

app ディレクトリ配下に置いてください。

```
docker-compose up -d
```

# laravel インストール

app コンテナ内で下記コマンドを入力

```
composer create-project 'laravel/laravel=9.*' --prefer-dist プロジェクト名
```

# db の接続設定

env ファイルの DB_HOST の欄には db と入力。
→ コンテナのサービス名を入力する必要があるため
