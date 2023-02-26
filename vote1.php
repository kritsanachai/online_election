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


        include('nav.php');
        $user_id = $_SESSION['user'];
        include('server.php');
        $event_id = $_GET['eventId'];
        // $user_id = $_GET['userId'];
        $sql1 = "SELECT * FROM candidete WHERE event_id = '$event_id'";
        $query1 = mysqli_query($conn, $sql1);
        ?>
        <form action="save_vote.php" method="post">
            <table border="1" width="600">
        <?php
        while( $candidete = mysqli_fetch_array($query1)){
            $number = $candidete['number'];
            $name = $candidete['fullname'];
            $intro = $candidete['intro'];
            $picture = $candidete['picture']; ?>
        
                <tr>
                    <td rowspan="3"><img src="admin/candidete/<?php echo $picture;?>" alt="" class = "img"></td>
                    <td><?php echo $name;?></td>
                    <td rowspan="3"><input type="radio" name="vote" value="<?php echo $number;?>"></td>
                </tr>
                <tr>
                    <td><?php echo $number;?></td>
                </tr>
                <tr>
                    <td><?php echo $intro;?></td>
                </tr>

            
        <?php } ?>
        <input type="hidden" name ="eventId" value="<?php echo $event_id;?>">
        <input type="hidden" name = "userId" value="<?php echo $user_id;?>">
        
            </table>
            <button>โหวต</button>
        </form>
    
    
</body>
</html>