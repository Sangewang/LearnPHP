<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Feedback Process</title>
</head>
<body>
<h1>welcome FeedBack Center</h1>
<h2>Your Feedback Has Been Sent</h2>
<?php
  //check input information
  if(!empty($_POST['name']))
  {
    $name = trim($_POST['name']);
  }
  else
  {
    die("Please Input Your Name </br>");
  }
  if(!empty($_POST['email']))
  {
    $email = trim($_POST['email']);
  }
  else
  {
    die("Please Input Yout email </br>");
  }

  //check email is valid
  if(@!eregi('^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$',$email))
  {
    die("Your Email is Valid , Please Input Again </br>");
    exit;
  }
  $feedback = trim($_POST['feedback']);

  //set up some static information
  $toaddress = "feedback@example.com";
  if(@eregi('shop|customer service|retail',$feedback))
  {
    $toaddress = "retail@example.com";
  }
  elseif(@eregi("deliver|fulfill",$feedback))
  {
    $toaddress = "fulfillment@example.com";
  }
  elseif(@eregi("bill|account",$feedback))
  {
    $toaddress = "accounts@example.com";
  }
  if(eregi("bigcustomer\.com",$email))
  {
    $toaddress = "bob@example.com";
  }

  $subject = "Feedback from web site";
 
  $mailcontent = "Customer name:".$name."\n".
                 "Custoner email:".$email."\n".
                 "Destination email:".$toaddress."\n".
                 "Customer Commtents:\n".$feedback."\n";

  $fromaddress = "From: webserver@example.com";

  mail($toaddress,$subject,$mailcontent,$fromaddress);
  echo nl2br($mailcontent);
  
?>
</body>
</html>
