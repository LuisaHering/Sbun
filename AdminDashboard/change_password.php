<?php 
	require("functions.php"); 
	session_start(); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>Dashboard</title> 
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
				<a class="navbar-brand" href="admin_dashboard.php">sbun </a> 
			</div> 
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font> 
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font> 
			<ul class="nav navbar-nav navbar-right"> 
			<li class="nav-item dropdown"> 
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a> 
				<div class="dropdown-menu"> 
					<a class="dropdown-item" href="view_profile.php">View Profile</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="edit_profile.php">Edit Profile</a> 
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
		<center><h4>Change Admin Password</h4><br></center> 
		<div class="row"> 
			<div class="col-md-4"></div> 
			<div class="col-md-4"> 
				<form action="update_password.php" method="post"> 
					<div class="form-group"> 
						<label for="password">Enter Password:</label> 
						<input type="password" class="form-control" name="old_password"> 
					</div> 
					<div class="form-group"> 
						<label for="New Password">Enter New Password:</label> 
						<input type="password" name="new_password" class="form-control"> 
					</div> 
					<button type="submit" name="update" class="btn btn-primary">Update Password</button> 
				</form> 
			</div> 
			<div class="col-md-4"></div> 
		</div> 
</body> 
</html> 
