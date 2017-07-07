<?php
  $picture = array('LebronJames1.jpeg','LebronJames2.jpeg','LebronJames3.jpeg');
  shuffle($picture);
?>

<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Show James King Pic</title>
</head>

<body>
<h1>Show James Pic</h1>
<div align="center">
<table width = 100%>
<tr>
<?php
  for($i=0;$i<1;$i++)
  {
  //  echo "<td align=\"center\"><img src=\"";
  //  echo $picture[$i];
  //  echo "\"/></td>";
    echo "<td align=\"center\"><img src=\"$picture[$i]\"/></td>";
  }
?>
</tr>
</table>
</div>
</body>
</html>
