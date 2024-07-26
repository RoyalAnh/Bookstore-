<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_topic'])){
        $topic_title = $_POST['topic_title'];
        // select data from database
        $select_query = "select * from `topics` where topic_title = '$topic_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script>alert('Topics already exist')</script>";
        }
        else{
        $insert_query = "insert into `topics` (topic_title) values ('$topic_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Topics has been inserted successfully')</script>";
        }
        }
    }
?>
<h2 class="text-center">Insert Topics</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="topic_title" placeholder="Topics" aria-label="Topics" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_topic" value="Insert Topics">
    </div>
</form>