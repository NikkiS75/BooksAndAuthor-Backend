<?php

require '../connect.php';


    $authorID = ($_GET['authorID'] !== null && (int)$_GET['authorID'] > 0)? mysqli_real_escape_string($con, (int)$_GET['authorID']) : false;

    if(!$authorID)
    {
        return http_response_code(400);
    }

    $sql = "SELECT authorID,
     authorSurname,
     authorName,
     (SELECT COUNT(*) FROM book WHERE book.`authorID` = author.`authorID`) AS quantBooks
      FROM author
      WHERE authorID ='{$authorID}' LIMIT 1";

    if($result = mysqli_query($con, $sql))
    {
        $author = [];

        while($row = mysqli_fetch_assoc($result))
            {
               $author['authorID'] = $row['authorID'];
               $author['authorName'] = $row['authorName'];
               $author['authorSurname'] = $row ['authorSurname'];
               $author['quantBooks'] = $row ['quantBooks'];

            }

        echo json_encode(['data' => $author]);

    }
    else
    {
        return http_response_code(422);
    }



