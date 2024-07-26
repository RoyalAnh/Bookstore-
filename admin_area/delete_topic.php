<?php 
    if(isset($_GET['delete_topic'])) {
        $delete_id = $_GET['delete_topic'];
        $delete_topic = "delete from `topics` where topic_id = $delete_id";
        $result = mysqli_query($con, $delete_topic);
        if($result) {
            echo "<script>alert('Topic has been deleted')</script>";
            echo "<script>window.open('index.php?view_topics', '_self')</script>";
        }
    }
?>
