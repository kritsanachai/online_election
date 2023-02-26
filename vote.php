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
	<link rel="stylesheet" href="assets/css/style.css"> 
	<link rel="stylesheet" href="admin/font.css">
</head>

<body>
	<?php 
		
		include('server.php');
		$event_id = $_GET['eventId'];
		date_default_timezone_set('Asia/Bangkok');
        $date = date('Y-m-d H:i:s');
		$x = 0;
	?>
	<div class="main-wrapper">
		<div class="header">
			<?php 
				include('nav.php');
				$user_id = $_SESSION['user'];
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
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h3 class="card-title float-left mt-2">โหวต/เลือกตั้ง Online</h3>
								<a href="index_vote.php?eventid=<?php echo $event_id;?>" class="btn btn-primary float-right veiwbutton">ย้อนกลับ</a>
							</div>
							
						</div>
						
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
								<?php 
									$sql1 = "SELECT * FROM candidete WHERE event_id = '$event_id'";
									$query1 = mysqli_query($conn, $sql1); ?>	
								<form action="save_vote.php" method="post">
									<table class="datatable table table-stripped table table-hover table-center mb-0">
									
										<thead>
											<tr>
												<th>IMG</th>
												<th>ชื่อ - นามสกุล</th>
												<th>เบอร์ผู้สมัคร</th>
												<th>คติพจ</th>
												<th>เลือก</th>
											</tr>
										</thead>
										<?php while( $candidete = mysqli_fetch_array($query1)){
											$number = $candidete['number'];
											$name = $candidete['fullname'];
											$intro = $candidete['intro'];
											$picture = $candidete['picture']; ?>
										<tr>
                    						<td>
												<img src="admin/candidete/<?php echo $picture;?>" alt=""  class="avatar-img rounded-circle" width = "100px" height = "100px">
												
											</td>
                    						<td><?php echo $name;?></td>
                    						
                						
                    						<td><?php echo $number;?></td>
                						
                    						<td><?php echo $intro;?></td>
											<td><input type="radio" name="vote" value="<?php echo $number;?>"></td>
                						</tr>

											<?php } ?>
											<input type="hidden" name ="eventId" value="<?php echo $event_id;?>">
        									<input type="hidden" name = "userId" value="<?php echo $user_id;?>">
											
									</table>
									<!-- <a href="" class="btn btn-sm bg-info-light mr-2">รายงาน</a> -->
									<br>
									<center><button class="btn btn-sm bg-info-light mr-2">โหวต</button></center>
								</div>
								</from>
							</div>
						</div>
					</div>
				</div>

				<!-- <div class="row mt-3">
					<div class="col-md-12">
						<div class="blog-view">
							
							
							
										
							
							<div class="widget author-widget clearfix">
								<h3>แนะนำข้อมูลผู้สมัครโหวต/เลือกตั้ง</h3>
								
							</div>
							
						</div>
					</div>
					
				</div> -->
				
				
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