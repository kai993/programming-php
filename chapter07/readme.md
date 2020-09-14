# 7章 ウェブに関するテクニック
次について学ぶ
* フォームやセッション
* リダイレクト
* フォーム
* ファイルのアップロード
* クッキーの送信
* セッション

## TOC

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [HTTPの基本](#http%E3%81%AE%E5%9F%BA%E6%9C%AC)
- [変数](#%E5%A4%89%E6%95%B0)
- [サーバーの情報](#%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E3%81%AE%E6%83%85%E5%A0%B1)
- [フォームの処理](#%E3%83%95%E3%82%A9%E3%83%BC%E3%83%A0%E3%81%AE%E5%87%A6%E7%90%86)
  - [メソッド](#%E3%83%A1%E3%82%BD%E3%83%83%E3%83%89)
  - [パラメータ](#%E3%83%91%E3%83%A9%E3%83%A1%E3%83%BC%E3%82%BF)
  - [複数選択](#%E8%A4%87%E6%95%B0%E9%81%B8%E6%8A%9E)
  - [ファイルのアップロード](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%AE%E3%82%A2%E3%83%83%E3%83%97%E3%83%AD%E3%83%BC%E3%83%89)
- [レスポンスヘッダの設定](#%E3%83%AC%E3%82%B9%E3%83%9D%E3%83%B3%E3%82%B9%E3%83%98%E3%83%83%E3%83%80%E3%81%AE%E8%A8%AD%E5%AE%9A)
- [コンテンツタイプ](#%E3%82%B3%E3%83%B3%E3%83%86%E3%83%B3%E3%83%84%E3%82%BF%E3%82%A4%E3%83%97)
  - [リダイレクト](#%E3%83%AA%E3%83%80%E3%82%A4%E3%83%AC%E3%82%AF%E3%83%88)
  - [有効期限](#%E6%9C%89%E5%8A%B9%E6%9C%9F%E9%99%90)
  - [認証](#%E8%AA%8D%E8%A8%BC)
- [状態の管理](#%E7%8A%B6%E6%85%8B%E3%81%AE%E7%AE%A1%E7%90%86)
  - [クッキー](#%E3%82%AF%E3%83%83%E3%82%AD%E3%83%BC)
  - [セッション](#%E3%82%BB%E3%83%83%E3%82%B7%E3%83%A7%E3%83%B3)
- [SSL](#ssl)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

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
### メソッド
クライアントからデータをサーバーに送るHTTPメソッドにはGETとPOSTの2種類がある。

GETとPOSTの違い
* HTTPの仕様ではGETリクエストは冪等(idempotent)であるべきで、何回リクエストしても同じになるということ。

つまり、サーバーに変更を加えるような動作(DBの更新、注文など)にはGETリクエストを使ってはいけない。

```php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // GETリクエストを処理する
} else {
  die("このページではGETでしか取得できません");
}
```

### パラメータ
パラメータを使うには `$_POST`, `$_GET`, `$_FILES`といった配列を使用する。
HTMLのフィールド名としてピリオドは使用できるが、PHPの変数名では使えないので_に変換される

### 複数選択
HTMLフォームのフィールド名の最後に`[]`を付ける
```html
<select name="languages[]">
  <option name="go">Go</option>
  <option name="php">PHP</option>
  <option name="scala">Scala</option>
</select>
```

フォームの内容が`$_GET['languages']`に格納されるようになる。

### ファイルのアップロード
ファイルのアップロードには`$_FILES`配列を使用する。
ファイルアップロード用や認証用の関数を組み合わせることができる。

大容量ファイルのアップロードを防ぐには2種類の方法がある。
* `php.ini`で`upload_max_filesize`を使う。デフォルトは2MB
* ファイルアップロード用のフォームで`MAX_FILE_SIZE`パラメータを送信する。

ファイルが正常にアップロードされたかを調べる
```php
<?php
if (is_uploaded_file($_FILES['toProcess']['tmp_name'])) {
  // アップロード成功
}
```

アップロードされるディレクトリは`php.ini`の`upload_tmp_dir`で設定する。
ここから移動するには`move_uploaded_file()`関数を使用する。

## レスポンスヘッダの設定
サーバーがクライアントに返すHTTPレスポンスにはヘッダが含まれていて、ヘッダには次のものがある。
* レスポンスの内容
* 送信したサーバーについての情報
* 本文のバイト数など

phpではヘッダーを設定する場合は`header()`を使う。

## コンテンツタイプ
Content-Typeヘッダは返すドキュメント形式を指定する(通常はtext/html)。

### リダイレクト
ブラウザに新しいURLを表示させるにはLocationヘッダを設定する

### 有効期限
サーバー側で、ブラウザやプロキシに対して明示的にドキュメントの有効期限を設定することができる。
ブラウザやプロキシではその有効期限に達するまでキャッシュを保持する。
キャッシュされたドキュメントを何度読み込んでもサーバーとのやりとりをすることは発生しない。
期限が切れた場合はドキュメントを読み込もうとするとサーバーに接続しようとする。

キャッシュさせない方法
```php
<?
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
```

### 認証
HTTP認証はリクエストヘッダとレスポンスステータスによって行われる。

1. ブラウザがリクエストヘッダにユーザー名とパスワード(身分証明)を指定して送信する
2. 身分証明が送信されなかった or サーバー側の条件を満たさなかった場合「401 Unauthorized」というレスポンスを返し、WWW-Authenticateヘッダで認証レルムを示す。

## 状態の管理
HTTPはステートレスなプロトコル

### クッキー
* いくつかのフィールドからなる文字列
* サーバー側でクッキーをレスポンスヘッダに埋め込み、クライアントに送信する。
* ユーザーを識別するユーザーIDや設定項目などを保存する

クッキーをブラウザに送信するためには`setcookie()`関数を使用する。
```php
setcookie ( string $name [, string $value = "" [, int $expires = 0 [, string $path = "" [, string $domain = "" [, bool $secure = FALSE [, bool $httponly = FALSE ]]]]]] ) : bool
```

https://www.php.net/manual/ja/function.setcookie.php

クッキーを使う際の注意点
* クライアントがクッキーを無効にしている場合もある
* 1つのクッキーのサイズが4KBを超えてはいけない
* クッキーが最大300個までなど

### セッション
* 複数のリクエストに跨って同じ変数を持続させられるようになる
* フォーム・認証情報・ユーザー情報を各ページに引き継ぐことができる
* 初めての訪問者に対してセッションIDを発行し、`PHPSESSID`という名前のクッキーに保存される
* セッションにはデータを保存する機能がある
* セッションに変数が登録されていると、各ページの開始時に自動的にその内容が読み込まれ、ページの終了時に自動的に保存される

## SSL
* Secure Sockets Layerの略
* HTTPリクエスト・レスポンスをより安全な経路で行うようにするもの
* SSL接続経由のリクエストでPHPのページが作成された場合は、配列`$_SERVER`のエントリ`HTTPS`が`on`に設定される。

```php
<?
if ($_SERVER['HTTPS'] !== 'on') {
  die("安全な接続でないと使用できません");
}
```

