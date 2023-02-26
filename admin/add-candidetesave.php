<?php 
    include('../server.php');
    $number = $_POST['number'];
    $name = $_POST['name'];
    $intro = $_POST['intro'];
    $file = $_FILES['file'];
    $eventId =$_POST['eventId'];
     
    if($file['error'] == 0){
        $rename = time();
        $type = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $imgPC = "candidete/$rename.$type";
        $db = "$rename.$type";
        move_uploaded_file($file['tmp_name'],$imgPC);
        $sql = "INSERT INTO candidete(number,fullname,intro,picture,event_id) VALUES ('$number', '$name', '$intro', '$db', '$eventId')";
        $query = mysqli_query($conn, $sql);
        if($query){
            header('location: all-events.php');
        }
    }
?>