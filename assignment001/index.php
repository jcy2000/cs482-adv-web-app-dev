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
    $relativeFilePath = "mathcourses.txt";

    // Put the entire text file into a massive string, cause that's the only way I know. -_-
    $fileString = file_get_contents($relativeFilePath);

    if(!$fileString) exit("Couldn't read or find the file: " + $relativeFilePath);

    $courseRegex = "/(MATH\s\d+R?)(\s{3}\S[A-Z\s?:\-\&]+\s{2})(?:Repeatable\s{3})?(\d\-?\d{0,2})\s/";

    echo "<table class='table'>
            <tr>
                <th>Course</th>
                <th>Title</th>
                <th>Credits</th>
            </tr>";
    if(preg_match_all($courseRegex, $fileString, $courseStrings)){
        for($i=0;$i<count($courseStrings[0]);$i++) {
            echo "<tr>
                    <td>{$courseStrings[1][$i]}</td>
                    <td>{$courseStrings[2][$i]}</td>
                    <td>{$courseStrings[3][$i]}</td>
                  </tr>";
            
        }
    }
    else {
        echo "it didn't work!";
    }
    echo "</table>";

?>