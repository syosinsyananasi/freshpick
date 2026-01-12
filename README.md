# FreshPick

FreshPick は生鮮食品の商品管理アプリケーションです。商品の登録・編集・削除、検索、並び替え機能を備えています。


## 概要

季節ごとの生鮮食品を管理し、ユーザーが簡単に商品を検索・閲覧できるWebアプリケーションです。

## 機能一覧

- 商品一覧表示（ページネーション対応：6件/ページ）
- 商品検索（商品名での部分一致検索）
- 価格順での並び替え（高い順・低い順）
- 商品詳細表示
- 商品登録（画像アップロード対応）
- 商品情報更新
- 商品削除
- 季節タグの複数選択機能

## 使用技術

- PHP 7.3 / 8.0
- Laravel 8.75
- MySQL 8.0.26
- nginx 1.21.1
- Docker / Docker Compose

## 環境構築

### 必要な環境

- Docker
- Docker Compose
- Git

### セットアップ手順

1. リポジトリをクローン

```bash
git clone <git@github.com:syosinsyananasi/freshpick.git>
cd freshpick
```

2. Docker コンテナを起動

```bash
docker-compose up -d --build
```

3. PHP コンテナに入る

```bash
docker-compose exec php bash
```

4. 依存パッケージをインストール

```bash
composer install
```

5. 環境設定ファイルを作成

```bash
cp .env.example .env
```

6. アプリケーションキーを生成

```bash
php artisan key:generate
```

7. シンボリックリンクを作成（画像保存用）

```bash
php artisan storage:link
```

8. データベースのマイグレーションを実行

```bash
php artisan migrate
```

9. シーディングを実行（ダミーデータ投入）

```bash
php artisan db:seed
```

## アクセス方法

セットアップ完了後、以下のURLでアクセスできます。

- アプリケーション: http://localhost
- phpMyAdmin: http://localhost:8080

### phpMyAdmin ログイン情報

- サーバー: mysql
- ユーザー名: laravel_user
- パスワード: laravel_pass
- データベース: laravel_db

## データベース設計

![ER図](docs/relation.drawio.png)