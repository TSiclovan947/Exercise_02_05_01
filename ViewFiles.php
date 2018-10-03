<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 02, 2018
        
         ViewFiles.php
        -->
    <title>View Files</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>View Files</h2>
    <?php
    //Variable created leading to directory of Exercise_02_01_01
    $dir = "../Exercise_02_01_01";
    //opendir to open the file
    $openDir = opendir($dir);
    //the readdir will iterate through the opendir function
    while ($curFile = readdir($openDir)) {
        if (strcmp($curFile, '.') !== 0 && strcmp($curFile, '..') !== 0) {
            //Echoes out the current file
            echo "<a href=\"$dir/$curFile\">$curFile</a><br>\n";
        } 
    }
    //Close the file handle
    closedir($openDir);
    ?>
</body>

</html>
