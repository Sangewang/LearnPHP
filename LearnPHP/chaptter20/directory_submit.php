<html>
<head lang="en">
  <meta charset="en">
  <title>Site submission results</title>
</head>
<body>
<h1>Site submission results</h1>
<?php
  if(empty($_POST['url']) or empty($_POST['email']))
  {
    die("Please check patameter");
  }
  else
  {
    $url = $_POST['url'];
    $email = $_POST['email'];
  }

  //check url
  $url = parse_url($url);
  $host = $url['host'];

  if(!($ip = gethostbyname($host)))
  {
    echo 'Host for URL does not have valid IP';
    exit;
  }
  echo "Host is at IP $ip <br>";

  //check email address
  $email = explode('@',$email);
  $emailhost = $email[1];

  if(!dns_get_mx($emailhost,$mxhostsarr))
  {
    echo 'Email address is not at valid host';
    exit;   
  }

  echo 'Email is deliver via : ';
  foreach ($mxhostsarr as $mx)
    echo $mx;

  echo '<br>All sybmitted details are ok.<br>';
?>

</body>
</html>
