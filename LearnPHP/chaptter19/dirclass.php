<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Browse Directories</title>
</head>
<body>
<h1>Browsing<h1>
<?php
  $dir = dir("/home/");
  
  echo "<p>Handle is $dir->handle</p>";
  echo "<p>Upload direcotory is $dir->path</p>";
  echo "<p>Direcoty Listing:</p>";
  echo "<ul>";
  
  while(false !== ($file = $dir->read()))
  {
    if($file != "." and $file != "..")
    {
      echo "<li>$file</li>";
    }
  }
  echo "</ul>";
  $dir->close();
  
?>
</body>
</html>
