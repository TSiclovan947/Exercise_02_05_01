<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 05, 2018
        
         ViewFiles4.php
        -->
    <title>View Files 4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>View Files 4</h2>
    <?php
    //Variable created leading to directory of Exercise_02_01_01
    $dir = "../Exercise_02_01_01";
    //Scandir (shortcut to opendir)
    $dirEntries = scandir($dir);
    echo "<table border='1' width='100%'>\n";
    //Table header within table row to give table title
    echo "<tr><th colspan='4'>Directory Listing for <strong>" . htmlentities($dir) . "</strong></th></tr>\n";
    echo "<tr>";
    //Created four table headings
    echo "<th><strong><em>Name</em></strong></th>";
    echo "<th><strong><em>Owner</em></strong></th>";
    echo "<th><strong><em>Permissions</em></strong></th>";
    echo "<th><strong><em>Size</em></strong></th>";
    echo "</tr>\n";
    //Foreach loop to display the files in the directory and it will be sorted in alphabetical order
    foreach ($dirEntries as $entry) {
        if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
            //Relative path
            $fullEntryName = $dir . "/" . $entry;
            echo "<tr><td>";
            if (is_file($fullEntryName)) {
                echo "<a href=\"FileDownloader.php?fileName=$entry\">" . htmlentities($entry) . "</a>";
            }
            else {
                echo htmlentities($entry);
            }
            echo "</td><td align='center'>" . fileowner($fullEntryName);
            if (is_file($fullEntryName)) {
                 $perms = fileperms($fullEntryName);
                 $perms = decoct($perms % 01000);
                 echo "</td><td align='center'>0$perms";
                 //Enters the file size in bytes
                 echo "</td><td align='right'>" . number_format(filesize($fullEntryName) . 0) . " bytes";
            }
            else {
                //Displays DIR is a directory and not file
                echo "</td><td colspan='2' align='center'>&lt;DIR&gt;";
            }
            echo "</td></tr>\n";
        } 
    }
    //Closing table tag
    echo "</table>\n";
    ?>
</body>

</html>
