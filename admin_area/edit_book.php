<?php
if (isset($_GET['edit_book'])) {
    $edit_id = $_GET['edit_book'];
    $get_data = "select * from `books` where book_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $book_title = $row['book_title'];
    $book_name = $row['book_name'];
    $publishing_year = $row['publishing_year'];
    $book_description = $row['book_description'];
    $book_keyword = $row['book_keyword'];
    $author_id = $row['author_id'];
    $topic_id = $row['topic_id'];
    $book_image = $row['book_image'];
    $book_pdf = $row['book_pdf'];
    $book_price = $row['book_price'];

    $select_topic = "select * from `topics` where topic_id = $topic_id";
    $result_topic = mysqli_query($con, $select_topic);
    $row_topic = mysqli_fetch_assoc($result_topic);
    $book_topic = $row_topic['topic_title'];

    $select_author = "select * from `authors` where author_id = $author_id";
    $result_author = mysqli_query($con, $select_author);
    $row_author = mysqli_fetch_assoc($result_author);
    $book_author = $row_author['author_name'];
} else {
    echo "<script>window.open('index.php', '_self')</script>";
    exit();
}

?>

<div class="container mt-5">
    <h1 class="text-center">Edit Book</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="book_title" class="form-label">Book Title</label>
            <input type="text" id="book_title" class="form-control" value="<?php echo $book_title ?>" name="book_title" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="book_name" class="form-label">Book Name</label>
            <input type="text" id="book_name" class="form-control" value="<?php echo $book_name ?>" name="book_name" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="publishing_year" class="form-label">Publishing Year</label>
            <select name="publishing_year" id="publishing_year" class="form-select">
                <option value="<?php echo $publishing_year; ?>"><?php echo $publishing_year; ?></option>
            </select>

        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="book_description" class="form-label">Book description</label>
            <input type="text" id="book_description" class="form-control" value="<?php echo $book_description ?>" name="book_description" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="book_keyword" class="form-label">Book keywords</label>
            <input type="text" id="book_keyword" class="form-control" value="<?php echo $book_keyword ?>" name="book_keyword" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="book_topic" id="book_topic" class="form-select js-example-basic-single">
                <option value="<?php echo $book_topic; ?>"><?php echo $book_topic; ?></option>
                <?php
                $select_query1 = "select * from `topics` order by topic_title ASC";
                $result_query1 = mysqli_query($con, $select_query1);
                while ($row = mysqli_fetch_assoc($result_query1)) {
                    $topic_id = $row['topic_id'];
                    $topic_title = $row['topic_title'];
                    echo "<option value='$topic_id'>$topic_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="book_author" id="book_author" class="form-select js-example-basic-single">
                <option value="<?php echo $book_author; ?>"><?php echo $book_author; ?></option>
                <?php
                $select_query2 = "select * from `authors` order by author_name ASC";
                $result_query2 = mysqli_query($con, $select_query2);
                while ($row = mysqli_fetch_assoc($result_query2)) {
                    $author_id = $row['author_id'];
                    $author_name = $row['author_name'];
                    echo "<option value='$author_id'>$author_name</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="book_image" class="form-label">Book Image</label>
            <input type="file" id="book_image" class="form-control" name="book_image">
            <input type="text" name="old_image" value="<?php echo $book_image; ?>" hidden>
            <a href="book_image/<?php echo $book_image; ?>" target="_blank">Current Image</a>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="book_pdf" class="form-label">Book PDF</label>
            <input type="file" id="book_pdf" class="form-control" name="book_pdf">
            <input type="text" name="old_pdf" value="<?php echo $book_pdf; ?>" hidden>
            <a href="book_pdf/<?php echo $book_pdf; ?>" target="_blank">Current PDF</a>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="book_price" class="form-label">Price</label>
            <input type="text" id="book_price" class="form-control" value="<?php echo $book_price ?>" name="book_price" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" value="Update Book" class="btn btn-info mb-3 px-3" name="update_book">
        </div>
    </form>
</div>

<?php 
    if(isset($_POST['update_book'])){
        $book_title = $_POST['book_title'];
        $book_name = $_POST['book_name'];
        $publishing_year = $_POST['publishing_year'];
        $book_description = $_POST['book_description'];
        $book_keyword = $_POST['book_keyword'];
        $book_author = $_POST['book_author'];
        $book_topic = $_POST['book_topic'];
        $book_price = $_POST['book_price'];

        $book_image = $_FILES['book_image']['name'];
        $tmp_image = $_FILES['book_image']['tmp_name'];

        $book_pdf = $_FILES['book_pdf']['name'];
        $tmp_pdf = $_FILES['book_pdf']['tmp_name'];

        move_uploaded_file($tmp_image, "book_image/$book_image");
        move_uploaded_file($tmp_pdf, "book_pdf/$book_pdf");

        if($book_title=='' || $book_name=='' || $publishing_year=='' || $book_description=='' || $book_keyword=='' || $book_author=='' || $book_topic=='' || $book_image=='' || $book_pdf=='' || $book_price==''){
            echo "<script>alert('Please fill all fields!')</script>";
            exit();
        } else {
            move_uploaded_file($tmp_image, "book_image/$book_image");
            move_uploaded_file($tmp_pdf, "book_pdf/$book_pdf");

            // update book
            $update_book = "update `books` set book_title = '$book_title', book_name = '$book_name', publishing_year = '$publishing_year', book_description = '$book_description', book_keyword = '$book_keyword', topic_id = '$book_topic', author_id = '$book_author', book_image = '$book_image', book_pdf = '$book_pdf', book_price = '$book_price' where book_id = $edit_id";
            $result_update = mysqli_query($con, $update_book);
            if($result_update){
                echo "<script>alert('Book has been updated successfully!')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }
        }

    }
?>