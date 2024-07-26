<h3 class="text-center text-success">All products</h3>
<table class="table table-bordered  mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl.No</th>
            <th>Book Name</th>
            <th>Book Image</th>
            <th>Publishing Year</th>
            <th>Author</th>
            <th>Topic</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $get_books = "select * from `books` inner join `authors` on books.author_id = authors.author_id inner join `topics` on books.topic_id = topics.topic_id order by publishing_year desc";
            $result = mysqli_query($con, $get_books);
            $number = 0;
            while($row = mysqli_fetch_assoc($result)){
                $book_id = $row['book_id'];
                $book_name = $row['book_name'];
                $book_image = $row['book_image'];
                $publishing_year = $row['publishing_year'];
                $author_name = $row['author_name'];
                $topic_title = $row['topic_title'];
                $number++;
                echo "
                    <tr>
                        <td>$number</td>
                        <td>$book_name</td>
                        <td><img src='book_image/$book_image' width='100' height='100'></td>
                        <td>$publishing_year</td>
                        <td>$author_name</td>
                        <td>$topic_title</td>
                        <td><a href='index.php?edit_book=$book_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_book=$book_id' type='button' class='text-light' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-trash'></i></a>
                        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' role='dialog'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                <div class='modal-body'>
                                    <p class='text-danger'>Are you sure you want to delete this book?</p>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'><a href='index.php?view_products' class='text-light text-decoration-none'>No</a></button>
                                    <button type='button' class='btn btn-primary'><a href='index.php?delete_book=$book_id' class='text-light text-decoration-none'>Yes</a></button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </td>

                    </tr>
                ";
            }

        ?>
    </tbody>
</table>