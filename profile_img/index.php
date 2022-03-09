<?php 
    session_start();
    include_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Profile Image</title>
</head>
<body>
    <?php
        // list registered users
        $sql = "select * from users";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            // loop for user row
            while($row=mysqli_fetch_assoc($result)){
                //check if already upload a profile img
                $id = $row['id']; //id from user table
                $imgOwner = "select * from profileimg where userid = '$id'"; //id from profileimg
                $resultImg = mysqli_query($conn,$imgOwner);
                // loop for profileimg row
                while($rowImg = mysqli_fetch_assoc($resultImg)){
                    echo "<div class='user-container'>";
                        if($rowImg['status'] == 0){
                            echo "<img src='uploads/profile".$id.".jpg'>";
                        }else{
                            echo "<img src='uploads/profileDefault.jpg'>";
                        }
                        echo "<br> <p class='username'>".$row['username']."</p><br><br>";
                    echo "</div>";
                }
            }
        }else{
            // no user in db
            echo "No users Yet!";
        }

        // show when logged in
        if(isset($_SESSION['id'])){
            if($_SESSION['id']==1){
                echo "you are logged in as admin";
            }
            echo '<form action="upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="proPic">
                        <button type="submit" name="submit">Upload</button>
                </form>';
        }else{
            // not logged in
            echo'<form action="signup.php" method="post">
                <input type="text" name="first" placeholder="First Name">
                <input type="text" name="last" placeholder="Last Name">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pass" placeholder="Password">
                <button type="submit" name="submitSignup">Signup</button>
            </form>';
        } 
    ?>

    <p>Login as user</p>
    <form action="login.php" method="post">
        <button type="submit" name="submitLogin">Login</button>
    </form>

    <p>Logout as user</p>
    <form action="logout.php" method="post">
        <button type="submit" name="submitLogout">Logout</button>
    </form>
</body>
</html>