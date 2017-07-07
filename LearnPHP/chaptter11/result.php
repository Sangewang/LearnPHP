<html>
<head>
  <title>Book-o-Rama Search Results</title>
</head>
<body>
<h1>Book-o-Rama Search Results</h1>
<?php
  $searchtype = $_POST['searchtype'];
  $searchterm = trim($_POST['searchterm']);
  if(empty($searchtype) || empty($searchterm))
  {
    die("You Have not entered search details, Please Go back and try again");
    exit;
  }

  if(!get_magic_quotes_gpc())
  {
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  $db = new mysqli('localhost','root','root','books');
  
  //echo is_object($db);

  if(mysqli_connect_errno())
  {
    die("Error:Could not connect to database. Please try again later.");
    exit;
  }
  
  //echo $searchtype."</br>";
  //echo $searchterm."</br>";
  $query = "select * from books where ".$searchtype." like '%".$searchterm."%'";

  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of books found:".$num_results."</p>";

  for($i=0;$i<$num_results;$i++)
  {
    $row = $result->fetch_assoc();
    echo "<p><strong>".($i+1).".Title: ";
    echo htmlspecialchars(stripslashes($row['title']));
    echo "</strong><br />Author: ";
    echo stripslashes($row['author']);
    echo "<br />ISBN: ";
    echo stripslashes($row['isbn']);
    echo "<br />Price: ";
    echo stripslashes($row['price']);
    echo "</p>";
  }

  $result->free();
  //mysqli_free_result($result);
  $db->close();

?>
</body>
</html>
