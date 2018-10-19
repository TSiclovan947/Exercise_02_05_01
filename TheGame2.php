<!doctype html>

<html>

<head>
    <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 18, 2018
        
         TheGame2.php
        -->
    <title>Game Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
    //Entry code
    //Determine if user has submitted data
    //Yes - process the data
    $dir = ".";
    $saveFileName = "./TheGamers.txt";
    $saveString = "";
    $dataArray = array();
    
    function displayAlert($message) {
        echo "<script>alert(\"$message\")</script>";
    }
    
    if (is_dir($dir)) {
        if (isset($_POST['save'])) {
            if (empty($_POST['userName'])) {
                //If none of the fields are filled out, will echo Error
                displayAlert("Unknown Visitor");
            }
            else {
                $dataArray[] = stripslashes($_POST['userName']);
                $dataArray[] = stripslashes($_POST['password']);
                $dataArray[] = stripslashes($_POST['fullName']);
                $dataArray[] = stripslashes($_POST['email']);
                $dataArray[] = stripslashes($_POST['age']);
                $dataArray[] = stripslashes($_POST['screenName']);
                $dataArray[] = stripslashes($_POST['comments']);
                $saveString = implode("i", $dataArray);
                $saveString . "\n";
                
                echo "$saveString: $saveString";
                $fileHandle
                //debug
                echo "<pre>\n";
                print($dataArray);
                echo "</pre>";
                
            }
        }
    }
    
  
    ?>
    <!--HTML code for the input form-->
    <h1>Register for the Game</h1>
    <form action="TheGame2.php" method="post">
        Username<br> <input type="text" name="userName"><br>
        Password<br> <input type="password" name="password"><br>
        Full Name<br> <input type="text" name="fullName"><br>
        E-mail<br> <input type="email" name="email"><br>
        Age<br> <input type="number" name="age"><br>
        Screen Name<br> <input type="text" name="screenName"><br>
        Comments<br> <textarea name="comments" rows="6" cols="40"></textarea><br>
        <input type="submit" name="save" value="Submit Your Registration"><br>
    </form>
    <?php
    //Display code to display all gamers
    ?>
</body>

</html>
