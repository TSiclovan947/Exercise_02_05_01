 <?php
    //Downloads files from following file path
    $dir = "../Exercise_02_01_01";
    //Success = get URL form user
    if (isset($_GET['fileName'])) {
        $fileToGet = $dir . "/" . stripslashes($_GET['fileName']);
        if (is_readable($fileToGet)) {
            $errorMsg = "";
            $showErrorPage = false;
            header("Content-Description: File Transfer");
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=\"" . $_GET['fileName'] . "\"");
            header("Content-Transfer-Encoding: base64");
            header("Content-Length: " . filesize($fileToGet));
            readfile($fileToGet);
        }
        else {
            $errorMsg = "Cannot read \"$fileToGet\"";
            $showErrorPage = true;
        }
    }
    else {
        //Failure = No file name, error
        $errorMsg = "No filename specified";
        $showErrorPage = true;
    }
    if ($showErrorPage) {
    ?>
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
<!--HTML entities are used for protection if there are characters in PHP that can be interpreted as HTML-->
    <p>There was an error downloading "<?php echo htmlentities($_GET['fileName']); ?>"</p>
    <p><?php echo htmlentities($errorMsg); ?></p>
   
    
</body>

</html>
<?php
    }
?>