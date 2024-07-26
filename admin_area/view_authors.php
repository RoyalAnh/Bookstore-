<h3 class="text-center text-success">All Authors</h3>
<table class="table table-bordered">
    <thead class="bg-info">
        <tr>
            <th>Sl.No</th>
            <th>Author Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $get_authors = "select * from `authors` order by author_name asc";
            $result = mysqli_query($con, $get_authors);
            $number = 0;
            while($row = mysqli_fetch_assoc($result)){
                $author_id = $row['author_id'];
                $author_name = $row['author_name'];
                $number++;
                echo "
                    <tr>
                        <td>$number</td>
                        <td>$author_name</td>
                        <td><a href='index.php?edit_author=$author_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_author=$author_id' type='button' class='text-light' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-trash'></i></a>
                            <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' role='dialog'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                    <div class='modal-body'>
                                        <p class='text-danger'>Are you sure you want to delete this author?</p>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'><a href='index.php?view_authors' class='text-light text-decoration-none'>No</a></button>
                                        <button type='button' class='btn btn-primary'><a href='index.php?delete_author=$author_id' class='text-light text-decoration-none'>Yes</a></button>
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