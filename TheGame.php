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
    $dir = "./comments";
    if (is_dir($dir)) {
        if (isset($_POST['save'])) {
            if (empty($_POST['name'])) {
                echo "Unknown visitor\n";
            }
            else {
                $saveString = stripslashes($_POST['username']) . "\n";
                $saveString = stripslashes($_POST['pswd']) . "\n";
                $saveString = stripslashes($_POST['fname']) . "\n";
                $saveString = stripslashes($_POST['lname']) . "\n";
                $saveString .= stripslashes($_POST['email']) . "\n";
                $saveString .= stripslashes($_POST['age']) . "\n";
                $saveString .= stripslashes($_POST['sname']) . "\n";
                $saveString .= stripslashes($_POST['comment']) . "\n";
                $saveString .= date('r') . "\n";
                $saveString .= stripslashes($_POST['comment']) . "\n";
                echo "\$saveString: $saveString<br>";
                $currentTime = microtime();
                echo "\$currentTime: $currentTime<br>";
                $timeArray = explode(" ", $currentTime);
                echo var_dump($timeArray) . "<br>";
                $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                echo "\$timeStamp: $timeStamp<br>";
                $saveFileName = "$dir/Comment.$timeStamp.txt";
                echo "\$saveFileName: $saveFileName<br>";
                if (file_put_contents($saveFileName, $saveString) > 0) {
                    echo "File \"" . htmlentities($saveFileName) . "\"successfully saved.<br>\n";
                }
                else {
                    echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                }
            }
        }
    }
    else {
        mkdir($dir);
        chmod($dir, 0666);
    }
    ?>
</body>
<br>
<h2 style="text-align: center">The Game</h2>
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

</html>
