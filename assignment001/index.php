<?php
/*  Original Author: MonKey (aka Joseph Yang)
    Code Summary: Gets data from the mathcourses.txt document and puts all classes into a table.
        These courses will NOT have their descriptions, because that's just what it do. */

    // Get the file
    $relativeFilePath = "mathcourses.txt";
    $fp = fopen($relativeFilePath, "r");

    // If we didn't succeed in getting the file, terminate with exit message
    if(!$fp) exit("File: " + $relativeFilePath + " couldn't be opened!");

    // Put the entire text file into a massive string, cause that's the only way I know. -_-
    $fileString = file_get_contents($fp);
    echo "hey we did it!";

?>