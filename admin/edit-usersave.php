<?php 
    include('../server.php');
    $user_id = $_POST['userid'];
    $user_name = $_POST['username'];
    $user_fullname = $_POST['fullname'];
    $user_email = $_POST['email'];
    $user_tel = $_POST['tel'];
    $user_access = $_POST['access'];

    $sql = "UPDATE user SET username ='$user_name', fullname = '$user_fullname', email = '$user_email', tel = '$user_tel', access = '$user_access' WHERE id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('location: all-user.php');
    }else{
        echo "ไม่สามารถเปลี่ยนแปลงข้อมูลได้".mysqli_error($conn);
    }
?>