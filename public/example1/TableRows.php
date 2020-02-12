<?php
class TableRows extends RecursiveIteratorIterator
{
    public function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    public function current()
    {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current() . '</td>';
    }

    public function beginChildren()
    {
        echo '<tr>';
    }

    public function endChildren()
    {
        echo "</tr>\n";
    }
}
