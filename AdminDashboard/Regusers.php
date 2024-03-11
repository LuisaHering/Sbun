<?php 
	session_start(); 
	#fetch data from database 
	$connection = mysqli_connect("localhost","root",""); 
	$db = mysqli_select_db($connection,"sbun"); 
	$name = ""; 
	$email = ""; 
	$password = ""; 
	$mobile = ""; 
	$address = ""; 
	$query = "select * from users"; 
?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>All Reg Users</title> 
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head> 
<body> 
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
		<div class="container-fluid"> 
			<div class="navbar-header"> 
				<a class="navbar-brand" href="admin_dashboard.php">SBUN</a> 
			</div> 
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font> 
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font> 
			<ul class="nav navbar-nav navbar-right"> 
			<li class="nav-item dropdown"> 
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a> 
				<div class="dropdown-menu"> 
					<a class="dropdown-item" href="#">View Profile</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="#">Edit Profile</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="change_password.php">Change Password</a> 
				</div> 
			</li> 
			<li class="nav-item"> 
				<a class="nav-link" href="../logout.php">Logout</a> 
			</li> 
			</ul> 
		</div> 
	</nav><br> 
	<span><marquee>Esse é o SBUN. A biblioteca está aberta das 8 até as 21.</marquee></span><br><br> 
		<center><h4>Registered Users Detail</h4><br></center> 
		<div class="row"> 
			<div class="col-md-2"></div> 
			<div class="col-md-8"> 
				<form> 
					<table class="table-bordered" width="900px" style="text-align: center"> 
						<tr> 
							<th>Name</th> 
							<th>Mobile</th> 
							<th>Email</th> 
							<th>Address</th> 
						</tr> 
				
					<?php 
						$query_run = mysqli_query($connection,$query); 
						while ($row = mysqli_fetch_assoc($query_run)){ 
							$name = $row['name']; 
							$email = $row['email']; 
							$mobile = $row['mobile']; 
							$address = $row['address']; 
					?> 
						<tr> 
							<td><?php echo $name;?></td> 
							<td><?php echo $email;?></td> 
							<td><?php echo $mobile;?></td> 
							<td><?php echo $address;?></td> 
						</tr> 
					<?php 
						} 
					?>	 
				</table> 
				</form> 
			</div> 
			<div class="col-md-2"></div> 
		</div> 
</body> 
</html> 
