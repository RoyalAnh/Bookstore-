<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
        <div class="d-flex align-items-center justify-content-center"
             style="height : 100vh">
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post"class="p-5 rounded shadow" style="max-width: 30rem; width: 100%">
                <h2 class="text-center">User Login</h2>
                    <div class="form-outline mb-4">
                        <!-- username field -->
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>

                    <div class="form-outline mb-4">
                        <!-- user password -->
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info px-3 py-2 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "select * from `user_table` where username = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        $row_data = mysqli_fetch_assoc($result);
        $db_pass = $row_data['user_password'];
        if (password_verify($user_password, $db_pass)) {
            $_SESSION['username'] = $user_username;
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('../index.php', '_self')</script>";
        }
    } else {
        echo "<script>alert('Username or Password did not match')</script>";
    }
}
?>