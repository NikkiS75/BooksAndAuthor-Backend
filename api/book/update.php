<?php
require '../connect.php';


$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{

  $request = json_decode($postdata);



  $bookID    = mysqli_real_escape_string($con, (int)$request->data->bookID);
  $bookName = mysqli_real_escape_string($con, trim($request->data->bookName));
  $bookAnnotation = mysqli_real_escape_string($con, trim($request->data->bookAnnotation));
  $yearPublic = mysqli_real_escape_string($con, trim($request->data->yearPublic));
  $numberPages = mysqli_real_escape_string($con, trim($request->data->numberPages));


  $sql = "UPDATE book SET
  `bookName`='{$bookName}',
  `bookAnnotation`='{$bookAnnotation}',
  `yearPublic` = '{$yearPublic}',
  `numberPages` = '{$numberPages}' WHERE
  `bookID` = '{$bookID}' LIMIT 1";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }
}
