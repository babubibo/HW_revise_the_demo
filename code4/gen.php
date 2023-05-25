<?php
// WARNING: NO ERROR CHECKING, for demo only
while (true) {
    sleep(60);
    $dbh = new PDO('sqlite:./db/filedb.db');
    $sql = "SELECT * FROM srcfiles WHERE processed='N';";
    $results = $dbh->query($sql);
    foreach ($results as $row) {
        $userid = $row['userid'];
        $projectid = $row['projectid'];
        $srcfile = $row['srcfile'];
        $target_file = "./files/$userid/$projectid/$srcfile";
        $target_html = $target_file . '.html';
        $cmd = "highlight -l -f --inline-css --enclose-pre  -i $target_file -o $target_html";
        exec($cmd);
        $sqlu = "UPDATE srcfiles SET processed='Y' WHERE userid='$userid' AND projectid='$projectid' AND srcfile='$srcfile';";
        $dbh->exec($sqlu);
    }
}
?>
