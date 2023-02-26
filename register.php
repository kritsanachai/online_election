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
        if(isset($_POST['pressed'])){
            $press = $_POST['pressed'];
            $username = $_POST['username'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
			$tel = $_POST['tel'];
            $errors = 0;

            if((empty($username)) OR (empty($password_1)) OR (empty($fullname)) OR (empty($email)) OR (empty($tel))){
                echo "<script>alert('กรอกข้อมูลไม่ครบถ้วน กรุณากรอกใหม่อีกครั้ง'); window.location = 'register.php'</script>";
                $errors = $errors+1;
            }

            if($password_1 != $password_2){
                echo "<script>alert('รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง'); window.location = 'register.php'</script>";
                $errors = $errors+1;
            }
            $newpass = md5($password_1);

            $sql = "SELECT * FROM user WHERE username = '$username' ";
            $query = mysqli_query($conn, $sql);
            $rowss = mysqli_num_rows($query);
            if($rowss>0){
                echo"<script>alert('Username นี้ถูกใช้ไปแล้วกรุณาเปลี่ยนชื่อหรือใช้ชื่ออื่น'); window.location = 'register.php'</script>";
                $errors = $errors+1;
            }

            if($errors==0){
                $sql = "INSERT INTO user (username, password, fullname, email, tel) VALUES ('$username' , '$newpass','$fullname', '$email', '$tel')";
                $query = mysqli_query($conn, $sql);
                if(!$query){
                    echo"<script>alert('ไม่สามารถเพิ่มข้อมูลได้'); window.location = 'register.php'</script>";
                }else{
                    header('Refresh:0; login.php');
                }
            }else{
                header('Refresh:1; register.php');
            }
        }
    ?>

	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="register.php" method = "post">
				<img src="img/avatar.svg">
				<h2 class="title">register</h2>
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
           		    	<input type="password" class="input" name = "password_1">
            	   </div>
            	</div>
                <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confrim Password</h5>
           		    	<input type="password" class="input" name = "password_2">
            	   </div>
            	</div>
                <div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Fullname - Lastname</h5>
           		    	<input type="text" class="input" name = "fullname">
            	   </div>
            	</div><div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>E-mail</h5>
           		    	<input type="email" class="input" name = "email">
            	   </div>
            	</div>
				<br>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-phone"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Tel</h5>
           		   		<input type="text" class="input" name = "tel">
           		   </div>
           		</div>
				
				
                
            	<a href="login.php">Login</a>
            	<input type="submit" class="btn" value="Register" name="pressed">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
