<?php
  function GetLargeNum($num_1,$num_2)
  {
    if((!isset($num_1)) || (!isset($num_2)))
    {
      die("Please Confirm Your Input num </br>");
    }
    return $num_1>=$num_2 ? $num_1 : $num_2;
  }

  function add_number(&$var,$element=1)
  {
    $var+=$element;
  }

  function create_table($data)
  {
    echo "<table border=\"1\">";
    reset($data);
    $value = current($data);
    while($value)
    {
      echo "<tr><td>".$value."</tr></td>\n";
      $value = next($data);
    }
    echo "</table>";
  }
?>
