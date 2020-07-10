<?php
require '../connect.php';

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{

  $request = json_decode($postdata);


  $bookName = mysqli_real_escape_string($con, trim($request->data->bookName));
  $bookAnnotation = mysqli_real_escape_string($con, trim($request->data->bookAnnotation));
  $yearPublic = mysqli_real_escape_string($con, trim($request->data->yearPublic));
  $numberPages = mysqli_real_escape_string($con, trim($request->data->numberPages));
  $authorID = mysqli_real_escape_string($con, trim($request->data->authorID));



  $sql = "INSERT INTO book (`bookName`,
  `bookAnnotation`,
  `yearPublic`,
  `numberPages`,
   `authorID`)
   VALUES
  ('{$bookName}',
  '{$bookAnnotation}',
  '{$yearPublic}',
  '{$numberPages}',
  '{$authorID}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $book = [
      'bookName' => $bookName,
      'bookAnnotation' => $bookAnnotation,
      'yearPublic' => $yearPublic,
      'numberPages' => $numberPages,
      'bookID' =>  mysqli_insert_id($con),
      'authorID' =>  $authorID
    ];
    echo json_encode(['data'=>$book]);
  }
  else
  {
    http_response_code(422);
  }
}
