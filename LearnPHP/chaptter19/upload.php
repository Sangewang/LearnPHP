
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Uplaoding...</title>
</head>
<body>
<h1>Uploading...</h1>
<?php
  if($_FILES['userfile']['error'] > 0)
  {
    echo 'Problem:';
    switch ($_FILES['userfile']['error'])
    {
     case 1: echo 'File exceeded upload_max_filesize';
        break;
     case 2: echo 'File excedded max_file_size';
        break;
     case 3: echo 'File only partially uploaded';
        break;
     case 4: echo 'No file uploaded';
        break;
     case 6: echo 'Cannot upload file: No temp directory specifed';
        break;
     case 7: echo 'Uplaod failed: Cannot write disk';
        break;
    }
    exit;
  }
  

  //Does The File have the right MIME type
  if($_FILES['userfile']['error'] != 'text/plain')
  {
    echo 'Problem: file is not plain text';
    exit;
  }

  //put the file where we'd like it
  echo $_FILES['userfile']['tmp_name'];
  echo "<br>";
  $upfile = '/home/'.$_FILES['userfile']['name'];
  echo "$upfile<br>";
  if(is_uploaded_file($_FILES['userfile']['tmp_name']))
  {
    if(!move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile))
    {
      echo 'Problem: Could not move file to destination directory';
      exit;
    }
  }
  else
  {
    echo 'Problem: Possible file upload attack. Filename:';
    echo $_FILES['userfile']['name'];
    exit;
  }

  echo 'File uploaded successfully<br><br>';

  //remove pissible HTML and PHP tags from the file's contents

  $contents = file_get_contents($upfile);
  $contents = strip_tags($contents);
  @file_put_contents($_FILES['userfile']['name'],$contents);

  //show what was uploaded
  echo '<p>Preview of uploaded file contents:<br/><hr/>';
  echo nl2br($contents);
  echo '<br/><hr/>';
?>
</body>
</html>


