<?php
  $DOCUMENT = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head lang="en">
  <meta charset = "UTF-8">
  <title>Bob's Part - Customer Orders</title>
</head>
<body>
<h1>Bob's Auto Part</h1>
<h2>Customer Orders</h2>
<?php
  $fp = fopen("order.txt","r");
  if(!$fp)
  {
    die("Error : Can not read file <br>");
    exit;
  }
  while(!feof($fp))
  {
    $order = fgets($fp,999);
    echo $order."<br>";
  }
?>
</body>
</html>
