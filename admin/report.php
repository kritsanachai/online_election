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
	<?php include('../server.php');
	date_default_timezone_set('Asia/Bangkok');
	$date = date('Y-m-d H:i:s');
	$x = 0; ?>

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
						<div class="top-nav-search" style = "margin-top : 35px;">
								<form action = "all-events.php" method = "post">
                                    
									<input type="text" class="form-control" placeholder="Search here" name="search">
									<button class="btn" type="submit" name = "keyword"><i class="fas fa-search"></i></button>
								</form>
							</div>
							<div class="mt-5">
								<h4 class="card-title float-left mt-2"> รายการผลโหวต (Report Events)</h4>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>No.</th>
                                                <th>รูป</th>
												<th>ชื่อรายการ</th>
												<th>รายละเอียด</th>
												<th>เปิด</th>
												<th>ปิด</th>
                                                
												<th>สถานะ</th>
                                                <th class="text-center">รายงานผลโหวต</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											if(isset($_POST['keyword'])){
												$search = $_POST['search'];
												$sql = "SELECT * FROM events WHERE (name LIKE '%".$search."%')";
											}
											else{    
											$sql = "SELECT * FROM events";
							
											}
											
											$query = mysqli_query($conn, $sql);
												while($event = mysqli_fetch_array($query)){
													$event_id = $event['id'];
                                                    $event_picture = $event['picture'];
                                                    $event_name = $event['name'];
                                                    $event_detail = $event['detail'];
                                                    $event_start = $event['start'];
                                                    $event_end = $event['end'];
                                                    $event_status = $event['status'];
													$x++
											?>
											<tr>
												<td><?php echo $x;?></td>
                                                <td><img src=images/<?php echo $event_picture ?> alt='<?php echo $event_picture ?>' class="avatar-img rounded-circle" width = "80px" height = "80px"/></td>
												<td><?php echo $event_name;?></td>
												<td><?php echo $event_detail;?></td>
												<td><?php echo $event_start;?></td>
												<td><?php echo $event_end;?></td>
                                                <td>
                                                    </center>
													<?php 
                    									if($date > $event_end){
                        									echo  '<div class="actions"> <a href="#" class="btn btn-sm bg-danger-light mr-2">Close</a> </div>' ;
                    									 }else{
                        									echo  '<div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2">Open</a> </div>';
                    								}
                    								// echo $date;
                									?>
													<!-- <div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2"><?php echo $event_status;?></a> </div> -->
                                                    </center>
												</td>
                                                <td>
                                                    <center>
													<div class="actions"> <a href="report-event.php?event=<?php echo $event_id;?>"><span class="badge badge-pill bg-success inv-badge">รายงาน</span></a> </div>
                                                    </center>
												</td>
										
												
												<!-- <td class="text-right">
													<div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
														<div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-events.php?eventid=<?php echo $event_id;?>&num=<?php echo $x;?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> <a class="dropdown-item" href="del-events.php?eventid=<?php echo $event_id;?>"  onclick="return ConfirmDelete()"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> </div>
													</div>
												</td> -->
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