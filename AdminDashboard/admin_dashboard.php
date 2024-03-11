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
				<a class="navbar-brand" href="admin_dashboard.php">SBUN</a> 
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
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd"> 
		<div class="container-fluid"> 
			
			<ul class="nav navbar-nav navbar-center"> 
			<li class="nav-item"> 
				<a class="nav-link" href="admin_dashboard.php">Dashboard</a> 
			</li> 
			<li class="nav-item dropdown"> 
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Books </a> 
				<div class="dropdown-menu"> 
					<a class="dropdown-item" href="BooksDashboard/add_book,php.php">Add New Book</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="BooksDashboard/manage_book,php">Manage Books</a> 
				</div> 
			</li> 
			<li class="nav-item dropdown"> 
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category </a> 
				<div class="dropdown-menu"> 
					<a class="dropdown-item" href="add_cat.php">Add New Category</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="manage_cat.php">Manage Category</a> 
				</div> 
			</li> 
			<li class="nav-item dropdown"> 
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Authors</a> 
				<div class="dropdown-menu"> 
					<a class="dropdown-item" href="add_author.php">Add New Author</a> 
					<div class="dropdown-divider"></div> 
					<a class="dropdown-item" href="manage_author.php">Manage Author</a> 
				</div> 
			</li> 
			<li class="nav-item"> 
				<a class="nav-link" href="issue_book.php">Issue Book</a> 
			</li> 
			</ul> 
		</div> 
	</nav><br> 
	<div class="row"> 
		<div class="col-md-3" style="margin: 0px "> 
			<div class="card bg-light" style=" width: 300px "> 
				<div class="card-header">Registered User</div> 
				<div class="card-body"> 
					<p class="card-text">No. total Users: <?php echo get_user_count();?></p> 
					<a class="btn btn-danger" href="Regusers.php" target="_blank">View Registered Users</a> 
				</div> 
			</div> 
		</div> 
		<div class="col-md-3" style="margin: 0px"> 
			<div class="card bg-light" style="width: 300px"> 
				<div class="card-header">Total Book</div> 
				<div class="card-body"> 
					<p class="card-text">No of books available: <?php echo get_book_count();?></p> 
					<a class="btn btn-success" href="BooksDashboard/Regbooks.php" target="_blank">View All Books</a> 
				</div> 
			</div> 
		</div> 
		<div class="col-md-3" style="margin: 0px"> 
			<div class="card bg-light" style="width: 300px"> 
				<div class="card-header">Book Categories</div> 
				<div class="card-body"> 
					<p class="card-text">No of Book's Categories: <?php echo get_category_count();?></p> 
					<a class="btn btn-warning" href="CategoryDashboard/Regcat.php" target="_blank">View Categories</a> 
				</div> 
			</div> 
		</div> 
		<div class="col-md-3" style="margin: 0px"> 
			<div class="card bg-light" style="width: 300px"> 
				<div class="card-header">No. of Authors</div> 
				<div class="card-body"> 
					<p class="card-text">No of Authors: <?php echo get_author_count();?></p> 
					<a class="btn btn-primary" href="Regauthor.php" target="_blank">View Authors</a> 
				</div> 
			</div> 
		</div> 
	</div><br><br> 
	<div class="row"> 
		<div class="col-md-3" style="margin: 0px"> 
			<div class="card bg-light" style="width: 300px"> 
				<div class="card-header">Book Issued</div> 
				<div class="card-body"> 
					<p class="card-text">No of book issued: <?php echo get_issue_book_count();?></p> 
					<a class="btn btn-success" href="view_issued_book.php" target="_blank">View Issued Books</a> 
				</div> 
			</div> 
		</div> 
		<div class="col-md-3"></div> 
		<div class="col-md-3"></div> 
	</div> 
</body> 
</html> 
