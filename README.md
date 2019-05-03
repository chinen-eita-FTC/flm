# FLM

## 概要
本アプリケーションは書籍管理システムの開発を通じて以下の項目を達成することを目的とする。  
- MUST
  - 実装時に不明確な仕様・要件については設計者に確認できること
  - 上長の指示がない状態でもプルリクエストを作成してコードレビューを受けられる状態にできること
  - WBS上のスケジュールを意識し期限に間に合わない場合は上長にスケジュールの調整を依頼できること
  - 本アプリケーションの仕組みや概要を第三者に説明できること
- BETTER
  - ORマッパーを利用してRDBのCRUD操作関連の製造ができること
  - 単体レベルのテストコードを製造できること

## 構築手順
ここでは本アプリケーションの構築手順を記載する。

### 前提条件
GitHubアカウントに公開鍵を登録し、SSH接続可能な状態であること  
1. SSH接続テストを実行  
```
$ ssh -T git@github.com
```
2. 上記コマンド実行後、以下のメッセージが出力されることを確認  
```
Hi <GitHubアカウント名>! You've successfully authenticated, but GitHub does not provide shell access.
```

### アプリケーションのソースを取得  
1. 仮想環境との共有ディレクトリに移動
```
$ cd /vagrant/src
```
2. ソースを取得
```
$ git clone git@github.com:chinen-eita-FTC/flm.git
```

### アプリケーションの初期設定
1. `.env` ファイルを作成  
```
$ cp /vagrant/src/flm/.env.example /vagrant/src/flm/.env
```
2. `.env` ファイルを修正  
別途配布された設定項目を参考に修正  
3. 依存パッケージ・ライブラリを取得  
```
$ composer install
```
4. 依存パッケージ・ライブラリの更新
```
$ composer update
```
5. アプリケーションキーの発行
```
$ php artisan key:generate
```
6. パーミッションの変更
```
$ sudo chmod -R 777 /vagrant/src/flm/storage
$ sudo chmod -R 777 /vagrant/src/flm/bootstrap
```

## ブランチ戦略
ここでは本開発のブランチ戦略を記載する。

### ブランチの責務
本開発では以下の3種類のブランチを使用する。  
- master  
常にリリース可能なブランチ。
- develop  
次のリリースのための最新の開発作業の変更を常に反映するブランチ。
- feature  
新機能開発用のブランチ。  
(常にdevelopから派生してdevelopにマージを行う。)

## アーキテクチャの構成
ここでは本開発で実装対象となるアーキテクチャの構成と概要を記載する。
各レイヤの責務については各レイヤの `README.md` に説明を譲ることとする。  

### アーキテクチャ構成図  
app/  
  ├── Exceptions/ ⇒ 各レイヤ独自の例外クラスを格納  
  ├── Http/  
  │   ├── Controllers/ ⇒ コントローラレイヤのクラスを格納   
  │   ├── Middleware/ ⇒ レイヤをまたがる処理を実装したクラスを格納  
  ├── Libraries/ ⇒ ライブラリレイヤのクラスを格納  
  ├── Models/ ⇒ モデルレイヤのクラスを格納  
  ├── Providers/ ⇒ 初期起動処理を定義したクラスを格納  
  └── Services/  ⇒　サービスレイヤのクラスを格納   
config/ ⇒ アプリケーションの設定ファイルを格納  
database/ ⇒ DBのマイグレーションを格納  
public/ ⇒ 公開するリソースファイルを格納  
resources/ ⇒ アセッツコンパイル前のリソースファイルを格納  
routes/  
  └── web.php ⇒ アプリケーションのルーティングを定義  
tests/ ⇒ テストコードを格納  

### 各レイヤのREADMEへのリンク
- [コントローラレイヤ](https://github.com/chinen-eita-FTC/flm/tree/master/app/Http/Controllers) 
- [サービスレイヤ](https://github.com/chinen-eita-FTC/flm/tree/master/app/Services)
- [モデルレイヤ](https://github.com/chinen-eita-FTC/flm/tree/master/app/Models)
- [サービスレイヤ](https://github.com/chinen-eita-FTC/flm/tree/master/app/Services)
