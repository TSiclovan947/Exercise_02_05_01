<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 05, 2018
        
         VisitorComments.php
        -->
    <title>Visitor Comments</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
    //Variable containing comments folder
    $dir = "./comments";
    if (is_dir($dir)) {
        if (isset($_POST['save'])) {
            if (empty($_POST['name'])) {
                echo "Unknown visitor\n";
            }
            else {
                //displays the different file fields
                $saveString = stripslashes($_POST['name']) . "\n";
                $saveString .= stripslashes($_POST['email']) . "\n";
                //The r grabs a formatted date
                $saveString .= date('r') . "\n";
                $saveString .= stripslashes($_POST['comment']) . "\n";
                echo "\$saveString: $saveString<br>";
                $currentTime = microtime();
                echo "\$currentTime: $currentTime<br>";
                $timeArray = explode(" ", $currentTime);
                echo var_dump($timeArray) . "<br>";
                $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                //Add a time stamp to see when the user posted the comment
                echo "\$timeStamp: $timeStamp<br>";
                $saveFileName = "$dir/Comment.$timeStamp.txt";
                echo "\$saveFileName: $saveFileName<br>";
                if (file_put_contents($saveFileName, $saveString) > 0) {
                    //The file successfully saves
                    echo "File \"" . htmlentities($saveFileName) . "\"successfully saved.<br>\n";
                }
                else {
                    //There is an error and the file did not save
                    echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                }
            }
        }
    }
    else {
        //If the comments folder does not exist, a directory will be created
        mkdir($dir);
        chmod($dir, 0666);
    }
    ?>
    <h2>Visitor Comments</h2>
    <form action="VisitorComments.php" method="post">
        Your Name: <input type="text" name="name"><br>
        Your Email: <input type="email" name="email"><br>
        <textarea name="comment" rows="6" cols="100"></textarea><br>
        <input type="submit" name="save" value="Submit Your Comment"><br>
    </form>
</body>

</html>
