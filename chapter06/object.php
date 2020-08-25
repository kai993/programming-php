<?php
class Person
{
    public $name = '';
    public $age;

    public function __construct()
    {
        $this->name = "anonymous";
        $this->age = 0;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($newName)
    {
        $this->name = $newName;
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

    final function f() { return "f"; }

    // タイプヒンティング
    public function takeJob(Job $job)
    {
        echo "Now employed as a {$job->title}\n";
    }

    // 巨大なデータを扱う
    public function __get($property)
    {
        if ($property === 'biography')
        {
            $biobraphy = "big data";
            return $biobraphy;
        }
    }

    public function __set($property, $value)
    {
        if ($property === 'biography')
        {
            // 値をデータベースに保存する
        }
    }
}

// class Child extends Person {
//     function f() {
//         return "child f";
//     }
// }

class SupernaturalPerson extends Person
{
    public function incrementAge()
    {
        // 年齢を逆に進める
        $this->decrementAge();
    }
}

$p = new Person();
$p->setName("Fred");
echo($p->getName() . "\n"); // Fred

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
HTMLStuff::startTable();
// ..
HTMLStuff::endTable();

$person = new Person();
$person->incrementAge(); // 年齢が1才になりました
// $person->decrementAge(); // これは呼べない(protected)
// $person->ageChanged();   // これも呼べない(private)

$person = new SupernaturalPerson();
$person->incrementAge(); // 年齢が-1才になりました

/* 定数 */
class PaymentMethod
{
    const TYPE_CREDITCARD = 0;
    const TYPE_CASH       = 1;

    public static function name(int $type)
    {
        switch ($type) {
            case self::TYPE_CREDITCARD:
                return "クレジットカード";
                break;
            case self::TYPE_CASH:
                return "現金";
                break;
            default:
                return "nothing";
        }
    }
}

echo(PaymentMethod::name(PaymentMethod::TYPE_CASH) . "\n"); // 現金

/* 継承 */
interface Printable
{
    function printOutput();
}

class ImageComponent implements Printable
{
    public function printOutput()
    {
        echo "画像を印刷します...\n";
    }
}

/* トレイト */
trait Logger
{
    public function log($logString)
    {
        $className = __CLASS__;
        echo date("Y-m-d h:i:s", time()) . ": [{$className}] {$logString}\n";
    }
}

class User
{
    use Logger;

    public $name;

    function __construct($name = 'anonymous')
    {
        $this->name = $name;
        $this->log("Created user '{$this->name}'");
    }

    function __toString()
    {
        return $this->name;
    }
}

class UserGroup
{
    use Logger;

    public $users = array();

    public function includesUser($user)
    {
        return in_array($user, $this->users);
    }

    public function addUser(User $user)
    {
        if (!$this->includesUser($user))
        {
            $this->users[] = $user;
            $this->log("Added user '{$user}' to group");
        }
    }
}

$group = new UserGroup();
$group->addUser(new User("Fred!"));
// 2020-08-23 11:50:33: [User] Created user 'Fred!'
// 2020-08-23 11:50:33: [UserGroup] Added user 'Fred!' to group

trait First
{
    public function doFirst()
    {
        echo "first\n";
    }
}

trait Second
{
    public function doSecond()
    {
        echo "second\n";
    }
}

trait Third
{
    use First, Second;

    public function doAll()
    {
        $this->doFirst();
        $this->doSecond();
    }
}

class Combined
{
    use Third;
}

$object = new Combined();
$object->doAll();
// first
// second

trait Command
{
    function run()
    {
        echo "コマンドを走らせます\n";
    }
}

trait Marathon
{
    function run()
    {
        echo "マラソンを走ります\n";
    }
}

class Person2
{
    use Command, Marathon {
        Marathon::run insteadof Command;
    }
}

class Person3
{
    use Command, Marathon {
        Command::run as runCommand;
        Marathon::run insteadof Command;
    }
}

$person = new Person2();
$person->run(); // マラソンを走ります

$person = new Person3();
$person->run();        // マラソンを走ります
$person->runCommand(); // コマンドを走らせます

/* 抽象メソッド */
abstract class Component
{
    abstract function printOutput();
}

class ImageComponent2 extends Component
{
    function printOutput()
    {
        echo "きれいな画像を表示します";
    }
}

trait Sortable
{
    abstract function uniquedID();

    function compareById($object)
    {
        return ($object->uniquedID() < $this->uniquedID()) ? -1 : 1;
    }
}

class Bird
{
    use Sortable;

    function uniquedID()
    {
        return __CLASS__ . ":{$this->id}";
    }
}

// class Car
// {
//     use Sortable;
// }

/* コンストラクタ */
class Person4
{
    public $name, $address, $age;

    function __construct($name, $address, $age)
    {
        $this->name    = $name;
        $this->address = $address;
        $this->age     = $age;
    }
}

class Employee extends Person4
{
    public $position, $salary;

    function __construct($name, $address, $age, $position, $salary)
    {
        parent::__construct($name, $address, $age);

        $this->position = $position;
        $this->salary   = $salary;
    }
}

/* デストラクタ */
class Building
{
    function __destruct()
    {
        echo "ビルが破壊されつつあります！";
    }
}

/* 内部検査 */
$class = "Person";
$methods = get_class_methods($class);
$methods = get_class_methods(Person);
$methods = get_class_methods("Person");
var_dump($methods);

$vars = get_class_vars($class);
var_dump($vars);

// 宣言されている全クラスの表示
function displayClasses()
{
    $classes = get_declared_classes();

    foreach ($classes as $class) {
        echo "## {$class}についての情報\n";
        echo "### クラスのメソッド\n";

        $methods = get_class_methods($class);

        if (!count($methods)) {
            echo "なし\n";
        } else {
            foreach ($methods as $method) {
                echo "* {$method}\n";
            }
        }

        echo "### クラスのプロパティ\n";
        $properties = get_class_vars($class);
        if (!count($properties)) {
            echo "なし\n";
        } else {
            foreach (array_keys($properties) as $property) {
                echo "* {$property}n";
            }
        }
    }

    echo "------------------------------\n";
}

// displayClasses();

$anonymous = new Person();
$props = get_object_vars($anonymous);
var_dump($props);
// array(2) {
//   ["name"]=>
//   string(9) "anonymous"
//   ["age"]=>
//   int(0)
// }

class A {}
class B extends A {}

$obj = new B();
echo get_parent_class($obj) . "\n"; // A
echo get_parent_class(B)    . "\n"; // A
