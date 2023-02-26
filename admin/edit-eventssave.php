<?php 
    include('../server.php');
    $eventId = $_POST['eventId'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $file = $_FILES['file'];



    if($file['error'] == 0){
        $rename = time();
        $typeitem = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $dirpicturePC = "images/$rename.$typeitem"; 
        $dirpictodb = "$rename.$typeitem";
        move_uploaded_file($file['tmp_name'],$dirpicturePC);
        $sql = "UPDATE events SET name ='$name', detail = '$detail', start = '$start', end = '$end' , picture = '$dirpictodb'  WHERE id = '$eventId'";
        $query = mysqli_query($conn, $sql);
        if($query){
            header('location: all-events.php');
        }
    }else{
        $sql = "UPDATE events SET name ='$name', detail = '$detail', start = '$start', end = '$end' WHERE id = '$eventId'";
        $query = mysqli_query($conn, $sql);
        if($query){
            header('location: all-events.php');
        }
    }

?>