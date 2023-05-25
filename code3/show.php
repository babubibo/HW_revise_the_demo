<?php
// WARNING: NO ERROR CHECKING, for demo only
$userid = $_GET['userid'];
$projectid = $_GET['projectid'];
$target_dir = "./files/$userid/$projectid";
$dbh = new PDO('mysql:host=db;dbname=filedb', 'root', 'secret');
$sql = "SELECT srcfile FROM srcfiles WHERE userid='$userid' AND projectid='$projectid' AND processed='Y';";
$results = $dbh->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
   <?php
   foreach ($results as $row) {
     $srcfile = $row['srcfile'];
     $target_html = "$target_dir/$srcfile.html";
     echo '<div>';
     echo '<h1>' . $srcfile . '</h1>';
     include($target_html);
     echo '</div>';
   }
   ?>
   <button onclick="window.location='index.html';">Back</button>
</body>
</html>
