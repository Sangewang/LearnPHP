<?php
  $name = $_POST['name'];
  $password = $_POST['password'];

  if(!isset($name) || !isset($password))
  {
?>
  <h1>Please Log In</h1>
  <p>This Page is secret.</p>
  <form action="secretdb.php" method="post">
    <p>Username:<input type="text" name="name"></p>
    <p>Password:<input type="text" name="password"></p>
    <p><input type="submit" name="submit" value="Log In"></p>
  </form>
<?php
  }
  else
  {
    //Try connet DB
    $mysql = mysqli_connect("localhost","root","root");
    if(!$mysql)
    {
      echo "Cannot connect to database. <br>";
      exit;
    }

    //Select the appropriate database
    $selected = mysqli_select_db($mysql,"auth");
    if(!$selected)
    {
      echo "Cannot select database.";
      exit;
    }

    //query the database to see if there is a record which matches
    $query = "select count(*) from authorized_users where name = '".$name."' and password = '".$password."'";

    $result = mysqli_query($mysql, $query);

    if(!$result)
    {
      echo "Cannot run query.";
      exit;
    }

    $row = mysqli_fetch_row($result);
    $count = $row[0];

    if($count>0)
    {
      echo "<h1>Here it is!<h1>
            <p>I bet you are glad you can see this secret page</p>";
    }
    else
    {
      echo "<h1>Go Away!</h1>
            <p>You are not authorized to use this resource</p>";
    }

  }
?>
