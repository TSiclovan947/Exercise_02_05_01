<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 04, 2018
        
         FileDownloader.php
        -->
    <title>File Download Error</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <p>There was an error downloading "<?php echo htmlentities($_GET['fileName']); ?></p>
    <p><?php echo htmlentities($errorMsg); ?></p>
    <?php
    $dir = "../Exercise_02_01_01";
    if (isset($_GET['fileName'])) {
            
    }
    else {
        $errorMsg = "No filename specified";
        $showErrorPage = true;
    }
    if ($showErrorPage) {
    ?>
    <?php
    }
    ?>
</body>

</html>
