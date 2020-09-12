<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>私の書庫</title>
  </head>
  <body>
  <?php
  error_reporting(1);

  class BookList
  {
    const FIELD_TYPE_SINGLE    = 1;
    const FIELD_TYPE_ARRAY     = 2;
    const FIELD_TYPE_CONTAINER = 3;

    var $parser;
    var $record;
    var $currentField = '';
    var $fieldType;
    var $endsRecord;
    var $records;

    function __construct($filename)
    {
      $this->parser = xml_parser_create();
      xml_set_object($this->parser, $this);
      xml_set_element_handler($this->parser, "elementStarted", "elementEnded");
      xml_set_character_data_handler($this->parser, "handleCdata");

      $this->fieldType = array(
        'title'   => self::FIELD_TYPE_SINGLE,
        'author'  => self::FIELD_TYPE_ARRAY,
        'isbn'    => self::FIELD_TYPE_SINGLE,
        'comment' => self::FIELD_TYPE_SINGLE
      );

      $this->endsRecord = array('book' => true);

      $xml = join('', file($filename));
      xml_parse($this->parser, $xml);

      xml_parser_free($this->parser);
    }

    function elementStarted($parser, $element, &$attributes)
    {
      $element = strtolower($element);

      if ($this->fieldType[$element] != 0) {
        $this->currentField = $element;
      } else {
        $this->currentField = '';
      }
    }

    function elementEnded($parser, $element)
    {
      $element = strtolower($element);
      if ($this->endsRecord[$element]) {
        $this->records[] = $this->record;
        $this->record = array();
      }

      $this->currentField = '';
    }

    function handleCdata($parser, $text)
    {
      if ($this->fieldType[$this->currentField] == self::FIELD_TYPE_SINGLE) {
        $this->record[$this->currentField] .= $text;
      } else if ($this->fieldType[$this->currentField] == self::FIELD_TYPE_ARRAY) {
        $this->record[$this->currentField][] = $text;
      }
    }

    function showMenu()
    {
      echo "<table>\n";
      foreach ($this->records as $book) {
        echo "<tr>";
        echo "  <th><a href=\"{$_SERVER['SCRIPT_NAME']}?isbn={$book['isbn']}\">";
        echo "    {$book['title']}</a></th>\n";
        echo "  <td>" . join(', ', $book['author']) . "</td>\n";
        echo "</tr>\n";
      }
      echo "</table>\n";
    }

    function showBook($isbn)
    {
      foreach ($this->records as $book) {
        if ($book['isbn'] !== $isbn) {
          continue;
        }

        echo "<p>";
        echo "<b>{$book['title']}</b> by " . join(', ', $book['author']) . "<br/>";
        echo "ISBN: {$book['isbn']}<br />";
        echo "コメント: {$book['comment']}<br />";
        echo "</p>\n";
      }
    }
  }

  $library = new BookList("books.xml");
  if (isset($_GET['isbn'])) {
    // 詳細情報を返す
    $library->showBook($_GET['isbn']);
  } else {
    // メニューを返す
    $library->showMenu();
  }
  ?>
  </body>
</html>