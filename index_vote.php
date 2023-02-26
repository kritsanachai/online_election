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
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
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
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h3 class="card-title float-left mt-2">รายการเปิดโหวต/เลือกตั้ง Online</h3>
								<a href="index.php" class="btn btn-primary float-right veiwbutton">ย้อนกลับ</a>
							</div>
							
						</div>
						
					</div>
					
				</div>
				
				<div class="row mt-3">
					<div class="col-md-12">
						<div class="blog-view">
							<article class="blog blog-single-post">
								<?php 
									$eventId = $_GET['eventid'];
									$sql = "SELECT * FROM events WHERE  id = $eventId";
									$query = mysqli_query($conn, $sql);
									while($event = mysqli_fetch_array($query)){
										$event_id = $event['id'];
										$name = $event['name'];
										$detail = $event['detail'];
										$start = $event['start'];
										$end = $event['end'];
									
								?>
								<h3 class="blog-title">โหวต : <?php echo $name;?></h3>
								<div class="blog-content mt-4">
									<h5><label>รายละเอียดข้อมูล : </label><?php echo $detail;?></h5>
									<h5><label>เปิด : </label><?php echo $start;?></h5>
									<h5><label>ปิด : </label><?php echo $end;?></h5>
                                    
                                    <?php 
                    					if($date > $end){
                        					echo  '<div class="actions"> <a href="#" class="btn btn-sm bg-danger-light mr-2">Close</a> </div>' ;
                    					}else{
                        					echo  '<div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2">Open</a> </div>';
                    					}
                    								// echo $date;
                									
									 } ?>
								</div>
							</article>
							
							<center><h3 class="page-title mt-3">รายชื่อผู้สมัคร</h3><br></center>
							
							<?php if ($date > $start && $date < $end){?>
               					<center><a href="vote.php?eventId=<?php echo $event_id;?>" class="btn btn-sm bg-success-light mr-2">โหวต</a></center>
							<?php  }else{ ?>
            					<center><a href="" class="btn btn-sm bg-info-light mr-2">รายงาน</a></center>
        					<?php  } ?>
							<br>
										
							
							<div class="widget author-widget clearfix">
								<h3>แนะนำข้อมูลผู้สมัครโหวต/เลือกตั้ง</h3>
								<?php 
									$sql1 = "SELECT * FROM candidete WHERE event_id = '$event_id'";
									$query1 = mysqli_query($conn, $sql1);
									while( $candidete = mysqli_fetch_array($query1)){
										$number = $candidete['number'];
										$name = $candidete['fullname'];
										$intro = $candidete['intro'];
										$picture = $candidete['picture'];
								?>

								<div class="about-author">
									<div class="about-author-img">
										<div class="author-img-wrap"> <img class="img-fluid " alt="" src="admin/candidete/<?php echo $picture;?>" > </div>
									</div>
									<div class="author-details"> <span class="blog-author-name">หมายเลข : <?php echo $number;?></span><br>
										<span>ชื่อ- สกุล : <?php echo $name;?></span><br>
										<span>คติพจ : <?php echo $intro;?></span>
									</div>
								</div>
								<br>
								<?php } ?>
							</div>
							
						</div>
					</div>
					
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