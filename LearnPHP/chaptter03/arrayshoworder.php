<?php
  $DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
  echo "$DOCUMENT_ROOT <br>";
  $orders = file("$DOCUMENT_ROOT/chaptter02/order.txt");
  $number_of_orders = count($orders);
  if($number_of_orders == 0)
  {
    echo "<p>No Orders Pending , Please Try Again</p>";
  }
  for($i=0;$i<$number_of_orders;$i++)
  {
    echo $orders[$i]."<br />";
  }
?>
