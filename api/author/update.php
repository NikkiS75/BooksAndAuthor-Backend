<?php
require '../connect.php';


    $postdata = file_get_contents("php://input");

    if(isset($postdata) && !empty($postdata))
    {

        $request = json_decode($postdata);

        $authorID    = mysqli_real_escape_string($con, (int)$request->data->authorID);
        $authorName = mysqli_real_escape_string($con, trim($request->data->authorName));
        $authorSurname = mysqli_real_escape_string($con, trim($request->data->authorSurname));


    $sql = "UPDATE author SET
     `authorSurname`='$authorSurname',
     `authorName`='$authorName'
     WHERE `authorID` = '{$authorID}' LIMIT 1";

    if(mysqli_query($con, $sql))
    {
        http_response_code(204);
    }
    else
    {
        return http_response_code(422);
    }
}
