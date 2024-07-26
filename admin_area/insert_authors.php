<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_author'])){
        $author_name = $_POST['author_name'];
        // select data from database
        $select_query = "select * from `authors` where author_name = '$author_name'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script>alert('This author name already exists')</script>";
        }
        else{
        $insert_query = "insert into `authors` (author_name) values ('$author_name')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Author has been inserted')</script>";
        }
        }
    }
?>
<h2 class="text-center">Insert Authors</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="author_name" placeholder="Author's name" aria-label="Authors" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_author" value="Insert Authors">
        
    </div>
</form>