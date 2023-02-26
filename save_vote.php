<?php 
    include('server.php');
    $event_id = $_POST['eventId'];
    $user_id = $_POST['userId'];
    $vote = $_POST['vote'];
    $error = $error+1;


    $sql1 = "SELECT * FROM election WHERE id_user = '$user_id' AND id_event = '$event_id'";
    $query1 = mysqli_query($conn, $sql1);
    $rowss = mysqli_num_rows($query1);
    if($rowss > 0){
        echo"<script>alert('คุณสามารถเลือกตั้งได้เพียงครั้งเดียว ถ้าหากคุณยังไม่ได้การเลือกผู้รายใด กรุณาติดต่อผู้ดูแลการเลือกตั้ง'); window.location = 'index.php'</script>";
        $errors = $errors+1;
    }else{

    

    $sql = "INSERT INTO election (id_user,id_event,id_candidete) VALUES ('$user_id','$event_id','$vote') ";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('location: index.php');
    }
    
}


    

?>