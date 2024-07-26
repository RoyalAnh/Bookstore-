<?php 
    if(isset($_GET['edit_author'])){
        $edit_id = $_GET['edit_author'];
        $edit_query = "select * from `authors` where author_id = $edit_id";
        $result_edit = mysqli_query($con, $edit_query);
        $row_edit = mysqli_fetch_assoc($result_edit);
        $author_id = $row_edit['author_id'];
        $author_name = $row_edit['author_name'];
    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Author</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="author_name" class="form-label">Author Name</label>
            <input type="text" id="author_name" class="form-control" value="<?php echo $author_name ?>" name="author_name" required="required">
        </div>
        <input type="submit" value="Update Author" class="btn btn-info mb-3 px-3" name="update_author">
    </form>
</div>

<?php 
    if(isset($_POST['update_author'])){
        $update_id = $_GET['edit_author'];
        $author_name = $_POST['author_name'];
        $update_author = "update `authors` set author_name = '$author_name' where author_id = $update_id";
        $result_update = mysqli_query($con, $update_author);
        if($result_update){
            echo "<script>alert('Author has been updated successfully!')</script>";
            echo "<script>window.open('index.php?view_authors', '_self')</script>";            
        }
    }
?>