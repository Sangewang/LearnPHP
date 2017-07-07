
<?php
  require("page.inc");
  class ServicePage extends Page
  {
    private $row2buttons = array(
                                  "Re-engineering" => "reengineering.php",
                                  "Standards Compliance" => "standards.php",
                                  "Buzzword Compliance" => "buzzword.php",
                                  "Mission Statments" => "mission.php"
                                );
  

    public function Display()
    {
      echo "<html>\n<head>\n";
      $this->DisplayTitle();
      $this->DisplayKeywords();
      $this->DisplayStyles();
      echo "</head>\n<body>\n";
      $this->DisplayHeader();
      $this->DisplayMenu($this->buttons);
      $this->DisplayMenu($this->row2buttons);
      echo $this->content;
      $this->DisplayFooter();
      echo "</body>\n</html>\n";
    }
  }

  $services = new ServicePage();

  $services->content="<p style=\"text-align:center\">This is A PHP Test</p>";

  $services->Display();
  
?>
