<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Browse Directories</title>
</head>
<body>
<h1>Browsing</h1>
<?php
  $current_dir = '/home/';
  
  $dir = opendir($current_dir);

  echo "<p>Uploaded directory is $current_dir</p>";
  echo "<p>Directory Listing:</p>";
  echo "<url>";
  while(false !== ($file = readdir($dir)))
  {
    //strip out the two entries of . and ..
    if($file != "." and $file != "..")
    {
      echo "<li>$file<li>";
    }
  }
  echo "</url>";
  closedir($dir);

?>
</body>
</html>
