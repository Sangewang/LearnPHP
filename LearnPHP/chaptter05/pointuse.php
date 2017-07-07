<?php

  require_once("GetLargeNum.php");
  $num_1 = 5;
  $num_2 = 6;
  echo "The Large One is ".GetLargeNum($num_1,$num_2)."</br>";
  
  $var = 10;
  echo "var=$var <br>";
  add_number(&$var);
  echo "var=$var <br>";

  $my_array = array('Line One.','Line two','Line Three.');
  create_table($my_array);
?>


