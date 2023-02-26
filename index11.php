<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        
        include('nav1.php');
        include('server.php');
        $event_id = $_GET['eventid'];
        $sql = "SELECT * FROM events WHERE id = '$event_id'";
        $query = mysqli_query($conn, $sql);
        date_default_timezone_set('Asia/Bangkok');
        $date = date('Y-m-d H:i:s');
        while($event = mysqli_fetch_array($query)){
            $event_id = $event['id'];
            $name = $event['name'];
            $detail = $event['detail'];
            $start = $event['start'];
            $end = $event['end']; ?>
            <h2>รายการ : <?php echo $name;?></h2>
            <h3>รายละเอียด : <?php echo $detail;?></h3>
            <p>เปิดระบบ <?php echo $start ?> น. ถึง <?php echo $end?> น.</p>
            <?php if ($date < $end){?>
                <p>สถานะ : <button class="open">Open</button></p>

        <?php  }else{ ?>
            <p>สถานะ : <button class="close">Close</button></p>
        <?php  } ?>
        <a href="index.php">ย้อนกลับ</a>
            <center><h1>รายชื่อผู้สมัคร</h1></center>
            <?php if ($date > $start && $date < $end){?>
               <center><a href="vote.php?eventId=<?php echo $event_id;?>"><button class="report">Vote</button></a></center>

        <?php  }else{ ?>
            <center><a href=""><button class="vote">Report</button></a></center>
        <?php  }
            $sql1 = "SELECT * FROM candidete WHERE event_id = '$event_id'";
            $query1 = mysqli_query($conn, $sql1);
            while( $candidete = mysqli_fetch_array($query1)){
                $number = $candidete['number'];
                $name = $candidete['fullname'];
                $intro = $candidete['intro'];
                $picture = $candidete['picture'];
        ?>
            <h3><?php echo $number;?></h3>
            <h3><?php echo $name;?></h3>
            <p><?php echo $intro;?></p>

       <?php } } ?>
            

</body>
</html>