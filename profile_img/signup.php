<?php 
include_once "connection.php";
$first = $_POST['first'];
$last = $_POST['last'];
$username = $_POST['uid'];
$password = $_POST['pass'];

$sql = "insert into users (first,last,username,password) values ('$first','$last','$username','$password')";
mysqli_query($conn,$sql);

// now insert into profileimg table
// first get the id for this user
$sql = "select * from users where username = '$username' and first = '$first'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    //why while here?
    while($row = mysqli_fetch_assoc($result)){
        $userid = $row['id'];
        $sql = "insert into profileimg (userid,status) values ('$userid',1)";
        mysqli_query($conn,$sql);
        header("Location:index.php");
    }
}else{
    echo "Something went wrong";
}

?>