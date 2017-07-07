<?php
  $colorbuttonpng =  array();
  $colorbuttonpng['white'] = "White-button.png";
  $colorbuttonpng['blue']  = "Blue-button.png";
  $colorbuttonpng['red']   = "Red-button.png";
  $colorbuttonpng['green'] = "Green-button.png";

  //set up image
  $height = 200;
  $width  = 200;
  $im = imagecreatetruecolor($width,$height);
  $colorrun = array();
  $colorrun['white'] = imagecolorallocate($im,255,255,255);
  $colorrun['blue'] = imagecolorallocate($im,0,0,64);
  $colorrun['red'] = imagecolorallocate($im,255,0,0);
  $colorrun['green'] = imagecolorallocate($im,0,255,0);

  $arr_num = 0;
  //draw on image
  while(list($key,$value) = each($colorrun)) 
  {
    foreach( $colorbuttonpng as $key1 => $value1)
    { 
      if($key == $key1)
      {
        $arr_num++;
        imagefill($im,0,0,$value);
        imagepng($im,$value1);
      }
    }
  }
  
  imagedestroy($im);

  if($arr_num == count($colorbuttonpng))
  {
    echo "create png success!<br>";
  }
  else
  {
    echo "Failed to create png!<br>";
  }
?>
