<?php
if(isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_user = "select * from `user_table` where username = '$user_session_name'";
    $result = mysqli_query($con, $select_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_password = $row_fetch['user_password'];
}   
    if(isset($_POST['change_email'])) {
        $user_session_name = $_SESSION['username'];
        $new_email = $_POST['new_email'];
        $update_query = "update `user_table` set user_email = '$new_email' where username = '$user_session_name'";
        $result = mysqli_query($con, $update_query);
        if($result) {
            echo "<script>alert('Email changed successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
    }
    if(isset($_POST['change_password'])) {
        $user_session_name = $_SESSION['username'];
        $new_password = $_POST['new_password'];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_query = "update `user_table` set user_password = '$hashed_password' where username = '$user_session_name'";
        $result = mysqli_query($con, $update_query);
        if($result) {
            echo "<script>alert('Password changed successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .title.is-3 {
            font-size: 2rem;
        }

        .hidden {
            display: none;
        }

        #changePasswordForm {
            text-align: center;
        }

        #changePasswordForm label {
            display: block;
            margin-bottom: 5px;
        }

        #changePasswordForm input {
            margin-bottom: 10px;
        }

        #changePasswordForm input[type="submit"] {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <h3 class="text-center text-success mb-4">My Account</h3>
    <div class="container text-center">
        
        <h4 class="title is-3"><?php echo $user_name; ?></h4>
        <p>Email: <b><?php echo $user_email; ?></b> -&nbsp;<a href="#" id="changeEmailLink">Change</a></p>
        <!-- Form to change email -->
        <form action="" method="post" id="changeEmailForm" class="hidden">
            <label for="new_email">New Email:</label>
            <input type="email" name="new_email" required>
            <input type="submit" name="change_email" value="Change Email">
        </form>
        
        <p><a href="#" id="changePasswordLink">Change password</a></p>
        <!-- Form to change password -->
        <form action="" method="post" id="changePasswordForm" class="hidden">
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" required>

            <label for="conf_new_password">Confirm New Password:</label>
            <input type="password" name="conf_new_password" required>
            <input type="submit" name="change_password" value="Change Password">
        </form>
        


    </div>
    <script>
        document.getElementById('changeEmailLink').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('changeEmailForm').classList.toggle('hidden');
        });
        document.getElementById('changePasswordLink').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('changePasswordForm').classList.toggle('hidden');
        })
    </script>
</body>

</html>