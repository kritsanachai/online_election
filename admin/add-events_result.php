<?php 
    include('../server.php');
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $start_time = $_POST['start'];
    $end_time = $_POST['end'];
    $file = $_FILES['file'];

    

    
    if($file['error'] == 0){
        $rename = time();
        $typeitem = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $dirpicturePC = "images/$rename.$typeitem"; 
        $dirpictodb = "$rename.$typeitem";
        move_uploaded_file($file['tmp_name'],$dirpicturePC);
        $sql = "INSERT INTO events(name,detail,start,end,picture) VALUES ('$name','$detail','$start_time', '$end_time', '$dirpictodb') ";
        $query = mysqli_query($conn, $sql);
        if($query){
            header('location: all-events.php');
        }
    }

?>