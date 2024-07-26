<?php
// including connect file
// include('./includes/connect.php');

// getting books
function getbooks()
{
    global $con;
    // condition to check isset or not
    if (!isset($_GET['topic'])) {


        $select_query = "SELECT * FROM `books` ORDER BY RAND() LIMIT 0,6";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $book_id = $row['book_id'];
            $book_title = $row['book_title'];
            $book_image = $row['book_image'];
            echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card text-center'>
                                    <img src='./admin_area/book_image/$book_image' class='card-img-top mt-3' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$book_title
                                        </h5>
                                        <a href='book_details.php?book_id=$book_id' class='btn btn-info mt-3'>View Book</a>
                                    </div>
                                </div>
                            </div>
                        ";
        }
    }
}

// getting all books
function get_all_books()
{
    global $con;
    // condition to check isset or not
    if (!isset($_GET['topic'])) {


        $select_query = "SELECT * FROM `books`";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $book_id = $row['book_id'];
            $book_title = $row['book_title'];
            $book_image = $row['book_image'];
            echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card text-center'>
                                    <img src='./admin_area/book_image/$book_image' class='card-img-top mt-3' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$book_title
                                        </h5>
                                        <a href='book_details.php?book_id=$book_id' class='btn btn-info mt-3'>View Book</a>
                                    </div>
                                </div>
                            </div>
                        ";
        }
    }
}

// getting unique topics
function get_unique_topics()
{
    global $con;
    if (isset($_GET['topic'])) {
        $topic_id = $_GET['topic'];
        $select_query = "SELECT * FROM `books` WHERE topic_id = $topic_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-danger text-center '>No books found for this topic</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $book_id = $row['book_id'];
            $book_title = $row['book_title'];
            $topic_id = $row['topic_id'];
            $book_image = $row['book_image'];
            echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card text-center'>
                                    <img src='./admin_area/book_image/$book_image' class='card-img-top mt-3' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$book_title
                                        </h5>
                                        <a href='book_details.php?book_id=$book_id' class='btn btn-info mt-3'>View Book</a>
                                    </div>
                                </div>
                            </div>
                        ";
        }
    }
}

// displaying topic inside nav
function get_topic()
{
    global $con;
    $select_topics = "SELECT * FROM `topics` ORDER BY topic_title ASC";
    $result_topics = mysqli_query($con, $select_topics);
    while ($row_data = mysqli_fetch_assoc($result_topics)) {
        $topic_id = $row_data['topic_id'];
        $topic_title = $row_data['topic_title'];
        echo "<li class='nav-item'><a href='index.php?topic=$topic_id' class='nav-link text-light'>$topic_title</a></li>";
    }
}

// searching books
function search_books()
{
    global $con;
    if (isset($_GET['search_data_book'])) {
        $search_data_value = $_GET['search_data'];
        echo '<script>document.getElementById("search_data").value = "' . $search_data_value . '";</script>';
        $search_query = "SELECT * FROM `books` INNER JOIN `authors` ON books.author_id = authors.author_id WHERE book_title LIKE '%$search_data_value%' OR book_name LIKE '%$search_data_value%' OR book_keyword LIKE '%$search_data_value%' OR author_name LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No results match. Please try again!</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $book_id = $row['book_id'];
            $book_title = $row['book_title'];
            $book_image = $row['book_image'];
            echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card text-center'>
                                    <img src='./admin_area/book_image/$book_image' class='card-img-top mt-3' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$book_title
                                        </h5>
                                        <a href='book_details.php?book_id=$book_id' class='btn btn-info mt-3'>View Book</a>
                                    </div>
                                </div>
                            </div>
                        ";
        }
    }
}

// view details function
function view_details()
{
    global $con;
    // condition to check isset or not
    if (isset($_GET['book_id'])) {
        if (!isset($_GET['topic'])) {
            $book_id = $_GET['book_id'];
            $select_query = "SELECT * FROM `books` INNER JOIN `authors` ON books.author_id = authors.author_id INNER JOIN `topics` ON books.topic_id = topics.topic_id WHERE book_id = $book_id";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $book_id = $row['book_id'];
                $book_title = $row['book_title'];
                $book_name = $row['book_name'];
                $publishing_year = $row['publishing_year'];
                $book_description = $row['book_description'];
                $book_keyword = $row['book_keyword'];
                $topic_title = $row['topic_title'];
                $author_name = $row['author_name'];
                $book_image = $row['book_image'];
                $book_pdf = $row['book_pdf'];
                echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card text-center'>
                                    <img src='./admin_area/book_image/$book_image' class='card-img-top mt-3' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$book_title
                                        </h5>";
                if (isset($_SESSION['username'])) {
                    echo "<a href='admin_area/book_pdf/$book_pdf' class='btn btn-info mt-3'>Read</a>";
                } else {
                    echo "<a href='user_area/user_login.php' class='btn btn-info mt-3'>Sign in to read</a>";
                }
                echo "
                                        <br>
                                        <a href='' class='btn btn-back btn-secondary mt-3'>Go Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-8'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-info mb-3'>Book information</h4>
                            <hr>
                            <table class='table'>
                                <tbody>
                                    <tr>
                                        <th scope='row'>Title:</th>
                                        <td>$book_name</td>
                                        
                                    </tr>
                                    <tr>
                                        <th scope='row'>Author:</th>
                                        <td>$author_name</td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Publishing Year:</th>
                                        <td>$publishing_year</td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Topic:</th>
                                        <td>$topic_title</td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Keywords:</th>
                                        <td>$book_keyword</td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Description:</th>
                                        <td>$book_description</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                        ";
            }
        }
    }
}

function get_authors()
{
    global $con;
    $get_authors = "select * from `authors` order by author_name asc";
    $result = mysqli_query($con, $get_authors);
    $number = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $author_id = $row['author_id'];
        $author_name = $row['author_name'];
        $number++;
        echo "
        <ol class='list-group'>
        <li class='list-group-item d-flex justify-content-between align-items-start'>
          <div class='ms-2 me-auto'>
            <div class='fw-bold'>$number.<a href='author_books.php?author=$author_id' class='text-decoration-none'> $author_name</a></div>
          </div>
        </li>
      </ol>
        ";
    }
}

function get_unique_authors(){
    global $con;
    if(isset($_GET['author'])){
        $author_id = $_GET['author'];
        $select_query = "SELECT * FROM `books` WHERE author_id = $author_id";
        $result = mysqli_query($con, $select_query);
        $num = mysqli_num_rows($result);
        if($num == 0){
            echo "<h2 class='text-center text-danger'>No books found in this author</h2>";
        }
        while($row = mysqli_fetch_assoc($result)){
            $book_id = $row['book_id'];
            $book_title = $row['book_title'];
            $book_image = $row['book_image'];
            echo "
            <div class='col-md-4 mb-2'>
                <div class='card text-center'>
                    <img src='./admin_area/book_image/$book_image' class='card-img-top mt-3' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$book_title</h5>
                        <a href='book_details.php?book_id=$book_id' class='btn btn-info mt-3'>View Book</a>
                    </div>
                </div>
            </div>
            ";
        }
    }

}
