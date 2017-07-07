<?php
  $ABS_ROOT = $_SERVER['DOCUMENT_ROOT'];
  //echo "$ABS_ROOT.<br>";
  if(!empty($_POST['buttontext']) && (!empty($_POST['color'])))
  {
    $button_text = $_POST['buttontext'];
    $color = $_POST['color'];
  }
  else
  {
    die("None input valid , please Try Again </br>");
  }
  
  //create an image of the right background and check size
  $im = imagecreatefrompng($color.'-button.png');

  $width_image = imagesx($im);
  $height_image = imagesy($im);
 
  $width_image_wo_margins  = $width_image - (2*18);
  $height_image_wo_margins = $height_image - (2*18);

  $font_size = 33;

  $font_name = $ABS_ROOT.'/LearnPHP/chaptter23/arial.ttf';
  do
  {
    $font_size--;
    $bbox = imagettfbbox($font_size,0,$font_name,$button_text);

    $right_text = $bbox[2];
    $left_text  = $bbox[0];
    $width_text = $right_text - $left_box;
    $height_text= abs($bbox[7] - $bbox[1]);
  }while($font_size>8 && ($height_text > $height_image_wo_margins || $width_text > $width_image_wo_margins));

  if($height_text > $height_image_wo_margins || $wight_text > $height_image_wo_margins)
  {
    echo "Text given will not fit on button.<br>";
  }
  else
  {
    $text_x = $width_image/2.0 - $width_text/2.0;
    $text_y = $height_image/2.0 - $height_text/2.0;
    if($left_text < 0)
    {
      $text_x += abs($left_text);
    }
    $above_line_text = abs($bbox[7]);
    $text_y += $above_line_text;

    $text_y -= 2;

    $white = imagecolorallocate($im,255,255,255);

    imagettftext($im,$font_size,0,$text_x,$text_y,$white,$font_name,$button_text);

    Header('Content-type: image/png');

    imagepng($im);
  }

  imagedestroy($im);


?>
