<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


class CsvIterator implements Iterator
{
    private $file = array();

    public function __construct($path)
    {
        if (is_file($path)) {
            $this->file = file($path);
        }
    }

    public function rewind()
    {
        echo "<pre>".print_r("перемотка в начало", true)."</pre>";
        reset($this->file);
    }

    public function current()
    {
        $stroke = current($this->file);
        echo "<pre>".print_r("текущий: " . $stroke, true)."</pre>";
        return $stroke;
    }

    public function key()
    {
        $stroke = key($this->file);
        echo "<pre>".print_r("ключ: " . $stroke, true)."</pre>";
        return $stroke;
    }

    public function next()
    {
        $stroke = next($this->file);
        echo "<pre>".print_r("следующий: " . $stroke, true)."</pre>";
        return $stroke;
    }

    public function valid()
    {
        $key = key($this->file);
        $stroke = ($key !== NULL && $key !== FALSE);
        echo "<pre>".print_r("верный: " . $stroke, true)."</pre>";
        return $stroke;
    }

}

$path = __DIR__ . '/cats.csv';



foreach (new CsvIterator($path) as $key => $row) {
    file_put_contents("output.txt",$row,FILE_APPEND);
}
