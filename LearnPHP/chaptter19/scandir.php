<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Browse Directories</title>
<head>
<body>
<h1>Browsing</h1>
<?php
$dir = '/home/';
$files1 = scandir($dir);
$files2 = scandir($dir,1);

echo "<p>Upload direcory is $dir</p>";
echo "Direcory Listing in alphabetical order, ascending:</p>";
echo "<ul>";

foreach($files1 as $file)
{
  if($file != '.' && $file != "..")
  {
    echo "<li>$file<li>";
  }
}

echo "</ul>";

echo "<p>Upload direcory is $dir</p>";
echo "Direcory Listing in alphabetical order, descending:</p>";
echo "<ul>";

foreach($files2 as $file)
{
  if($file != '.' && $file != "..")
  {
    echo "<li>$file<li>";
  }
}

echo "</ul>";
?>
</body>
</html>
