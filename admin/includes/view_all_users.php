<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Role</th>

                        </tr>
                    </thead>
                    <tbody>

<?php 

    $query="SELECT * FROM users ";
    $select_users =mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_users)) {

        $user_id= $row['user_id'];
        $username= $row['username'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];


       echo "<tr>";
       echo "<td>$user_id</td>";
       echo "<td>$username</td>";
       echo "<td>$user_firstname</td>";

    //    $query="SELECT * FROM categories WHERE cat_id =$post_category_id ";
    //    $select_categories_id =mysqli_query($connection,$query);

    //    while($row = mysqli_fetch_assoc($select_categories_id)) {
    //        $cat_id=$row['cat_id'];
    //        $cat_title= $row['cat_title'];

    //        echo "<td>$cat_title</td>";
    //    }
      
       echo "<td>$user_lastname</td>";
       echo "<td>$user_email</td>";
       echo "<td>$user_role</td>";

    
       echo "<td><a href ='users.php?promote_to_admin=$user_id'>Promote To Admin</a></td>";
       echo "<td><a href ='users.php?demote_to_subscriber=$user_id'>Demote To Subscriber</a></td>";
       echo "<td><a href ='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
       echo "<td><a href ='users.php?delete=$user_id'>Delete</a></td>";
       echo "</tr>";
}
 
?>

        </tbody>
    </table>

    <?php 
    

    
    if(isset($_GET['promote_to_admin'])){

    $the_user_id=$_GET['promote_to_admin'];
    $query ="UPDATE users SET user_role='admin' WHERE user_id =$the_user_id ";
    $promote_user_query=mysqli_query($connection,$query);
    header("Location: users.php"); 
    }


    if(isset($_GET['demote_to_subscriber'])){

    $the_user_id=$_GET['demote_to_subscriber'];
    $query ="UPDATE users SET user_role='subscriber' WHERE user_id =$the_user_id ";
    $demote_user_query=mysqli_query($connection,$query);
    header("Location: users.php"); 

    }



    if(isset($_GET['delete'])){

    $the_user_id=$_GET['delete'];
    $query ="DELETE FROM users WHERE user_id ={$the_user_id}";
    $delete_user_query=mysqli_query($connection,$query);
    header("Location: users.php"); 

    }
    
    
    
    
    ?>