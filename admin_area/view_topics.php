<h3 class="text-center text-success">View Topics</h3>
<table class="table table-bordered">
    <thead class="bg-info">
        <tr>
            <th>Sl.No</th>
            <th>Topic Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $get_topics = "select * from `topics` order by topic_title asc";
            $result = mysqli_query($con, $get_topics);
            $number = 0;
            while($row = mysqli_fetch_assoc($result)){
                $topic_id = $row['topic_id'];
                $topic_title = $row['topic_title'];
                $number++;
                echo "
                    <tr>
                        <td>$number</td>
                        <td>$topic_title</td>
                        <td><a href='index.php?edit_topic=$topic_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_topic=$topic_id' type='button' class='text-light' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-trash'></i></a>
                        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' role='dialog'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                <div class='modal-body'>
                                    <p class='text-danger'>Are you sure you want to delete this topic?</p>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'><a href='index.php?view_topics' class='text-light text-decoration-none'>No</a></button>
                                    <button type='button' class='btn btn-primary'><a href='index.php?delete_topic=$topic_id' class='text-light text-decoration-none'>Yes</a></button>
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
