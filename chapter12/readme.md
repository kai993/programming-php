# 12章 セキュリティ

## TOC
<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [入力のフィルタリング](#%E5%85%A5%E5%8A%9B%E3%81%AE%E3%83%95%E3%82%A3%E3%83%AB%E3%82%BF%E3%83%AA%E3%83%B3%E3%82%B0)
- [クロスサイトスクリプティング](#%E3%82%AF%E3%83%AD%E3%82%B9%E3%82%B5%E3%82%A4%E3%83%88%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%97%E3%83%86%E3%82%A3%E3%83%B3%E3%82%B0)
- [出力のエスケープ](#%E5%87%BA%E5%8A%9B%E3%81%AE%E3%82%A8%E3%82%B9%E3%82%B1%E3%83%BC%E3%83%97)
- [セッションの固定化](#%E3%82%BB%E3%83%83%E3%82%B7%E3%83%A7%E3%83%B3%E3%81%AE%E5%9B%BA%E5%AE%9A%E5%8C%96)
- [ファイルのアップロード](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%AE%E3%82%A2%E3%83%83%E3%83%97%E3%83%AD%E3%83%BC%E3%83%89)
- [ファイルへのアクセス](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%B8%E3%81%AE%E3%82%A2%E3%82%AF%E3%82%BB%E3%82%B9)
- [PHPのコード](#php%E3%81%AE%E3%82%B3%E3%83%BC%E3%83%89)
- [シェルのコマンド](#%E3%82%B7%E3%82%A7%E3%83%AB%E3%81%AE%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89)
- [まとめ](#%E3%81%BE%E3%81%A8%E3%82%81)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## 入力のフィルタリング
* アプリケーション自身で生成したデータ以外は全て汚染されている可能性がある
  * フォームから受け取ったデータ
  * ファイルから受け取ったデータ
  * データベースから受け取ったデータ

フィルタリング処理に関するおすすめの方法
* ホワイトリスト方式

    データが無効である条件を定義するのではなく、データが有効である条件を定義データが無効である条件を定義するのではなく、データが有効である条件を定義する。
    条件を満たさない場合は全て向こうとして扱う。

* 無効なデータを修正しない

    修正時のミスや修正漏れなどで新たな脆弱性を引き起こしてしまう

* 命名規則を決める

    フィルタリング済みのデータを汚染されているデータがきちんと区別できるようにする。

ユーザー名を英数字のみ + 長さを制限したい場合
```php
<?
$clean = array();
$length = mb_strlen($_POST['username']);
if (ctype_alnum($_POST['username']) && ($length > 0) && ($length <= 32) {
  $clean['username'] = $_POST['username'];
} else {
  /* エラー */
}
```

## クロスサイトスクリプティング
- 現在最もよく見かけられるウェブアプリケーションの脆弱性
- Ajaxの登場により、XSS攻撃はより高度なものとなり頻繁に起きるようになっている
- XSS攻撃でできることはクライアント側の技術でできることに限られる
- 元々はクライアントのクッキーを盗むために用いられてきた
- XSS攻撃を防ぐために二つようなのは、コンテキストに合わせて適切に出力内容をエスケープすることだけ

```php
<?php
$html = array(
  'username' => htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'),
);
echo $html['username'];
```

### SQLインジェクション
- 2番目に多いのがSQLインジェクション
- エスケープしないと、悪意のある値を入力することでSQLクエリの機能を変えることができてしまう

SQLインジェクションの例
```
# 入力
chris` --

# 生成されるSQL
select count(*)
from users
where username = 'chris' --'
and password = '...';

# 実行されるクエリ(--はコメントになるため)
select count(*)
from users
where username = 'chris'
```

出力をエスケープする必要がある
```php
<?php
$mysql = array();

$hash = hash($_POST['password']);
$mysql['username'] = mysql_real_escape_string($clean['username']);

$sql = "select count(*) from users where username = '{$mysql['username']}' and password = '{$hash}'";

$result = mysql_query($sql);
```

SQLインジェクションを防ぐために最適な方法はバインド変数を使うこと
```php
<?php
$sql = $db->prepare("select count(*) from users where username = :username and password = :hash");
$sql->bindParam(":username", $clean['username'], PDO::PARAM_STRING, 32);
$sql->bindParam(":hash",     $clean['password'], PDO::PARAM_STRING, 32);
```

バインド変数に代入したパラメータは確実にデータとして扱われることが保証されるのでユーザー名・パスワードなどのエスケープは不要。

## 出力のエスケープ

## セッションの固定化

## ファイルのアップロード

## ファイルへのアクセス

## PHPのコード

## シェルのコマンド

## まとめ

