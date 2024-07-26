<?php 
    if(isset($_GET['delete_author'])) {
        $delete_id = $_GET['delete_author'];
        $delete_author = "delete from `authors` where author_id = $delete_id";
        $result = mysqli_query($con, $delete_author);
        if($result) {
            echo "<script>alert('Author has been deleted')</script>";
            echo "<script>window.open('index.php?view_authors', '_self')</script>";
        }
    }
?>