<?php 

if(isset($_GET['edit_user'])){

    $the_user_id = $_GET['edit_user'];


    $query="SELECT * FROM users WHERE user_id =$the_user_id";
    $select_users_query =mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_users_query)) {

        $user_id= $row['user_id'];
        $username= $row['username'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_role=$row['user_role'];
    
    }

}

if(isset($_POST['edit_user'])){

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




    $query = "UPDATE users SET ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="user_role = '{$user_role}', ";
    $query .="username = '{$username}', ";
    $query .="user_email = '{$user_email}', ";
    $query .="user_password = '{$hashed_password}' ";
    $query .="WHERE user_id = {$the_user_id} ";
     
    $update_users = mysqli_query($connection,$query);
    confirm($update_users);
    
}



  



?>



<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">First name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>

    <div class="form-group">
        <label for="post-status">Last name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>

    <div class="form-group">


        <select name="user_role" id="">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

        <?php 
        
            if($user_role =='admin'){

             echo  "<option value='subscriber'>subscriber</option>";


            }else{

            echo  "<option value='admin'>admin</option>";


            }
 

        
        ?>
         
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div> -->

    <div class="form-group">
        <label for="posts_tags">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
 
    <div class="form-group">
        <label for="email">Email</label>
         <input type="email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">   
    </div>

    <div class="form-group">
        <label for="passsword">Password</label>
         <input type="password" name="user_password" class="form-control" value="">   
    </div>



    <div class="form-group">  
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>
   
</form>