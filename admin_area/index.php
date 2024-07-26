<?php 
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();

    if(!isset($_SESSION['admin_name'])) {
        echo "<script>window.open('admin_login.php', '_self')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .admin_image {
            width: 150px;
            object-fit: contain;
        }
        .footer {
            position: absolute;
            bottom: 0;
        }
        .body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">

        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome <?php echo $_SESSION['admin_name']; ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/openbooks.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_products.php" class="nav-link text-light bg-info my-1 mx-1">Insert Books</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1 mx-1">View books</a></button>
                    <button><a href="index.php?insert_topics" class="nav-link text-light bg-info my-1 mx-1">Insert Topics</a></button>
                    <button><a href="index.php?view_topics" class="nav-link text-light bg-info my-1 mx-1">View Topics</a></button>
                    <button><a href="index.php?insert_authors" class="nav-link text-light bg-info my-1 mx-1">Insert Authors</a></button>
                    <button><a href="index.php?view_authors" class="nav-link text-light bg-info my-1 mx-1">View Authors</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1 mx-1">List Users</a></button>
                    <button><a href="admin_logout.php" class="nav-link text-light bg-info my-1 mx-1">Logout</a></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <?php 
            if(isset($_GET['insert_topics'])) {
                include('insert_topics.php');
            }
            if(isset($_GET['insert_authors'])) {
                include('insert_authors.php');
            }
            if(isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if(isset($_GET['edit_book'])) {
                include('edit_book.php');
            }
            if(isset($_GET['delete_book'])) {
                include('delete_book.php');
            }
            if(isset($_GET['view_topics'])) {
                include('view_topics.php');
            }
            if(isset($_GET['view_authors'])) {
                include('view_authors.php');
            }
            if(isset($_GET['edit_topic'])){
                include('edit_topic.php');
            }
            if(isset($_GET['edit_author'])){
                include('edit_author.php');
            }
            if(isset($_GET['delete_topic'])){
                include('delete_topic.php');
            }
            if(isset($_GET['delete_author'])){
                include('delete_author.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['edit_user'])){ 
                include('edit_user.php');
            }
        ?>
    </div>

    <div class="bg-info p-3 text-center text-white">
    <p>&copy; 2024 QH Group. All right reserved.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#book_author').select2({
                placeholder: 'Select an Author',
                dropdownParent: $('#book_author').parent()
            });
            $('#book_topic').select2({
                placeholder: 'Select a Topic',
                dropdownParent: $('#book_topic').parent()
            });
        });
    </script>
    <script>
        window.onload = function() {
            let yearSelect =document.querySelector('select[name="publishing_year"]');
            let currentYear = (new Date()).getFullYear();
            for (let i = currentYear; i >= 1901; i--) {
                let option = document.createElement('option');
                option.innerHTML = i;
                option.value = i;
                yearSelect.appendChild(option);
            }
        }
    </script>
</body>

</html>