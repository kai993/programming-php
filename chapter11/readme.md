# 11章 XML
* Extensible Markup Languageの略で、標準化されたデータフォーマット
* HTMLと似ていてタグやエンティティなどを使用する
* プログラムでの解析のしやすさを考慮した設計となっているのでXMLドキュメントでできることがはっきり決められている

## TOC

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [XMLとは](#xml%E3%81%A8%E3%81%AF)
- [XMLの作成](#xml%E3%81%AE%E4%BD%9C%E6%88%90)
- [XMLの解析](#xml%E3%81%AE%E8%A7%A3%E6%9E%90)
- [DOMによるXMLの解析](#dom%E3%81%AB%E3%82%88%E3%82%8Bxml%E3%81%AE%E8%A7%A3%E6%9E%90)
- [SimpleXMLによるXMLの解析](#simplexml%E3%81%AB%E3%82%88%E3%82%8Bxml%E3%81%AE%E8%A7%A3%E6%9E%90)
- [XSLTによるXMLの変換](#xslt%E3%81%AB%E3%82%88%E3%82%8Bxml%E3%81%AE%E5%A4%89%E6%8F%9B)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## XMLとは
要素、エンティティ、データからできている
```xml
<book isbn="1-56592-610-2">
  <title>Programming PHP</title>
  <authors>
    <author>Rasmus Lerdorf</author>
    <author>Kevin Tatroe</author>
    <author>Peter MacIntyre</author>
  </authors>
</book>
```

また、最初に処理命令が必須となる。バージョンを指定する。
```xml
<?xml version="1.0" ?>
```

使うタグや属性、エンティティを入れ子にする際の規則などを記録しておく。
2通りの方法がある。
* 文書型定義(DTD)
* スキーマ

## XMLの作成
PHPでXMLドキュメントを作成するにはMIMEタイプヲ変更する。
```php
<?
echo '<?xml version="1.0" encoding="ISO-8859-1" ?>';
```

## XMLの解析
### 要素ハンドラ
パーサーの処理中に要素の開始位置や終了位置に到達すると、開始ハンドラ or 終了ハンドラが呼び出される。
`xml_set_element_header()`でできる。

### エンティティハンドラ
XMLでは標準のエンティティが5種類定義されている
* `&amp;`
* `&gt;`
* `&lt;`
* `&quot;`
* `&apos;`

## DOMによるXMLの解析

## SimpleXMLによるXMLの解析

## XSLTによるXMLの変換

