<?php

/**
 * 内部操作
 */
// 宣言されている全クラスの表示
function displayClasses()
{
    $classes = get_declared_classes();

    foreach ($classes as $class) {
        echo "# {$class}の情報\n";
        echo "## クラスのメソッド\n";

        $methods = get_class_methods($class);
        if (!count($methods)) {
            echo "無し\n";
        } else {
            foreach ($methods as $method) {
                echo "- {$method}()\n";
            }
        }

        echo "## クラスのプロパティ\n";
        $properties = get_class_vars($class);
        if (!count($properties)) {
            echo "無し\n";
        } else {
            foreach (array_keys($properties) as $property) {
                echo "- {$property}\n";
            }
        }
        echo str_repeat("-", "40") . "\n";
    }
}

// 呼び出し可能なメソッドの配列を返す
function getCallableMethods($object)
{
    $methods = get_class_methods(get_class($object));

    if (get_parent_class($object)) {
        $parentMethods = get_class_methods(get_parent_class($object));
        $methods = array_merge($methods, $parentMethods);
        $methods = array_unique($methods);
    }

    return $methods;
}

// 継承したメソッドの配列を返す
function getInheritedMethods($object)
{
    $methods = get_class_methods(get_class($object));
    if (get_parent_class($object)) {
        $parentMethods = get_class_methods(get_parent_class($object));
        $methods = array_intersect($methods, $parentMethods);
    }
    return $methods;
}

// スーパークラスの配列を返す
function getLineage($object)
{
    if (get_parent_class($object)) {
        $parent = get_parent_class($object);
        $parentObject = new $parent;

        $lineage = getLineage($parentObject);
        $lineage[] = get_class($object);
    } else {
        $lineage = array(get_class($object));
    }

    return $lineage;
}

class Person
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name; 
        $this->age  = $age; 
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
}

class Employee extends Person
{
    /** 役職 */
    private $position;

    public function __construct($name, $age, $position)
    {
        parent::__construct($name, $age);
        $this->position = $position; 
    }


    public function getPosition()
    {
        return $this->position;
    }

    public function __toString()
    {
        return sprintf("%s(%d) - %s", $this->name, $this->age, $this->position);
    }
}

$e = new Employee("Mike", 30, "Software Developer");
var_dump(getCallableMethods($e));
var_dump(getInheritedMethods($e));
var_dump(getLineage($e));