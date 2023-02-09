<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<?php
/*  Original Author: MonKey (aka Joseph Yang)
    Code Summary: Gets data from the mathcourses.txt document and puts all classes into a table.
        These courses will NOT have their descriptions, because that's just what it do. */

    // Get the file
    $relativeFilePath = "cscourselist.txt";

    // Put the entire text file into a massive string, cause that's the only way I know. -_-
    $fileString = file_get_contents($relativeFilePath);

    // If we couldn't find or read the file, then terminate the program
    if(!$fileString) exit("We couldn't find or read the file!");

    // Create the regex that captures
    $regex = "/([A-Z]+\s\d{3}[A-Z]?)\s+([A-Z\s\-\&\:\#\+]+[A-Z]?)(?:Repeatable)?\s+([\d\-]+)\sUnits\s+([\w\s\.\,\/\#]+\.)/";

    // Create table
    echo "<table class='table'
            <tr>
                <th>#</th>
                <th>Course</th>
                <th>Title</th>
                <th>Units</th>
                <th>Description</th>
            </tr>";

    if(preg_match_all($regex, $fileString, $matches)) {
        for($i = 0; $i < count($matches[0]); $i++) {
            echo "<tr>
                    <td>$i</td>
                    <td>{$matches[1][$i]}</td>
                    <td>{$matches[2][$i]}</td>
                    <td>{$matches[3][$i]}</td>
                    <td>{$matches[4][$i]}</td>";
        }
    }
    print_r($matches);

    //End of table
    echo "</table>";
?>