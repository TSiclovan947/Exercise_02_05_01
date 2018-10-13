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
</head>

<body>
    <h2 style="text-align: center">The Game</h2>
    <?php
    
    ?>
</body>
 <form action="TheGame.php" method="post" style="text-align: center">
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
