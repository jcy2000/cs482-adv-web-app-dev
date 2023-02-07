<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<?php
/*  Original Author: MonKey (aka Joseph Yang)
    Code Summary: I actually have no idea at the moment, but when I do, I'll change this summary lol.
*/
    // Get the file
    $relativeFilePath = "summer2023schedule.txt";

    // Put the entire text file into a massive string, cause that's the only way I know. -_-
    $fileString = file_get_contents($relativeFilePath);

    // Terminate if I can't read or find the find
    if(!$fileString) exit("Couldn't read or find the file: " + $relativeFilePath);

    // The regex that we will be using, refer to notes or website for what all the symbols mean
    $courseRegex = "/([A-Z]+\s\d{3}[A-Z]?)\s(\d{2})\s\d+\s([A-Z\s\&\-]+[A-Z]{2})/";

    // Create the table
    echo "<table class='table'>
            <tr>
                <th>#</th>
                <th>Course</th>
                <th>Title</th>
                <th>Section</th>
            </tr>";

    // Extract all text that matches the regex
    if(preg_match_all($courseRegex, $fileString, $courseStrings)){
        for($i=0;$i<count($courseStrings[0]);$i++) {
            // Create a table row and put the Code, Name, and amount of credits for each class
            echo "<tr>
                    <td>$i</td>
                    <td>{$courseStrings[1][$i]}</td>
                    <td>{$courseStrings[3][$i]}</td>
                    <td>{$courseStrings[2][$i]}</td>
                  </tr>";
        }
    }
    else
        echo "it didn't work!";
    // Finish the table
    echo "</table>";
?>