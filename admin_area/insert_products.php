<?php
include('../includes/connect.php');
if (isset($_POST['insert_book'])) {
    $book_title = $_POST['book_title'];
    $book_name = $_POST['book_name'];
    $publishing_year = $_POST['publishing_year'];
    $book_description = $_POST['book_description'];
    $book_keyword = $_POST['book_keyword'];
    $book_author = $_POST['book_author'];
    $book_topic = $_POST['book_topic'];
    $book_price = $_POST['book_price'];

    // accessing images
    $book_image = $_FILES['book_image']['name'];

    // accessing images tmp name
    $tmp_image = $_FILES['book_image']['tmp_name'];

    // accessing pdf file
    $book_pdf = $_FILES['book_pdf']['name'];

    // accessing pdf file tmp name
    $tmp_pdf = $_FILES['book_pdf']['tmp_name'];

    // checking empty conditions
    if ($book_title == '' || $book_name == '' || $publishing_year == '' || $book_description == '' || $book_keyword == '' || $book_author == '' || $book_topic == '' || $book_image == '' || $book_pdf == '' || $book_price == '') {
        echo "<script>alert('Please fill all fields!')</script>";
        exit();
    } else {
        move_uploaded_file($tmp_image, "book_image/$book_image");
        move_uploaded_file($tmp_pdf, "book_pdf/$book_pdf");

        // insert query
        $insert_books = "insert into `books` (book_title, book_name, publishing_year, book_description, book_keyword, topic_id, author_id, book_image, book_pdf, book_price) values('$book_title' , '$book_name', '$publishing_year', '$book_description', '$book_keyword', '$book_topic','$book_author', '$book_image', '$book_pdf', '$book_price')";
        $result_query = mysqli_query($con, $insert_books);
        if ($result_query) {
            echo "<script>alert('Book has been inserted successfully!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Books-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Books</h1>
        <!-- form start -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="book_title" class="form-label">Book Title</label>
                <input type="text" id="book_title" class="form-control" placeholder="Enter book title" name="book_title" autocomplete="off" required="required">
            </div>
            <!-- name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="book_name" class="form-label">Book Name</label>
                <input type="text" id="book_name" class="form-control" placeholder="Enter book name" name="book_name" autocomplete="off" required="required">
            </div>
            <!-- year -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="publishing_year" class="form-label">Publishing Year</label>
                <select name="publishing_year" id="publishing_year" class="form-control">

                </select>
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="book_description" class="form-label">Book description</label>
                <input type="text" id="book_description" class="form-control" placeholder="Enter book description" name="book_description" autocomplete="off" required="required">
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="book_keyword" class="form-label">Book keywords</label>
                <input type="text" id="book_keyword" class="form-control" placeholder="Enter book keywords" name="book_keyword" autocomplete="off" required="required">
            </div>
            <!-- topic -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="book_topic" id="book_topic" class="form-select js-example-basic-single">
                    <option value="">Select a Topic</option>
                    <?php
                    $select_query = "select * from `topics` order by topic_title ASC";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $topic_id = $row['topic_id'];
                        $topic_title = $row['topic_title'];
                        echo "<option value='$topic_id'>$topic_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- author -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="book_author" id="book_author" class="form-select js-example-basic-single">
                    <option value="">Select an Author</option>
                    <?php
                    $select_query = "select * from `authors` order by author_name ASC";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $author_id = $row['author_id'];
                        $author_name = $row['author_name'];
                        echo "<option value='$author_id'>$author_name</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="book_image" class="form-label">Book image</label>
                <input type="file" id="book_image" class="form-control" name="book_image" required="required">
            </div>

            <!-- pdf file -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="book_pdf" class="form-label">Book PDF</label>
                <input type="file" id="book_pdf" class="form-control" name="book_pdf" required="required">
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="book_price" class="form-label">Price</label>
                <input type="text" id="book_price" class="form-control" placeholder="Enter the price" name="book_price" autocomplete="off" required="required">
            </div>
            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" value="Insert Book" class="btn btn-info mb-3 px-3" name="insert_book">

            </div>
        </form>
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