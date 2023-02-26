<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>NVC Election</title>
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="assets/css/style.css"> </head>
	<link rel="stylesheet" href="admin/font.css">

<body>
	<?php 
		include('server.php');
		date_default_timezone_set('Asia/Bangkok');
        $date = date('Y-m-d H:i:s');
		$x = 0;
	?>
	<div class="main-wrapper">
		<div class="header">
			<?php 
				include('nav.php');
			?>
		</div>
		<div class="sidebar" id="sidebar">
		<?php 
				include('sidebar.php');
			?>
		</div>
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<h3 class="page-title mt-3">รายการเปิดโหวต/เลือกตั้ง Online</h3>
							
						</div>
					</div>
				</div>
				
				<?php 
					$sql = "SELECT * FROM events";
					$query = mysqli_query($conn, $sql); ?>
					
				<div class="row">
					<?php while($event = mysqli_fetch_array($query)){
								$event_id = $event['id'];
								$event_name = $event['name'];
								$event_picture = $event['picture'];
								$start = $event['start'];
								$end = $event['end'];
						?>
					<div class="col-12 col-sm-8 col-md-6 col-lg-4">
						
						<div class="card"> <img class="card-img" src="admin/images/<?php echo $event_picture;?>" style = "background-repeat: no-repeat; background-size: auto;" width = "150px" height = "350px">
						<?php 
                        if(isset($_SESSION['user'])){ ?> 	
						<div class="card-body">
								<?php if($date > $end){ ?>
                        			<h4 class="card-title">โหวต / เลือกตั้ง : <button class="btn btn-sm bg-danger-light mr-2">Close</button></h2>
                    			<?php }else{ ?>
                        			<h4 class="card-title">โหวต / เลือกตั้ง : <button class="btn btn-sm bg-success-light mr-2">Open</button></h2>
                        		<?php } ?>
								<h4 class="card-title"><?php echo $event_name;?></h4> 
								<br>
								
								<a href="index_vote.php?eventid=<?php echo $event_id;?>" class="btn btn-info">โหวต</a> </div><?php }else { ?> 
										
						<div class="card-body">
								<?php if($date > $end){ ?>
                        			<h4 class="card-title">โหวต / เลือกตั้ง : <button class="btn btn-sm bg-danger-light mr-2">Close</button></h2>
                    			<?php }else{ ?>
                        			<h4 class="card-title">โหวต / เลือกตั้ง : <button class="btn btn-sm bg-success-light mr-2">Open</button></h2>
                        		<?php } ?>
								<h4 class="card-title"><?php echo $event_name;?></h4> 
								<br>
								
								<a href="login.php" class="btn btn-info">โหวต</a> </div> <?php } ?>
						</div>
						
					</div>
					<?php } ?>
				</div>

				
			</div>
		</div>
	</div>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/js/chart.morris.js"></script>
	<script src="assets/js/script.js"></script>
</body>

</html>