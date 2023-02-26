<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Admin</title>
	<link rel="shortcut icon" type="../image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
	<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="../assets/css/style.css"> 
	<link rel="stylesheet" href="font.css">
</head>
<body>
				

	<div class="main-wrapper">
		<div class="header">
			<?php include('nav.php');
			$x = 0;?>
		</div>
		<div class="sidebar" id="sidebar">
			<?php include('sidebar.php');?>
		</div>

		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					
					<div class="row align-items-center">
						<div class="col">
						
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">รายการ (Events)</h4>
								<a href="add-events.php" class="btn btn-primary float-right veiwbutton">เพิ่มรายการ</a>
							</div>
							
						</div>
						
					</div>
					
				</div>
			

				<div class="row mt-3">
					<div class="col-md-12">
						<div class="blog-view">
							<article class="blog blog-single-post">
								<h3 class="blog-title">ข้อมูลรายการที่ต้องการเพิ่มผู้สมัคร</h3>
								
								<?php 
									$eventId = $_GET['event'];
									$sql = "SELECT * FROM events WHERE  id = $eventId";
									$query = mysqli_query($conn, $sql);
									
								?>
								<div class="blog-content mt-4">
									<?php 
									while($event = mysqli_fetch_array($query)){
										$name = $event['name'];
										$detail = $event['detail'];
										$start = $event['start'];
										$end = $event['end']; ?>
									
									<h5><label>ชื่อ Event : </label><?php echo $name;?></h5>
									<h5><label>รายละเอียดข้อมูล : </label><?php echo $detail;?></h5>
									<h5><label>เปิด : </label><?php echo $start;?></h5>
									<h5><label>ปิด : </label><?php echo $end;?></h5>
									<?php } ?>
								</div>
							</article>
							
						</div>
					</div>
					
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
							<div class="mt-12">
								<a href="add-candidete.php?eventId=<?php echo $eventId;?>" class="btn btn-primary float-right veiwbutton">เพิ่มผู้สมัคร</a>
							</div>
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>No.</th>
                                                <th>รูป</th>
												<th>หมายเลขผู้สมัคร</th>
												<th>ชื่อ - นามสกุล</th>
												<th>คติพจ</th>
												<th class="text-right">ตัวจัดการ</th>
											</tr>
										</thead>
										<tbody>
										<?php 
                        					$sqlcan = "SELECT * FROM candidete WHERE event_id = '$eventId'";
                        					$querycan = mysqli_query($conn, $sqlcan);
                        					while($candidete = mysqli_fetch_array($querycan)){ 
												$can_id = $candidete['id'];
                            					$number = $candidete['number'];
                            					$img = $candidete['picture'];
                            					$name = $candidete['fullname'];
												$intro = $candidete['intro'];
												$x++;
                            
                        				?>
											<tr>
												<td><?php echo $x;?></td>
                                                <td><img src=candidete/<?php echo $img; ?> alt='<?php echo $img; ?>' class="avatar-img rounded-circle" width = "80px" height = "80px"/></td>
												<td><?php echo $number;?></td>
												<td><?php echo $name;?></td>
												<td><?php echo $intro;?></td>
												<td class="text-right">
													<div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
														<div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-candidete.php?canId=<?php echo $can_id;?>&num=<?php echo $x;?>&eventId=<?php echo $eventId;?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> <a class="dropdown-item" href="del-candidete.php?canId=<?php echo $can_id;?>&eventId=<?php echo $eventId;?>"  onclick="return ConfirmDelete()"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> </div>
													</div>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- <div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<?php 
					$userId = $_GET['userId'];
					$usersql = "SELECT * FROM user WHERE id = '$userId'";
					$userquery = mysqli_query($conn, $usersql);
					while($usern = mysqli_fetch_array($userquery)){
						$fullname = $usern['fullname'];
				?>
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> 
							<h3 class="delete_class">คุณต้องการลบคนนี้ใช่หรือไม่?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div> -->
		</div>
	</div>
	<script>
        function ConfirmDelete(){
            var con = confirm("คุณต้องการลบรายการนี้ใช่หรือไม่?");
            if (con == true){
                return true;
            }else{
                return false;
            }
        }

    </script>
	<script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="../assets/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables/datatables.min.js"></script>
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/raphael/raphael.min.js"></script>
	<script src="../assets/js/script.js"></script>
</body>
</html>