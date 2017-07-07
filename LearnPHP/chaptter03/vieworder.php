<?php
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  echo "Show Root Directory : $_DOCUMENT_ROOT <br>";
?>

<html>
<head lang = "en">
  <meta  charset+"UTF-8">
  <title>View Bob's Orders</title>
</head>
<body>
<h1>Bob's Auto Part</h1>
<h2>Customer Parts</h2>

<?php
  $order = file("$DOCUMENT_ROOT/chaptter02/order.txt");
  $numbers_of_order = count($order);
  if(0==$numbers_of_order)
  {
    die("No Orders Pending,Please Try Again <br>");
  }
  echo "<table border=\"1\">\n";
  echo "<tr><th bgcolor=\"#CCCCFF\">Order Date</th>
            <th bgcolor=\"#CCCCFF\">Tires</th>
            <th bgcolor=\"#CCCCFF\">Oil</th>
            <th bgcolor=\"#CCCCFF\">Spark</th>
            <th bgcolor=\"#CCCCFF\">Address</th>
       </tr>";
  for($i=0;$i<$numbers_of_order;$i++)
  {
    //split up each line
    $line = explode("\t",$order[$i]);
    
    //keep only the number of each item
    $line[1] = intval($line[1]);
    $line[2] = intval($line[2]);
    $line[3] = intval($line[3]);
  
    //output each order
    echo "<tr>
            <td>".$line[0]."</td>
            <td align = \"right\">".$line[1]."</td>
            <td align = \"right\">".$line[2]."</td>
            <td align = \"right\">".$line[3]."</td>
            <td>".$line[4]."</td>
          </tr>";
  } 
  echo "</table>";
?>
</body>
</html>

