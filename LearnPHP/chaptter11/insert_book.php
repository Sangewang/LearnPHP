<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Book-O-Rama Book Entry Results</title>
</head>

<body>
<h1>Book-O-Rama Book Entry Results</h1>
<?php
  $isbn = $_POST['isbn'];
  $author = $_POST['author'];
  $title  = $_POST['title'];
  $price  = $_POST['price'];

  if(!$isbn || !$author || !$title || !$price)
  {
    die("You have not entered all required details,Please go back and try again</br>");
    exit;
  }

  if(!get_magic_quotes_gpc())
  {
    $isbn = addslashes($isbn);
    $author = addslashes($author);
    $title = addslashes($title);
    $price = doubleval($price);
  }

  @ $db = new mysqli('localhost','root','root','books');

  if(mysqli_connect_errno())
  {
    echo "Error:Could not connect to database,Please try again later<br>";
    exit;
  }

  $query = "insert into books values ('".$isbn."','".$suthor."','".$title."','".$price."')";

  $result = $db->query($query);

  if($result)
  {
    echo $db->affected_rows."book inserted into database.";
  }else
  {
    echo "An error has occurred. The item was not added.";
  }
  $db->close()

?>
</body>
</html>
