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
	$eventId = $_GET['eventid'];
	$x = $_GET['num'];
	$esql = "SELECT * FROM events WHERE id = $eventId";
        $equery = mysqli_query($conn, $esql);
        while($event = mysqli_fetch_array($equery)){
            $event_id = $event['id'];
            $event_name = $event['name'];
            $event_detail = $event['detail'];
            $event_start = $event['start'];
            $event_end = $event['end'];
            $event_picture = $event['picture'];
            
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
<h3 class="page-title mt-5">Edit User</h3>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<form action = "edit-eventssave.php" method = "post" enctype="multipart/form-data">
<div class="row formtype">
<div class="col-md-4">
<div class="form-group">
<label>No.</label><br>
<label><?php echo $x;?></label>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" name="name" value="<?php echo $event_name;?>">
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label>Detail</label>
<input type="text" class="form-control" name="detail" value="<?php echo $event_detail;?>">
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label>Start Time</label>
<input type="datetime-local" class="form-control" name="start" value="<?php echo $event_start;?>">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>End Time</label>
<input type="datetime-local" class="form-control" name="end" value="<?php echo $event_end;?>">
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
<img src=images/<?php echo $event_picture; ?> alt='<?php echo $event_picture ?>' width = "150px" height = "150px" />
</div>
</div>



<button class="btn btn-primary buttonedit">Save</button>
<input type="hidden" name="eventId" value="<?php echo $event_id;?>">
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