<?php


    function getAllAuthors()
    {
    require '../connect.php';
    $authors = [] ;
    $sql = "SELECT
     authorID,
     authorName,
     authorSurname,
     (SELECT COUNT(*) FROM book WHERE book.`authorID` = author.`authorID`) AS quantBooks
     FROM author";
    if($result = mysqli_query($con,$sql))
    {
           $c = 0;
                 while($row = mysqli_fetch_assoc($result))
                       {
                           $authors[$c]['authorID'] = $row['authorID'];
                           $authors[$c]['authorName'] = $row['authorName'];
                           $authors[$c]['authorSurname'] = $row ['authorSurname'];
                           $authors[$c]['quantBooks'] = $row ['quantBooks'];
                           $c++;
                        }


         echo json_encode(['data'=>$authors]);
        }
        else
        {
            http_response_code(404);
        }
    }

    getAllAuthors();

