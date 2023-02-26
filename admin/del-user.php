<?php 
    include('../server.php');
    $user_id = $_GET['userid'];
    $sql ="DELETE FROM user WHERE id = $user_id ";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('location: all-user.php');
    }else{
        echo"ไม่สมารถเพิ่มฐานข้อมูลได้".myslqi_error($conn);
    }
    mysqli_connect($conn);
?>

