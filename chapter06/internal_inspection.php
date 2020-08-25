<?php
/**
 * 呼び出し可能なメソッド（継承したものを含む）の配列を返す
 *
 * @param $object
 * @return array
 */
function getCallableMethods($object) {
    $methods = get_class_methods(get_class($object));

    if (get_parent_class($object)) {
        $parent_methods = get_class_methods(get_parent_class($object));
        $methods = array_diff($methods, $parent_methods);
    }

    return $methods;
}

/**
 * スーパークラスの配列を返します
 *
 * @param $object
 * @return array|mixed
 */
function getInheritedMethods($object) {
    $methods = get_class_methods(get_class($object));
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

/**
 * スーパークラスの配列を返す
 *
 * @param $object
 * @return array|mixed
 */
function getLineage($object) {
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

/**
 * サブクラスの配列を返す
 *
 * @param $object
 * @return array
 */
function getChildClasses($object) {
    $classes = get_declared_classes();

    $children = array();
    foreach ($classes as $class) {
        if (substr($class, 0, 2) == "__") {
            continue;
        }

        $child = new $class;

        if (get_parent_class($child) == get_class($object)) {
            $children[] = $class;
        }
    }

    return $children;
}

/**
 * オブジェクトについての情報を表示する
 *
 * @param $object
 */
function printObjectInfo($object) {
    $class = get_class($object);
    echo "<h2>クラス</h2>";
    echo "<p>{$class}</p>";

    echo "<h2>継承関係</h2>";
    echo "<h3>親クラス</h3>";
    $lineage = getLineage($object);
    array_pop($lineage);

    if (count($lineage) > 0) {
        echo "<p>" . join(" -&gt; ", $lineage) . "</p>";
    } else {
        echo "<i>なし</i>";
    }

    echo "<h3>子クラス</h3>";
    $children = getChildClasses($object);
    echo "<p>";
    if (count($children) > 0) {
        echo join(', ', $children);
    } else {
        echo "<i>なし</i>";
    }

    echo "</p>";

    echo "<h2>メソッド</h2>";
    $methods = getCallableMethods($class);
    $object_methods = get_class_methods($object);
    
    if (!count($methods)) {
        echo "<i>なし</i><br />";
    } else {
        echo "<p>継承しているメソッドは<i>斜体</i>で表示します。</p>";
        foreach ($methods as $method) {
            if (in_array($method, $object_methods)) {
                echo "<b>{$method}</b>();<br />";
            } else {
                echo "<i>{$method}</i>();<br />";
            }
        }
    }

    echo "<h2>プロパティ</h2>";
    $properties = get_class_vars($class);
    if (!count($properties)) {
        echo "<i>なし</i><br />";
    } else {
        foreach (array_keys($properties) as $property) {
            echo "<b>\${$property}</b> = " . $object->$property . "<br />";
        }
    }

    echo "<hr />";
}

class A
{
    public $foo = "foo";
    public $bat = "bar";
    public $baz = 17.0;

    function firstFunction() {}
    function secondFunction() {}
}

class B extends A {
    public $quux = false;

    function thirdFunction() {}
}

class C extends B {}

$a = new A;
$a->foo = "sylvie";
$a->bar = 23;

$b = new B;
$b->foo = "bruno";
$b->quux = true;

$c = new C;

printObjectInfo($a);
printObjectInfo($b);
printObjectInfo($c);
