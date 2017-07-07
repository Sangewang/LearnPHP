<?php
  //set date for calculation
  $day = 18;
  $month = 9;
  $year = 1972;

  //remeber you need bday as day month and year
  $bdayunix = mktime(0,0,0,$month,$day,$year); //hour,minutes,second,month,day,year

  //get current timestap
  $nowunix = time();

  //workout the differnce
  $ageunix = $nowunix - $bdayunix;
  
  $age = floor($ageunix/(365*24*60*60));

  echo "Age is $age";

?>
