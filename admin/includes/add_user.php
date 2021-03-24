<?php 
if(isset($_POST['create_user'])){

    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];
    
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query="SELECT randsalt FROM users ";
    $select_randsalt_query=mysqli_query($connection,$query);
    if(!$select_randsalt_query){
        die("QUERY FAILED" . mysqli_error($connection));

    }

    $row = mysqli_fetch_array($select_randsalt_query);
    $salt=$row['randsalt'];
    $hashed_password= crypt($user_password,$salt);



    $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$hashed_password}') ";
     
    $create_user_query =mysqli_query($connection,$query);

    confirm($create_user_query);

    echo "User Created:". " ". "<a href='users.php'>View Users</a>";


}



?>









<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">First name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post-status">Last name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
    
        <select name="user_role" id="">
    
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>

        </select>
    </div>

    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div> -->

    <div class="form-group">
        <label for="posts_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
 
    <div class="form-group">
        <label for="email">Email</label>
         <input type="email" name="user_email" class="form-control">   
    </div>

    <div class="form-group">
        <label for="passsword">password</label>
         <input type="password" name="user_password" class="form-control">   
    </div>



    <div class="form-group">  
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
   
</form>