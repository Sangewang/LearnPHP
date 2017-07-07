<?php
  $g_UserName = "user";
  $g_PassWord = "pass";
  if(empty($_POST['Username']) || empty($_POST['Password']))
  {
    die("Please check your username and password , then try again </br>");
  }
  else
  {
    $Username = trim($_POST['Username']);
    $Password = trim($_POST['Password']);
  }
  //echo "<p>Your Username is $Username</p>";
  //echo "<p>Your Password is $Password</p>";
  if($g_UserName == $Username && $g_PassWord == $Password)
  {
    echo "<h1>Here it is!</h1>
          <p>I bet you are gald you can see the secret page.</p>";
  }
  else
  {
    echo "<h1>Go Away!<h1>
          <p>You are not authorized to use this resource.</p>";
  }


?>
