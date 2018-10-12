<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 11, 2018
        
         VisitorFeedback4.php
        -->
    <title>Visitor Feedback 4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Visitor Feedback 4</h2>
    <?php
    //Load content into an array for processing
    //Variable leading into comment folder within directory
    $dir = "./comments";
    if (is_dir($dir)) {
        $commentFiles = scandir($dir);
        foreach ($commentFiles as $fileName) {
            if ($fileName !== "." && $fileName !== "..") {
                echo "From <strong>$fileName</strong><br>";
                //rb for read binary
                $fileHandle = fopen($dir . "/" . $fileName, "rb");
                if ($fileHandle === false) {
                    echo "There was an error reading file \"$fileName\".<br>\n";
                }
                else {
                    //File get string
                    //Reads only so far as a new line (end of string)
                    $from = fgets($fileHandle);
                    echo "From: " . htmlentities($from) . "<br>\n";
                    $email = fgets($fileHandle);
                    echo "Email Address: " . htmlentities($email) . "<br>\n";
                    $date = fgets($fileHandle);
                    echo "Date: " . htmlentities($date) . "<br>\n";
                    //File end of File (feof) tells that at end of file
                    //While not true
                    while (!feof($fileHandle)) {
                        $comment = fgets($fileHandle);
                        //If not end of the file add a line break and a new line
                        if (!feof($fileHandle)) {
                            echo htmlentities($comment) . "<br>\n";
                        }
                        //Else if end of file add only a new line
                        else {
                            echo htmlentities($comment) . "\n";
                        }
                    }
                    echo "<hr>\n";
                    fclose($fileHandle);
                }
            }
        }
    }
    ?>
</body>

</html>
