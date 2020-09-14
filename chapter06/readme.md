<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
**Table of Contents**  *generated with [DocToc](https://github.com/thlorenz/doctoc)*

- [オブジェクト](#%E3%82%AA%E3%83%96%E3%82%B8%E3%82%A7%E3%82%AF%E3%83%88)
  - [用語](#%E7%94%A8%E8%AA%9E)
  - [メモ](#%E3%83%A1%E3%83%A2)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

# オブジェクト

## 用語
* オブジェクト : クラスを実際に形にしたもの。
* プロパティ : オブジェクトに関連付けられたデータ
* メソッド : オブジェクトに関連付けられた関数
* カプセル化 : そのクラスのオブジェクトを使うためのメソッドをクラス自身で提供する。外部から直接操作できなくする。

## メモ
* `static`で宣言したメソッドでは`$this`は使用できない。
* `final`で宣言したメソッドはサブクラスでそのメソッドをオーバーライドできなくなる
* `protected`で宣言したメソッドは同じクラスのメソッド or そのクラスを継承したクラスのメソッドからしか呼べない