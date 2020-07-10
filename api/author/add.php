<?php

function Add(){
require '../connect.php';

        $postdata = file_get_contents("php://input");

        if(isset($postdata) && !empty($postdata))
        {

            $request = json_decode($postdata);

            $authorName = mysqli_real_escape_string($con, trim($request->data->authorName));
            $authorSurname = mysqli_real_escape_string($con, trim($request->data->authorSurname));

            $sql = "INSERT INTO author (`authorSurname`,`authorName`)
                VALUES ('{$authorSurname}','{$authorName}')";

            if(mysqli_query($con,$sql))
            {
                http_response_code(201);

                $author = [
                'authorSurname' => $authorSurname,
                'authorName' => $authorName,
                'authorID'    => mysqli_insert_id($con)
                ];
                echo json_encode(['data'=>$author]);
            }
            else
            {
                http_response_code(422);
            }
    }
}

Add();









