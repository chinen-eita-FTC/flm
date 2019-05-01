# FLM

## 概要

## 構築手順

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

### 各レイヤの責務へのリンク
- [コントローラレイヤ](https://github.com/chinen-eita-FTC/flm/tree/master/app/Http/Controllers) 
- [サービスレイヤ](https://github.com/chinen-eita-FTC/flm/tree/master/app/Services)
- [モデルレイヤ](https://github.com/chinen-eita-FTC/flm/tree/master/app/Models)
- [サービスレイヤ](https://github.com/chinen-eita-FTC/flm/tree/master/app/Services)