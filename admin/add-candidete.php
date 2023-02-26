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

<div class="main-wrapper">

<div class="header">
	<?php include('nav.php');
    $eventId = $_GET['eventId'];?>
</div>
<div class="sidebar" id="sidebar">
	<?php include('sidebar.php');?>
</div>


<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title mt-5">เพิ่มผู้สมัคร (Add Candidete)</h3>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<form action = "add-candidetesave.php" method = "post" enctype="multipart/form-data">
<div class="row formtype">

<div class="col-md-4">
<div class="form-group">
<label>หมายเลข :</label>
<input type="text" class="form-control" name="number" placeholder="หมายเลขผู้สมัคร">
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label>ชื่อ - สกุล :</label>
<input type="text" class="form-control" name="name" placeholder="ชื่อ-สกุล">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>intro/คติ :</label>
<input type="text" class="form-control" name="intro" placeholder="คติพจ">
</div>
</div>


<div class="col-md-4 ">
<div class="form-group">
<label>รูปภาพ (Picture)</label><br>
<input type="file" name="file" accept="images/*" class="form-control">
</div>
</div>








</div>
</div>
<button class="btn btn-primary buttonedit">เพิ่มผู้สมัคร</button>
</div>
</div>
<input type="hidden" name="eventId" value = "<?php echo $eventId?>">
</div>
</form>

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