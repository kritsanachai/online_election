<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Admin</title>



<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="../assets/css/feathericon.min.css">
<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
<link rel="stylesheet" type="../text/css" href="assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="font.css">

</head>
<body>
<?php 
	include('../server.php');
	$canId = $_GET['canId'];
    $eventId = $_GET['eventId'];
	$x = $_GET['num'];
	$sql = "SELECT * FROM candidete WHERE id = $canId";
        $query = mysqli_query($conn, $sql);
        while($candidete = mysqli_fetch_array($query)){
            $can_id = $candidete['id'];
            $number = $candidete['number'];
            $img = $candidete['picture'];
            $name = $candidete['fullname'];
			$intro = $candidete['intro'];
?>
<div class="main-wrapper">

<div class="header">
	<?php include('nav.php');?>
</div>
<div class="sidebar" id="sidebar">
	<?php include('sidebar.php');?>
</div>


<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title mt-5">แก้ไขผู้สมัคร (Edit Candite)</h3>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<form action = "edit-candidetesave.php" method = "post" enctype="multipart/form-data">
<div class="row formtype">
<div class="col-md-4">
<div class="form-group">
<label>No.</label><br>
<label><?php echo $x;?></label>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>หมายเลขผู้สมัคร</label>
<input type="text" class="form-control" name="number" value="<?php echo $number;?>">
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label>ชื่อ - สกุล</label>
<input type="text" class="form-control" name="fullname" value="<?php echo $name;?>">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>คติพจ</label>
<input type="text" class="form-control" name="intro" value="<?php echo $intro;?>">
</div>
</div>


<div class="col-md-4 ">
<div class="form-group">
<label>New Picture</label><br>
<input type="file" name="file" accept="images/*" class="form-control">
</div>
</div>

<div class="col-lg-12">
<div class="form-group">
<label>Picture</label><br>
<label>รูปปัจจุบัน :</label><br>
<img src=candidete/<?php echo $img; ?> alt='<?php echo $img; ?>' width = "150px" height = "150px" />
</div>
</div>



<button class="btn btn-primary buttonedit">Save</button>
<input type="hidden" name="canId" value="<?php echo $can_id;?>">
<input type="hidden" name="eventId" value="<?php echo $eventId;?>">
</form>
</div>
</div>

</div>
</div>

</div>
<?php } ?>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/select2.min.js"></script>

<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/raphael/raphael.min.js"></script>

<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="../assets/js/script.js"></script>
</body>
</html>