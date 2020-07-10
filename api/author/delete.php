<?php

require '../connect.php';

    $authorID = ($_GET['authorID'] !== null && (int)$_GET['authorID'] > 0)? mysqli_real_escape_string($con, (int)$_GET['authorID']) : false;

    if(!$authorID)
    {
        return http_response_code(400);
    }

    $sql = "DELETE FROM author WHERE authorID ='{$authorID}' LIMIT 1";

    if(mysqli_query($con, $sql))
    {
        deleteBook($authorID, $con);
        http_response_code(204);
    }
    else
    {
        return http_response_code(422);
    }


    function deleteBook($authorID, $con){

    $sql = "DELETE FROM book WHERE authorID ='{$authorID}' LIMIT 1";

    if(mysqli_query($con, $sql))
    {
         http_response_code(204);
    }
    else
    {
     return http_response_code(422);
    }
}

