<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Mirror Update</title>
</head>
<body>
<h1>Mirror Update</h1>
<?php
  //set up variables - change these to suit application
$host = 'ftp.cs.rmit.edu.au';
$user = 'anonymous';
$password = 'me@example.com';
$remotefile = '/pub/tsg/teraterm/ttssh14.zip';
$localfile  = '/tmp/writable/ttssh14.zip';

//connect to host
$conn = ftp_connect($host);
if(!$conn)
{
  echo 'Error:Could not connect to ftp server<br />';
  exit;
}
echo "Connected to $host.<br />";

//log in to host
$result = @ftp_login($conn,$user,$pass);
if(!$result)
{
  echo "Error: Could not log on as $user<br />";
  ftp_quit($conn);
  exit;
}
echo "Login in as $user <br />";

//check file times to see if an update is required
echo 'checking file time ...<br />';
if(file_exists($localfile))
{
  $localtime = filemtime($localfile);
  echo 'Local file last updated';
  echo date('G:i j-M-Y',$localtime);
  echo '<br />';
}
else
{
  $localtime = 0;
}

$remotetime = ftp_mdtm($conn,$remotefile);
if(!($remotetime >= 0))
{
  echo 'Can\'t access remote file time. <br />';
  $remotetime = $localtime + 1;
}
else
{
  echo 'Remote file last updated';
  echo date('G:i j-M-Y',$remotetime);
  echo '<br>';
}
if(!($remotetime > $localtime))
{
  echo 'Local copy is up to date.<br />';
  exit;
}

//download file
echo 'Getting file from server...<br>';
$fp = fopen($localfile,'w');
if(!$success = ftp_fget($conn,$fp,$remotefile,FTP_BINARY))
{
  echo 'Error: Could not download file';
  ftp_quit($conn);
  exit;
}
fclose($fp);

echo 'File donwloaded successfully';

//close connection
ftp_quit($conn);
?>
</body>
</html>
