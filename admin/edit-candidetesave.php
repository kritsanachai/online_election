<?php 
    include('../server.php');
    $canId = $_POST['canId'];
    $eventId = $_POST['eventId'];
    $number = $_POST['number'];
    $name = $_POST['fullname'];
    $intro = $_POST['intro'];
    $file = $_FILES['file'];



    if($file['error'] == 0){
        $rename = time();
        $typeitem = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $dirpicturePC = "candidete/$rename.$typeitem"; 
        $dirpictodb = "$rename.$typeitem";
        move_uploaded_file($file['tmp_name'],$dirpicturePC);
        $sql = "UPDATE candidete SET number = '$number', fullname = '$name', intro = '$intro', picture = '$dirpictodb'  WHERE id = '$canId'";
        $query = mysqli_query($conn, $sql);
        if($query){
            header("location: candidete.php?event=$eventId");
        }
    }else{
        $sql = "UPDATE candidete SET number = '$number', fullname = '$name', intro = '$intro' WHERE id = '$canId'";
        $query = mysqli_query($conn, $sql);
        if($query){
            header("location: candidete.php?event=$eventId");
        }
    }

?>