<?php
  define('TIREPRICE',100);
  define('OILPRICE',10);
  define('SPARKPRICE',4);
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  $date = date('H:i, jS F Y');
  echo "DOCUMENT_ROOT = $DOCUMENT_ROOT <br>";
?>
<!DOCTYPE html>
<html>
<head lang='en'>
  <meta charset = "UTF-8">
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
  <h1>Bob's Auto Parts</h1>
  <h2>Order Results<h2>
  <?php
    echo "Order Processed at $date <br>";
  ?>
  <?php
    if(empty($_POST['address']))
    {
      die("Please Input Your Addr<br>");
    }
    else
    {
      $address = $_POST['address'];
    }
    if(empty($_POST['tireqty']) && empty($_POST['oilqty']) && empty($_POST['sparkqty']))
    {
      die("You do not chose anything<br>");
    }
    else
    {
      $tireqty  = $_POST['tireqty'];
      $oilqty   = $_POST['oilqty'];
      $sparkqty = $_POST['sparkqty'];
      $totalnum = $tireqty + $oilqty + $sparkqty;
      echo "<p>tire nums : $tireqty</p>";
      echo "<p>oil nums : $oilqty</p>";
      echo "<p>spark nums : $sparkqty</p>";
      echo "<p>totalnum : $totalnum</p>";
      $taxrate = 0.10;
      $totalamount = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
      echo "SubTotal : $".number_format($totalamount,2)."<br>";
      $totalamount = $totalamount * (1+$taxrate);
      echo "Total including tax : $".number_format($totalamount,2)."<br/>";
      echo "Your Addr is $address <br>";
    }    
  ?>
  <?php
    $outputstring = $date."\t".$tireqty."tires ".$oilqty." oil\t".$sparkqty." spark plugs\t\$".$totalamount."\t".$address."\n";
     $fp = fopen("order.txt",'ab');
    //flock($fp,LOCK_EX);
    if(!$fp)
    {
      echo "<p><strong> Your Order could not be processed at this time. Please Try Again later.</trong></p>";
      exit;
    }
    fwrite($fp,$outputstring,strlen($outputstring));
    flock($fp,LOCK_UN);
    fclose($fp);
    echo "Order written";
  ?>
</body>
</html>
