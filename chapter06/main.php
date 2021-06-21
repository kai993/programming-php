<?php
class Person
{
    public $name;
    public $age;
    public $address;
    static $global = 32;

    public function __get($peroperty)
    {
        if ($peroperty === 'biography') {
            $biography = 'to long data...';
        }
        return $biography;
    }

    public function __set($peroperty, $value)
    {
        if ($peroperty === 'biography') {
            // 値をデータベースに保存する
        }
    }

    final function getName()
    {
        return $this->name;
    }

    function setName($newName)
    {
        $this->name = $newName;
    }

    public function __construct($name, $address, $age)
    {
        $this->name    = $name;
        $this->address = $address;
        $this->age     = $age;
    }

    public function __destruct()
    {
        echo "done.(person)\n";
    }

    public function incrementAge()
    {
        $this->age += 1;
        $this->ageChanged();
    }

    protected function decrementAge()
    {
        $this->age -= 1;
        $this->ageChanged();
    }

    private function ageChanged()
    {
        echo "年齢が{$this->age}才になりました\n";
    }
}

class Employee extends Person
{
    public $position, $salary;

    function __construct($name, $address, $age, $position, $salary)
    {
        parent::__construct($name, $address, $age);
        $this->position = $position;
        $this->salary   = $salary;
    }
}

class SupernaturalPerson extends Person {
    public function incrementAge()
    {
        // 年齢を進める
        $this->decrementAge();
    }
}

class HTMLStuff
{
    static function startTable()
    {
        echo "<table border=\"1\">\n";
    }

    static function endTable()
    {
        echo "</table>\n";
    }
}

class PaymentMethod
{
    const TYPE_CREDITCARD = 0; // クレジットカード
    const TYPE_CASH = 1;       // 現金
    const TYPE_POINT = 2;      // 全額ポイント
}

class C1
{
    public function f1()
    {
        echo "c1\n";
    }
}

class C2 extends C1
{
    public function f1()
    {
        echo "c2\n";
        parent::f1();
    }
}

interface Printer
{
    function printOutput();
}

class ImageComponent implements Printer
{
    function printOutput()
    {
        echo "画像を印刷します...\n";
    }
}

function main() {
    // クラス宣言
    $p = new Person("Taro", "Tokyo", 23);
    $p->setName("anonymous");
    echo $p->getName() . "\n"; // anonymous

    HTMLStuff::startTable(); // <table border="1">
    HTMLStuff::endTable();   // </table>

    $p = new Person("Taro", "Tokyo", 23);
    $p->incrementAge(); // 年齢が1才になりました
    $p->incrementAge(); // 年齢が2才になりました
    $p->incrementAge(); // 年齢が3才になりました
    $p->incrementAge(); // 年齢が4才になりました
    $p->incrementAge(); // 年齢が5才になりました

    $person = new SupernaturalPerson("Taro", "Tokyo", 23);
    $person->incrementAge(); // 年齢が-1才になりました

    echo $person::$global . "\n"; // 32

    // 定数
    echo PaymentMethod::TYPE_POINT . "\n";

    // 継承
    $c2 = new C2;
    $c2->f1();
    if ($c2 instanceof C1) {
        echo "C1のサブクラスです\n"; // C1のサブクラスです
    }

    // インターフェイス
    $p = new ImageComponent;
    $p->printOutput(); // 画像を印刷します...
}

main();
