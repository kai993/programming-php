<?php
trait Logger
{
    public function log($logString)
    {
        $className = __CLASS__;
        echo date("Y-m-d h:i:s", time()) . ": [[$className]] {$logString}\n";
    }
}

class User
{
    use Logger;

    public $name;

    public function __construct($name = '')
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
        if (!$this->includesUser($user)) {
            $this->users[] = $user;
            $this->log("Added user '{$user}' to group");
        }
    }
}

$group = new UserGroup;                // 2021-06-20 11:42:59: [[User]] Created user 'Franklin'
$group->addUser(new User("Franklin")); // 2021-06-20 11:42:59: [[UserGroup]] Added user 'Franklin' to group

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

$obj = new Combined;
$obj->doAll();
// first
// second

trait Command
{
    function run()
    {
        echo "Command run.\n";
    }
}

trait Marathon
{
    function run()
    {
        echo "Marathon run.\n";
    }
}

class Person
{
    use Command, Marathon {
        Marathon::run insteadOf Command;
    }
}

$person = new Person;
$person->run(); // Marathon run.

trait T1
{
  public function f()
  {
    echo "A\n";
  }
}

trait T2
{
  public function f()
  {
    echo "B\n";
  }
}

class C
{
  use T1, T2 {
    T2::f insteadOf T1;
  }
}

$c = new C;
$c->f();
