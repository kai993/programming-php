<?php
/* 要素ハンドラ */
function startElement($parser, $name, $attributes)
{
  $outputAttributes = array();
  if (count($attributes)) {
    foreach ($attributes as $key) {
      $value = $attributes[$key];
      $outputAttributes[] = "<font color=\"gray\">{$key}=\"{$value}\"</font>";
    }
  }

  echo "&lt;<b>{$name}</b> " . join(' ', $outputAttributes) . '&gt;';
}

function endElement($parser, $name)
{
  echo "&lt;<b>{$name}</b>&gt;";
}

/* 文字データハンドラ */
function characterData($parser, $data)
{
  echo $data;
}

/* 処理命令ハンドラ */
function processingInstruction($parser, $target, $code)
{
  if ($target === 'php') {
    eval($code);
  }
}

/* エンティティハンドラ */
/**
 * 外部エンティティ参照ハンドラ
 *
 * @param $parser
 * @param $names
 * @param $base
 * @param $systemID
 * @param $publicID
 */
function externalEntityReference($parser, $names, $base, $systemID, $publicID)
{
  if ($systemID) {
    if (!list($parser, $fp) = createParser($systemID)) {
      echo "外部エンティティ {$systemID} をオープンできません\n";
      return false;
    }
    return parse($parser, $fp);
  }

  return false;
}

/* デフォルトハンドラ */
function defaultHandler($parser, $data)
{
  echo "<font color=\"red\">XML: '{$data}' でデフォルトハンドラが呼び出されました</font>\n";
}

function createParser($filename)
{
  $fh = fopen($filename, 'r');
  $parser = xml_parser_create();

  xml_set_element_handler($parser, "startElement", "endElement");
  xml_set_character_data_handler($parser, "characterData");
  xml_set_processing_instruction_handler($parser, "processingInstruction");
  xml_set_default_handler($parser, "defaultHandler");

  return array($parser, $fh);
}

function parse($parser, $fh)
{
  $blockSize = 4 * 1024; // 4KBずつに分割して読み込む
  while($data = fread($fh, $blockSize)) {
    if (!xml_parse($parser, $data, feof($fh))) {
      // エラーが発生したのでその場所を通知する
      echo 'Parser error: ' . xml_error_string($parser) . ' at line ' . xml_get_current_line_number($parser);
      return false;
    }
  }
  return true;
}

if (list($parser, $fh) = createParser("test.xml")) {
  parse($parser, $fh);
  fclose($fh);

  xml_parser_free($parser);

  $error = xml_get_error_code($parser);
  if ($error != XML_ERROR_NONE) {
    die(xml_error_string($error));
  }
}
