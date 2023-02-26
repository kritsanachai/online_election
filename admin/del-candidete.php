<?php 
    include('../server.php');
    $can_id = $_GET['canId'];
    $event_id = $_GET['eventId'];
    $sql ="DELETE FROM candidete WHERE id = $can_id ";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("location: candidete.php?event=$event_id");
    }else{
        echo"ไม่สมารถเพิ่มฐานข้อมูลได้".myslqi_error($conn);
    }
    mysqli_connect($conn);
?>