<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered">
    <thead class="bg-info">
        <tr>
            <th>Sl.No</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $get_users = "select * from `user_table` order by username asc";
            $result = mysqli_query($con, $get_users);
            $number = 0;
            while($row = mysqli_fetch_assoc($result)){
                $user_id = $row['user_id'];
                $user_name = $row['username'];
                $user_email = $row['user_email'];   
                $number++;
                echo "
                    <tr>
                        <td>$number</td>
                        <td>$user_name</td>
                        <td>$user_email</td>
                        <td><a href='index.php?delete_user=$user_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
                ";
            }

        ?>
    </tbody>
</table>