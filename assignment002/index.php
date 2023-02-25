<head lang="en">
    <title>Sumthing</title>
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
    if (!$fileString) exit("Couldn't read or find the file: " + $relativeFilePath);

    // The regex that we will be using, refer to notes or website for what all the symbols mean
    $courseRegex = "/([A-Z]+\s\d{3}[A-Z]?)\s(\d{2}[A-Z]?)\s\d+\s([A-Z\s\&\-\/\:]+[A-Z])\s([A-Za-z]+\s?[A-Za-z]+)\s+(\d\s?\-?\s?\d*)\s+[\w\s\:\/\-]+Instructor\:\s+([\w\,\'\-]+\s?[A-Za-z]+)/";

    // Create the table
    

    // Extract all text that matches the regex
    if (preg_match_all($courseRegex, $fileString, $courseStrings)){
        echo "<h1>There is a total of ".count($courseStrings[0])." courses offered in summer session</h1>";
        echo "<table class='table'>
            <tr>
                <th>Course</th>
                <th>Title</th>
                <th>Section</th>
                <th>Component</th>
                <th>Credits</th>
                <th>Instructor</th>
            </tr>";
        for ($i=0; $i<count($courseStrings[0]); $i++) {
            // Create a table row and put the Code, Name, and amount of credits for each class
            echo "<tr>
                    <td>{$courseStrings[1][$i]}</td>
                    <td>{$courseStrings[3][$i]}</td>
                    <td>{$courseStrings[2][$i]}</td>
                    <td>{$courseStrings[4][$i]}</td>
                    <td>{$courseStrings[5][$i]}</td>
                    <td>{$courseStrings[6][$i]}</td>
                  </tr>";
        }
    } else
        echo "it didn't work!";
    // Finish the table
    echo "</table>";
