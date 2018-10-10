<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 09, 2018
        
         VisitorFeedback.php
        -->
    <title>Visitor Feedback</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Visitor Feedback</h2>
    <?php
    //Variable leading into comment folder within directory
    $dir = "./comments";
    if (is_dir($dir)) {
        $commentFiles = scandir($dir);
        foreach ($commentFiles as $fileName) {
            if ($fileName !== "." && $fileName !== "..") {
            echo "From <strong>$fileName</strong><br>";
            echo "<pre>\n";
            //Use the file_get_contents to get all of the comment info
            $comment = file_get_contents($dir . "/" . $fileName);
            echo $comment;
            echo "</pre>\n";
            echo "<hr>\n";
            }
        }
    }
    ?>
</body>

</html>
