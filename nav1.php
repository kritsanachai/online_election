<?php 
    session_start();
    include('server.php');
    include('function.php');
    check();
    $user_id = $_SESSION['user'];
    $sql = "SELECT fullname FROM user WHERE id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    while($user = mysqli_fetch_array($query)){
        $fullname = $user['fullname'];
    ?>
    <h1>สวัสดีคุณ : <?php echo $fullname?>&nbsp;<a href="logout.php">Logout</a></h1>
    <h1>รายการเปิดโหวต / เลือกตั้ง online</h1>
    <?php
    }
?>