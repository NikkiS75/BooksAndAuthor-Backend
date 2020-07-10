<?php

    require '../connect.php';


    $bookID = ($_GET['bookID'] !== null && (int)$_GET['bookID'] > 0)? mysqli_real_escape_string($con, (int)$_GET['bookID']) : false;

    if(!$bookID)
    {
    return http_response_code(400);
    }

    $sql = "SELECT
    bookID,
    bookName,
    bookAnnotation,
    yearPublic,
    numberPages,
    author.`authorSurname`,
    author.`authorName`
    FROM book
    INNER JOIN author ON (author.`authorID` = book.`authorID`) WHERE bookID = '{$bookID}'";

    if($result = mysqli_query($con, $sql))
    {
    $book = [];

         while($row = mysqli_fetch_assoc($result))
             {
                $book['bookID'] = $row['bookID'];
                $book['bookName'] = $row['bookName'];
                $book['bookAnnotation'] = $row['bookAnnotation'];
                $book['yearPublic'] = $row['yearPublic'];
                $book['numberPages'] = $row['numberPages'];
                $book['authorName'] = $row['authorName'];
                $book['authorSurname'] = $row['authorSurname'];
             }
         echo json_encode(['data' => $book]);

    }
    else
    {
        return http_response_code(422);
    }



