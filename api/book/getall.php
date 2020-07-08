<?php
class Book
{
    public $bookID;
    public $bookName;
    public $bookAnnotation;
    public $yearPublic;
    public $numberPages;
    public $authorName;
    public $authorSurname;



    function set_bookID($bookID)
    {
        $this->bookID = $bookID;
    }
    function get_bookID()
    {
        return $this->bookID;
    }
    function set_bookName($bookName)
    {
        $this->bookName = $bookName;
    }
    function get_bookName()
    {
         return $this->bookName;
    }
    function set_Annotation($annotation)
    {
         $this->bookAnnotation = $annotation;
    }
    function get_Annotation()
    {
         return $this->bookAnnotation;
    }
    function set_YearPublic($yearPublic)
    {
         $this->yearPublic = $yearPublic;
    }
    function get_YearPublic()
    {
         return $this->yearPublic;
    }
    function set_NumberPages($numberPages)
    {
         $this->numberPages = $numberPages;
    }
    function get_NumberPages()
    {
         return $this->numberPages;
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


}

    function getAllBooks()
    {
    require '../connect.php';
    $book = new Book;
    $books[] = $book;
    $sql = "SELECT bookID, bookName, bookAnnotation, yearPublic, numberPages, author.`authorSurname`, author.`authorName` FROM book
     INNER JOIN author ON (author.`authorID` = book.`authorID`)";

    if($result = mysqli_query($con,$sql))
    {
      $c = 0;
      while($row = mysqli_fetch_assoc($result))
            {
                $books[$c] -> set_bookID($row['bookID']);
                $books[$c] -> set_bookName($row['bookName']);
                $books[$c] -> set_Annotation($row['bookAnnotation']);
                $books[$c] -> set_YearPublic($row['yearPublic']);
                $books[$c] -> set_NumberPages($row['numberPages']);
                $books[$c] -> set_authorName($row['authorName']);
                $books[$c] -> set_authorSurname($row['authorSurname']);
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

