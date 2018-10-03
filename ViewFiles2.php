<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 02, 2018
        
         ViewFiles2.php
        -->
    <title>View Files 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>View Files 2</h2>
    <?php
    //Variable created leading to directory of Exercise_02_01_01
    $dir = "../Exercise_02_01_01";
    //Scandir (shortcut to opendir)
    $dirEntries = scandir($dir);
    //Foreach loop to display the files in the directory and it will be sorted in alphabetical order
    foreach ($dirEntries as $entry) {
        if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
            echo "<a href=\"$dir/$entry\">$entry</a><br>\n";
        } 
    }
    ?>
</body>

</html>
