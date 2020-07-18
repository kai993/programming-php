<?php
class Person
{
  public $name = '';

  function name($newname = NULL)
  {
    if (!is_null($newname)) {
      $this->name = $newname;
    }

    return $this->name;
  }
}

$p = new Person;
$p->name("Mike");
echo "Hello {$p->name}!\n";
