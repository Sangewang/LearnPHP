<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Time Calculate</title>
</head>
<body>

<h1>Time Calculate</h1>
<form action="new_calc_age.php" method="POST">
<table border="1">
<?php
  echo "The Current Time is:";
  echo date('jS,F,Y,H:i:s');
?>
<tr>
  <td>Year:</td>
  <td><input type="text" name="year" size="10"></td>
</tr>
<tr>
  <td>Month:</td>
  <td><input type="text" name="month" size="10"></td>
</tr>
<tr>
  <td>Day:</td>
  <td><input type="text" name="day" size="10"></td>
</tr>
<tr>
  <td>Hour:</td>
  <td><input type="text" name="hour" size="10"></td>
</tr>
<tr>
  <td>Minute:</td>
  <td><input type="text" name="minute" size="10"></td>
</tr>
<tr>
  <td>Second:</td>
  <td><input type="text" name="second" size="10"></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value="Submit"></td>
</tr>
</table>
</form>
</body>
</html>

<?php
  $year = $_POST['year'];
  $month = $_POST['month'];
  $day   = $_POST['day'];
  $hour  = $_POST['hour'];
  $minute = $_POST['minute'];
  $second = $_POST['second'];
  echo "Yuu input time is: ";
  echo "$year,$month,$day,$hour:$minute:$second</br>";
  $bdaytime = mktime($hour,$minute,$second,$month,$day,$year);
  $nowtime  = time();
  $agetime = $nowtime - $bdaytime;
  $age = floor($agetime/(365*24*60*60));
  echo "Age id $age</br>";
?>


