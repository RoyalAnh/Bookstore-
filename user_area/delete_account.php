
    <h3 class="text-danger text-center mb-4 mt-4">Delete Account</h3>
    <form action="" method="post" class="mt-5"> 
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" value="Delete Account" name="delete">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" value="Don't Delete Account" name="dont_delete">
    </div>
    </form>
<?php 
    $username_session = $_SESSION['username'];
    if(isset($_POST['delete'])) {
        $delete_query = "delete from `user_table` where username = '$username_session'";
        $result = mysqli_query($con, $delete_query);
        if($result) {
            session_destroy();
            echo "<script>alert('Account deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])) {
        echo "<script>window.open('profile.php','_self')</script>";
    }
?>