<?php
class Author
{
    public $authorID;
    public $authorName;
    public $authorSurname;
    public $quantBooks;



    function set_authorID($authorID)
    {
        $this->authorID = $authorID;
    }
    function get_authorID()
    {
        return $this->authorID;
    }
    function set_authorName($authorName)
    {
        $this->authorName = $authorName;
    }
    function get_authorName()
    {
        return $this->authorName;
    }
    function set_authorSurname($authorSurname)
    {
         $this->authorSurname = $authorSurname;
    }
    function get_authorSurname()
    {
         return $this->authorSurname;
    }
    function set_quantBooks($quantBooks)
    {
         $this->quantBooks = $quantBooks;
    }
    function get_quantBooks()
    {
          return $this->quantBooks;
     }


}

    function getAllAuthors()
    {
    require '../connect.php';
    $author = new Author;
    $authors [] = $author;
    $sql = "SELECT authorID, authorName, authorSurname, (SELECT COUNT(*) FROM book INNER JOIN author ON book.`authorID` = author.`authorID`) AS quantBooks
     FROM author";
    if($result = mysqli_query($con,$sql))
    {
      $c = 0;
      while($row = mysqli_fetch_assoc($result))
            {
                $authors[$c]-> set_authorID($row['authorID']);
                $authors[$c]-> set_authorName($row['authorName']);
                $authors[$c]-> set_authorSurname($row['authorSurname']);
                $authors[$c]-> set_quantBooks($row['quantBooks']);
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

