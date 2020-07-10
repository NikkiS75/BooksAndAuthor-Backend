<?php
    function getAllBooks()
    {
    require '../connect.php';
    $books =[];
    $sql = "SELECT
     bookID,
     bookName,
     bookAnnotation,
     yearPublic,
     numberPages,
     author.`authorSurname`,
     author.`authorName`
     FROM book
     INNER JOIN author ON
     (author.`authorID` = book.`authorID`)";

    if($result = mysqli_query($con,$sql))
    {
      $c = 0;
      while($row = mysqli_fetch_assoc($result))
            {
                $books[$c]['bookID'] = $row['bookID'];
                $books[$c]['bookName']= $row['bookName'];
                $books[$c]['bookAnnotation'] = $row['bookAnnotation'];
                $books[$c]['yearPublic'] = $row['yearPublic'];
                $books[$c]['numberPages'] = $row['numberPages'];
                $books[$c]['authorName']= $row['authorName'];
                $books[$c]['authorSurname'] = $row['authorSurname'];
                $c++;
             }

         echo json_encode(['data'=>$books]);
        }
        else
        {
            http_response_code(404);
        }
    }



    getAllBooks();

