<?php echo "Order Processed at ".date('H:i,jS F Y')."<br>";?>
<?php
  if(!empty($_POST['tireqty'])){
    $Tireqty  = $_POST['tireqty']; 
  }else{
    $Tireqty = 0;
  }
  if(!empty($_POST['oilqty'])){
    $Oilqty = $_POST['oilqty'];
  }else{
    $Oilqty = 0;
  }
  if(!empty($_POST['spatkqty'])){
    $Sparkqty = $_POST['sparkqty'];
  }else
  {
    $Sparkqty = 0;
  }
  if(!empty($_POST['find'])){
    $choseway = $_POST['find'];
  }else{
    $choseway = 0;
  }
  echo "choseway is $choseway<br> ";
  echo "The Quantity of Tires are $Tireqty <br>";
  echo "The Quantity of Qil are $Oilqty <br>";
  echo "The Quantity of Spark are $Sparkqty <br>";
  switch($choseway){
    case "a":
     echo "Regular customer<br>";
     break;
    case 'b':
      echo "TV advertising<br>";
      break;
    case 'c':
      echo "Phone Directory<br>";
      break;
    case 'd':
      echo "Heard From Someelse<br>";
      break;
    default:
      echo "We do not know<br>";
      break;
  }
?>
