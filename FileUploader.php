<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 04, 2018
        
         FileUploader.php
        -->
    <title>File Uploader</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>File Uploader</h2>
    <?php
    //In current directory (.)
    $dir = ".";
    if (isset($_POST['upload'])) {
        //Testing to see if file actually passed over
        if (isset($_FILES['newFile'])) {
            //echo $_FILES['newFile']['tmp_name'];
            if (move_uploaded_file($_FILES['newFile']['tmp_name'], $dir . "/" . $_FILES['newFile']['name']) === true) {
               chmod($dir . "/" . $_FILES['newFile']['name'], 0644); 
               echo "File \"" . htmlentities($_FILES['newFile']['name']) . "\" successfully uploaded.<br>\n";
            }
            else {
                echo "There was an error uploading \"" . htmlentities($_FILES['newFile']['name']) . "\".<br>\n";
            }
        }
    }
    ?>
    <!--Form to Upload a File-->
    <form action="FileUploader.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="25000">
        File to Upload:
        <input type="file" name="newFile"><br>
        (25,000 byte limit)<br>
        <input type="submit" name="upload" value="Upload the File"><br>
    </form>
</body>

</html>
