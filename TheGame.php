<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 12, 2018
        
         TheGame.php
        -->
    <title>The Game</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
    <link rel="stylesheet" href="gamers.css">
</head>

<body>
    <?php
    $dir = "./gamers";
    if (is_dir($dir)) {
        if (isset($_POST['save'])) {
            if (empty($_POST['fname'])) {
                //If none of the fields are filled out, will echo Error
                echo "Field Empty. Please Enter Info Below\n";
            }
            else {
                //These save strings, like in the Exercise we did in class, 
                //contains the different fields in the created form
                //Username
                $saveString = stripslashes($_POST['username']) . "\n";
                //Password
                $saveString .= stripslashes($_POST['pswd']) . "\n";
                //First Name
                $saveString .= stripslashes($_POST['fname']) . "\n";
                //Last Name
                $saveString .= stripslashes($_POST['lname']) . "\n";
                //Email
                $saveString .= stripslashes($_POST['email']) . "\n";
                //Age
                $saveString .= stripslashes($_POST['age']) . "\n";
                //Screen Name
                $saveString .= stripslashes($_POST['sname']) . "\n";
                //Comment
                $saveString .= stripslashes($_POST['comment']) . "\n";
                //Created time stamp to tell time of when comment submitted
                $saveString .= date('r') . "\n";
                echo "\$saveString: $saveString<br>";
                $currentTime = microtime();
                echo "\$currentTime: $currentTime<br>";
                $timeArray = explode(" ", $currentTime);
                echo var_dump($timeArray) . "<br>";
                $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                echo "\$timeStamp: $timeStamp<br>";
                $saveFileName = "$dir/gamers.$timeStamp.txt";
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
        //If the directory does not exist then will create one
        mkdir($dir);
        chmod($dir, 0757);
    }
    ?>
</body>
<br>
<h2 style="text-align: center">The Game</h2>
<!--Form containing all of the gamer information fields-->
 <form action="TheGame.php" method="post" style="text-align: center">
       <br>
       <br>
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="pswd" maxlength="10"><br><br>
        First Name: <input type="text" name="fname"><br><br>
        Last Name: <input type="text" name="lname"><br><br>
        Your Email: <input type="email" name="email"><br><br>
        Your Age: <input type="text" name="age"><br><br>
        Screen Name: <input type="text" name="sname"><br><br>
        <textarea name="comment" rows="6" cols="100"></textarea><br><br>
        <input type="submit" name="save" value="Register for the Video Game"><br>
    </form>
    <h2>The Gamers</h2>
<?php
    $dir = "./gamers";
    //This whole section is what is displayed below the form. 
    //After the gamer enters information in the text boxes, it will display below the form
    if (is_dir($dir)) {
        $regisGamers = scandir($dir);
        foreach ($regisGamers as $fileName) {
            if ($fileName !== "." && $fileName !== "..") {
            echo "From <strong>$fileName</strong><br>";
            //Use the file_get_contents to get all of the comment info
            $gamer = file($dir . "/" . $fileName);
            echo "Username: " . htmlentities($gamer[0]) . "<br>\n";
            echo "Password: " . md5($gamer[1]) . "<br>\n";
            echo "First Name: " . htmlentities($gamer[2]) . "<br>\n";
            echo "Last Name: " . htmlentities($gamer[3]) . "<br>\n";
            echo "Email: " . htmlentities($gamer[4]) . "<br>\n";
            echo "Age: " . htmlentities($gamer[5]) . "<br>\n";
            //Display for the comment
            echo "Screeen Name: " . htmlentities($gamer[6]) . "<br>\n";
            $gamerComment = count($gamer);
            for ($i = 7; $i < $gamerComment; $i++) {
                echo htmlentities($gamer[$i]) . "<br>\n";
            }
            echo "<hr>\n";
            }
        }
    }
    ?>
</html>
