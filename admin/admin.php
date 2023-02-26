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
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
	<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
	<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="../assets/css/style.css"> </head>
	<link rel="stylesheet" href="font.css">
<body>
	<?php 
		include('../server.php');
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
							<h3 class="page-title mt-3">NVC System Online Election!</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<?php 
										$ev_sql = "SELECT * FROM events";
										$ev_query = mysqli_query($conn, $ev_sql);
										$ev_num = mysqli_num_rows($ev_query);
									?>
									<div>
										<h3 class="card_widget_header"><?php echo $ev_num;?></h3>
										<h6 class="text-muted">รายการทั้งหมด (EVENTS)</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
									<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
									</path>
									<polyline points="14 2 14 8 20 8"></polyline>
									<line x1="12" y1="18" x2="12" y2="12"></line>
									<line x1="9" y1="15" x2="15" y2="15"></line>
									</svg></span> </div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<?php 
										$u_sql = "SELECT * FROM user";
										$u_query = mysqli_query($conn, $u_sql);
										$u_num = mysqli_num_rows($u_query);
									?>
									<div>
										<h3 class="card_widget_header"><?php echo $u_num;?></h3>
										<h6 class="text-muted">ผู้ใช้งาน (MEMBERS)</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
									<line x1="12" y1="1" x2="12" y2="23"></line>
									<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<?php 
										$vo_sql = "SELECT * FROM election";
										$vo_query = mysqli_query($conn, $vo_sql);
										$vo_num = mysqli_num_rows($vo_query);
									?>
									<div>
										<h3 class="card_widget_header"><?php echo $vo_num;?></h3>
										<h6 class="text-muted">โหวต (VOTES)</h6> </div>
										<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="2" y1="12" x2="22" y2="12"></line>
									<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
									</path>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
								<?php 
										$can_sql = "SELECT * FROM candidete";
										$can_query = mysqli_query($conn, $can_sql);
										$can_num = mysqli_num_rows($can_query);
									?>
									<div>
										<h3 class="card_widget_header"><?php echo $can_num;?></h3>
										<h6 class="text-muted">ผู้สมัคร (CANDIDATES)</h6> </div>
									
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
									<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
									<circle cx="8.5" cy="7" r="4"></circle>
									<line x1="20" y1="8" x2="20" y2="14"></line>
									<line x1="23" y1="11" x2="17" y2="11"></line>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-md-12 col-lg-6">
						<div class="card card-chart">
							<div class="card-header">
								<h4 class="card-title">VISITORS</h4> </div>
							<div class="card-body">
								<div id="line-chart"></div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-6">
						<div class="card card-chart">
							<div class="card-header">
								<h4 class="card-title">ROOMS BOOKED</h4> </div>
							<div class="card-body">
								<div id="donut-chart"></div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col-md-12 d-flex">
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h4 class="card-title float-left mt-2">รายงาน ll ผลโหวต</h4>
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center">
										<thead>
											<tr>
												<th>No</th>
												<th>ชื่อรายการ</th>
												<th>รายละเอียด</th>
												<th>เปิด</th>
												<th>ปิด</th>
												<th>สถานะ</th>
												<th class="text-center">Report</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$evenSql = "SELECT * FROM events";
												$eveQuery = mysqli_query($conn, $evenSql);
												while($event = mysqli_fetch_array($eveQuery)){
													$event_id = $event['id'];
													$even_name = $event['name'];
													$even_detail = $event['detail'];
													$even_start = $event['start'];
													$even_end = $event['end'];
													$even_status = $event['status'];
													$x++;
											?>
											<tr>
												<td class="text-nowrap">
													<div><?php echo $x;?></div>
												</td>
												<td class="text-nowrap"><?php echo $even_name;?></td>
												<td class="text-nowrap"><?php echo $even_detail;?></td>
												<td class="text-nowrap"><?php echo $even_start;?></td>
												<td class="text-nowrap"><?php echo $even_end;?></td>
												<td>
                                                    
													<?php 
                    									if($date > $even_end){
                        									echo  '<div class="actions"> <a href="#" class="btn btn-sm bg-danger-light mr-2">Close</a> </div>' ;
                    									 }else{
                        									echo  '<div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2">Open</a> </div>';
                    								}
                    								// echo $date;
                									?>
													<!-- <div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2"><?php echo $event_status;?></a> </div> -->
                                                    
												</td>
												
												<td class="text-center"> <a href="report-event.php?event=<?php echo $event_id;?>"><span class="badge badge-pill bg-success inv-badge">รายงาน</span></a></td>
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
		</div>
	</div>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="../assets/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/raphael/raphael.min.js"></script>
	<script src="../assets/plugins/morris/morris.min.js"></script>
	<script src="../assets/js/chart.morris.js"></script>
	<script src="../assets/js/script.js"></script>
</body>

</html>