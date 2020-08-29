# 7章 ウェブに関するテクニック
次について学ぶ
* フォームやセッション
* リダイレクト
* フォーム
* ファイルのアップロード
* クッキーの送信
* セッション

## HTTPの基本
* ウェブはHTTP(HyperText Transfer Protocol)上で動作する。
* HTTPプロトコルはウェブブラウザがサーバーにファイルを要求する方法や、サーバーがウェブブラウザにファイルを返す方法を定義するもの。
* ウェブページ閲覧までの流れ
  * ブラウザはサーバーにHTTPリクエストメッセージを送信
  * Webサーバーはリクエストに対するレスポンスを返す

HTTPリクエストの最初の行
```
GET /index.html HTTP/1.1
```

* `GET` : メソッド
* `/index.html` : ドキュメントの場所
* `HTTP/1.1` : HTTPプロトコルのバージョン

オプションのヘッダ情報
```
User-Agent: Mozilla/5.0 (Windows 2000; U) Opera 6.0  [en]
Accept: img/gif, image/jpeg, text/*, */*

```

* `User-Agent` : ウェブブラウザについての情報を提供する
* `Accept` : ブラウザが想定しているMIMEタイプを指定する

HTTPレスポンスの最初の行

```
HTTP/2 301 
```

* `HTTP/2` : プロトコルのバージョン
* `301` : ステータスコード(リダイレクト)

レスポンスに関する追加情報
```
location: https://www.google.com/
content-type: text/html; charset=UTF-8
date: Sat, 29 Aug 2020 01:28:34 GMT
expires: Mon, 28 Sep 2020 01:28:34 GMT
cache-control: public, max-age=2592000
server: gws
content-length: 220
x-xss-protection: 0
```

* `location` : リダイレクト先のURL
* `content-type` : リソースのメディア種別
* `date` : メッセージが発信された日時
* `expires` : レスポンスが古くなるとみなされる日時
* `cache-control` : リクエストとレスポンスの両方でキャッシュのためのディレクティブ(指示)が格納される
* `server` : リクエストをしたオリジンサーバー、レスポンスを生成したサーバーで使用されたソフトウェア
* `content-length` : 受信者に送信されるエンティティの長さをバイト単位で示す

## 変数
サーバーの設定やリクエストに関する情報を取得する方法は3つあり、EGPCSと呼ぶこともある(Environment GET, POST, Cookie, Server)

PHPではEGPCS情報を格納するために6つのグローバル配列を作成する
* `$_COOKIE`

    リクエストで渡されたクッキーの値を保持する。クッキーの名前が配列のキーとなる

* `$_GET`

    GETリクエストで渡されたパラメータの内容を保持する。パラメータの名前が配列のキーとなる

* `$_POST`

    POSTリクエストで渡されたパラメータの内容を保持する。パラメータの名前が配列のキーとなる

* `$_FILES`

    アップロードされたファイルに関する情報を保持する

* `$_SERVER`

    ウェブサーバーに関する情報を保持する

* `$_ENV`

    環境変数の値を保持する。環境変数の名前が配列のキーとなる

## サーバーの情報
`$_SERVER`にはウェブサーバーの情報が数多く含まれている。  
https://www.php.net/manual/ja/reserved.variables.server.php

* `SCRIPT_NAME` : 現在のスクリプトの名前。ドキュメントルートからの相対パスで表したもの
* `SERVER_SOFTWARE` : サーバーを識別するための文字列
* `SERVER_NAME` : 自身のURLを表すためのホスト名、DNS、IPアドレス
* `SERVER_PROTOCOL` : リクエストプロトコルの名前とリビジョン

## フォームの処理

## レスポンスヘッダの設定

## 状態の管理

## SSL

