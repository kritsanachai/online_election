<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="assets/css/from.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="admin/font.css">
</head>
<body>
	<?php 
        include('server.php');
        session_start();
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $newpass = md5($password);
			$errors = 0;

            if((empty($username)) OR (empty($password))){
                echo "<script>alert('กรุณากรอกข้อมูลกรอกข้อมูลให้ครบถ้วน'); window.location = 'login.php'</script>";
                $errors = $errors+1;
            }

            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$newpass'";
            $query = mysqli_query($conn, $sql);
            if($log = mysqli_fetch_array($query)){
                $user = $log['id'];
                $_SESSION['user'] = $user;
                $access = $log['access'];
                if($access == "User"){
                    header('location: index.php');
                }else{
                    header('location: admin/admin.php');
                }
            }else{
                echo"<script>alert('Username หรือ Password ไม่ถูกต้องกรุณาเช้าสู่ระบบอีกครั้ง'); window.location = 'login.php'</script>";
            }

        }
    ?>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="login.php" method = "post">
				<img src="img/avatar.svg">
				<h2 class="title">nvc online election</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name = "username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name = "password">
            	   </div>
            	</div>
				<a href="register.php">New Account</a>
            	<a href="forgot.php">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login" name="login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
