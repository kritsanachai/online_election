<?php 
    include('../server.php');
    $event_id = $_GET['eventid'];
    $sql ="DELETE FROM events WHERE id = $event_id ";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('location: all-events.php');
    }else{
        echo"ไม่สมารถเพิ่มฐานข้อมูลได้".myslqi_error($conn);
    }
    mysqli_connect($conn);
?>

