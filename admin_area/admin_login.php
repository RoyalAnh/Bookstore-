<?php
include('../includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center" style="height :100vh">
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post" class="p-5 rounded shadow" style="max-width: 30rem; width: 100%">
                <h2 class="text-center mb-2">Admin Login</h2>
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required="required">
                </div>

                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required="required">
                </div>

                <div>
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
                    
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    $select_query = "select * from `admin_table` where admin_name = '$admin_username'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        $_SESSION['admin_name'] = $admin_username;
        $row_data = mysqli_fetch_assoc($result);
        $db_pass = $row_data['admin_password'];
        if (password_verify($admin_password, $db_pass)) {
            $_SESSION['admin_name'] = $admin_username;
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    } else {
        echo "<script>alert('Username or Password did not match')</script>";
    }
}
?>