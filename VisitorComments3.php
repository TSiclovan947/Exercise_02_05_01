<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 11, 2018
        
         VisitorComments3.php
        -->
    <title>Visitor Comments 3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
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
                $saveString .= date('r') . "\n";
                $saveString .= stripslashes($_POST['comment']) . "\n";
                echo "\$saveString: $saveString<br>";
                $currentTime = microtime();
                //Echoes the current time
                echo "\$currentTime: $currentTime<br>";
                $timeArray = explode(" ", $currentTime);
                echo var_dump($timeArray) . "<br>";
                $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                echo "\$timeStamp: $timeStamp<br>";
                $saveFileName = "$dir/Comment.$timeStamp.txt";
                echo "\$saveFileName: $saveFileName<br>";
                //Write to open the file (if file does not exist will create it), b means binary 
                $fileHandle = fopen($saveFileName, "wb");
                //Success, opens file
                if ($fileHandle === false) {
                     echo "There was an error creating \"" . htmlentities($saveFileName) . "\".<br>\n";
                }
                else {
                    //Locks the file here
                    if (flock($fileHandle, LOCK_EX)) {   
                        //Success
                        if (fwrite($fileHandle, $saveString) > 0) {
                            echo "Successfully wrote to \"" . htmlentities($saveFileName) . "\".<br>\n";
                        }
                        else {
                            //Failure
                            echo "There was an error writing to \"" . htmlentities($saveFileName) . "\".<br>\n";
                        }
                        //If successfully write will unlock here
                        flock($fileHandle, LOCK_UN);
                    }
                    else {
                         echo "There was an error locking file \"" . htmlentities($saveFileName) . "\"for writing.<br>\n";
                    }
                    //close the file = success
                    fclose($fileHandle);
                }
            }
        }
    }
    else {
        mkdir($dir);
        chmod($dir, 0666);
    }
    ?>
    <h2>Visitor Comments 3</h2>
    <form action="VisitorComments3.php" method="post">
        Your Name: <input type="text" name="name"><br>
        Your Email: <input type="email" name="email"><br>
        <textarea name="comment" rows="6" cols="100"></textarea><br>
        <input type="submit" name="save" value="Submit Your Comment"><br>
    </form>
</body>

</html>
