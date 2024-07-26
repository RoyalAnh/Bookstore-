<?php 
    if(isset($_GET['edit_topic'])){
        $edit_id = $_GET['edit_topic'];
        $edit_query = "select * from `topics` where topic_id = $edit_id";
        $result_edit = mysqli_query($con, $edit_query);
        $row_edit = mysqli_fetch_assoc($result_edit);
        $topic_id = $row_edit['topic_id'];
        $topic_title = $row_edit['topic_title'];
    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Topic</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="topic_title" class="form-label">Topic Title</label>
            <input type="text" id="topic_title" class="form-control" value="<?php echo $topic_title ?>" name="topic_title" required="required">
        </div>
        <input type="submit" value="Update Topic" class="btn btn-info mb-3 px-3" name="update_topic">
    </form>
</div>

<?php 
    if(isset($_POST['update_topic'])){
        $update_id = $_GET['edit_topic'];
        $topic_title = $_POST['topic_title'];
        $update_topic = "update `topics` set topic_title = '$topic_title' where topic_id = $update_id";
        $result_update = mysqli_query($con, $update_topic);
        if($result_update){
            echo "<script>alert('Topic has been updated successfully!')</script>";
            echo "<script>window.open('index.php?view_topics', '_self')</script>";
        }
    }
?>