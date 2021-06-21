<?php

abstract class Component
{
    abstract function printOutput();
}

class ImageComponent extends Component
{
    function printOutput()
    {
        echo "きれいが画像を表示します\n";
    }
}

trait Sortable
{
    abstract function uniquedId();

    function compareById($object)
    {
        return ($object->uniquedId() < $this->uniquedId()) ? -1 : 1;
    }
}
