<!doctype html>

<html>

<head>
        <!--   
         Exercise 02_05_01
         Author: Tabitha Siclovan
         Date: October 12, 2018
        
         BackupComments.php
        -->
    <title>Backup Comments</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Backup Comments</h2>
    <?php
    //Variable source containing a folder called comments
    $source = "./comments";
    //Variable containing a backup folder of the comments in the comments folder
    $destination = "./backups";
    //If a folder called backups does not exist under any of these names, will create the folders
    if (!is_dir($destination)) {
        mkdir($destination);
        chmod($destination, 0757);
    }
    //If a folder called comments does not exist under any of these names, will create the folders 
    if (!is_dir($source)) {
        echo "The source directory did not exist, created it, no files to backup.<br>\n";
        mkdir($source);
        chmod($source, 0757);
    }
    else {
        $totalFiles = 0;
        $filesCopied = 0;
        //Takes the comments folder and places what is in the comments 
        //folder in the backups folder to back the comments folder up
        $dirEntries = scandir($source);
        foreach ($dirEntries as $entry) {
            if ($entry != "." && $entry != "..") {
                ++$totalFiles;
                if (copy("$source/$entry", "$destination/$entry")) {
                    ++$filesCopied;
                }
                //Could not copy file from source to destination
                else {
                    echo "Could not copy file \"" . htmlentities($entry) . "\".<br>\n";
                }
            }
        }
        echo "<p>$filesCopied of $totalFiles successfully backed up.</p>\n";
    }
    ?>
</body>

</html>
