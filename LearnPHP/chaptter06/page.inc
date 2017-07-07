<?php
class Page
{
  //calss Page attributes
  public $content;
  public $title = "The King James";
  public $keywords = "Welcome to the Calv Home";
  public $buttons = array("Home"     => "home.php",
                          "Contact"  => "contact.php",
                          "Services" => "services.php",
                          "Site Map" => "map.php"); 

  //class Page's operations
  public function __set($name , $valur)
  {
    $this->$name = $value;
  }

  public function Display()
  {
    echo "<html>\n<head>\n";
    $this->DisplayTitle();
    $this->DisplayKeywords();
    $this->DisplayStyles();
    echo "</head>\n<body>\n";
    $this->DisplayHeader();
    $this->DisplayMenu($this->buttons);
    echo $this->content;
    //echo "<p style=\"font-size:24pt; color:black; text-align:center\">".$this->content."</p>";
    //echo "<table text-align:center>".$this->content."</table>";
    $this->DisplayFooter();
    echo "</body>\n</html>\n";
  }
  
  public function DisplayTitle()
  {
    echo "<title>".$this->title."</title>";
  }

  public function DisplayKeywords()
  {
    echo "<meta name=\"keywords\"
          content=\"".$this->keywords."\"/>";
  }
  
  public function DisplayStyles()
  {
?>
  <style>
   h1 {
      color:white; font-size:24pt; text-align:center; font-family:arial,sans-serif
   }

   .menu {
      color:white; font-size:12pt; text-align:center; font-family:arial,sans-serif; font-weight:bold
   }

   td {
      background:black
   }

   p {
      color:black; font-size:12pt; text-align:justify; font-family:arial,sans-serif
   }

   p.foot {
      color:white; font-size:9pt; text-align:center; font-family:arial,sans-serif; font-weight:bold
   }

   a:link, a:visited, a:active {
      color:white
   }
   </style>

<?php
 }
  public function DisplayHeader()
  {
?>
  <table width="100%" cellpadding="12" cellspacing="0" border="0">
  <tr bgcolor = "black">
    <td align="left"><img src = "calv.jpg" height="80" width="80" /></td>
    <td>
      <h1>Welcome King James Home</h1>
    </td>
    <td align="right"><img src = "calv.jpg" height="80" width="80" /></td>
  </tr>
  </table>

<?php
 }
  public function DisplayMenu($buttons)
  {
    echo "<table width=\"100%\" bgcolor=\"white\" cellpadding=\"4\" cellspacing=\"4\">\n";
    echo "<tr>\n";

    //calculate button size
    $width = 100/count($buttons);

    while(list($name,$url) = each($buttons))
    {
      $this->DisplayButton($width,$name,$url,!$this->IsURLCurrentPage($url));    
    }
    echo "</tr>\n";
    echo "</table>\n";
  }

  public function IsURLCurrentPage($url)
  {
    if(strpos($_SERVER['PHP_SELF'],$url) == false)
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  public function DisplayButton($width,$name,$url,$active=true)
  {
    if($active)
    {
      echo "<td width = \"".$width."%\">
      <a href=\"".$url."\">
      <img src=\"calv.jpg\" alt=\"".$name."\" height=\"80\" width=\"80\" border=\"0\" /></a>
      <a href=\"".$url."\"><span class=\"menu\">".$name."</span></a>
      </td>";
    }
    else
    {
      echo "<td width = \"".$width."%\">
      <a href=\"".$url."\">
      <img src=\"calv.jpg\" height=\"80\" width=\"80\">
      <span class=\"menu\">".$name."</span>
      </td>";
    }
  }

  public function DisplayFooter()
  {  
?>
  <table width="100%" bgcolor="black" cellpadding="12" border="0">
  <tr>
  <td>
    <p calss="foot">&copy; Welcome King James Home.</p>
    <p class="foot">Please See Our <a href="">legal
    information page</a></p>
  </td>
  </tr>
  <table>
<?php
  }
}
?>

