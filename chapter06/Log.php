<?php
class Log
{
    private $filename;
    private $fh;

    public function __construct($filename)
    {
        $this->filename = $filename; 
        $this->open();
    }

    public function open()
    {
        $this->fh = fopen($this->filename, 'a') or die("Can't open {$this->filename}");
    }

    function write($note)
    {
        fwrite($this->fh, "{$note}\n");
    }

    function read()
    {
        return join('', file($this->filename));
    }

    function __wakeup()
    {
        $this->open();
    }

    function __sleep()
    {
        // 情報をファイルに書き出す
        fclose($this->fh);
        return array("filename");
    }
}