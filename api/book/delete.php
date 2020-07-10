<?php

    require '../connect.php';


    $bookID = ($_GET['bookID'] !== null && (int)$_GET['bookID'] > 0)? mysqli_real_escape_string($con, (int)$_GET['bookID']) : false;

    if(!$bookID)
    {
        return http_response_code(400);
    }


    $sql = "DELETE FROM book WHERE bookID ='{$bookID}' LIMIT 1";

    if(mysqli_query($con, $sql))
    {
        http_response_code(204);
    }
    else
    {
        return http_response_code(422);
    }
