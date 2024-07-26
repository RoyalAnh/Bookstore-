<?php
if(isset($_GET['delete_book'])) {
    $delete_id = $_GET['delete_book'];
    $delete_book = "delete from `books` where book_id = $delete_id";
    $result = mysqli_query($con, $delete_book);
    if($result) {
        echo "<script>alert('Book has been deleted')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }
}
?>