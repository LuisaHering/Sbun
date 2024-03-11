<?php 
	session_start(); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>SBUN</title> 
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head> 
<style type="text/css"> 
	#main_content{ 
		background: rgba(245, 245, 245, 0.9); 
		padding: 50px; 
	} 
	#side_bar{ 
		background: rgba(245, 245, 245, 0.9); 
		padding: 50px; 
	} 
	.bg-dark {
    background-color:#386b7c !important;
	}	
	body{ 
	background: #B5C39F;
    background-image: url("https://i.postimg.cc/6q46q7MH/Sbun-Girl-amp-BG-2.jpg");
	background-size: cover; /* Add this line */
    background-repeat: no-repeat; /* Ensures the image doesn't repeat */
    background-attachment: fixed; /* Optional: Makes the background image fixed during scroll */
    background-position: right bottom; /* Aligns the image to the bottom right */} 
</style> 
<body> 
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
		<div class="container-fluid"> 
			<div class="navbar-header"> 
				<a class="navbar-brand" href="index.php">SBUN</a> 
			</div> 
			<ul class="nav navbar-nav navbar-right"> 
				<li class="nav-item"> 
				<a class="nav-link" href="index.php">User Login</a> 
				</li> 
			<li class="nav-item"> 
				<a class="nav-link" href="admin_login.php">Admin Login</a> 
			</li> 
			<li class="nav-item"> 
				<a class="nav-link" href="signup.php"></span>Signup</a> 
			</li> 
			</ul> 
		</div> 
	</nav> 
	<div class="row"> 
		<div class="col-md-4" id="side_bar"> 
			<h5>Citação do Dia</h5> 
			<h6>“Não há fatos eternos, como não há verdades absolutas.”</h6> 
			<p>~ Friedrich Nietzsche</p> 
			<h5>Horário da Biblioteca</h5> 
			<ul> 
				<li>Abertura: 9:00</li> 
				<li>Fechamento: 12:00</li> 
			</ul> 
			<h5>O que Oferecemos?</h5> 
			<ul> 
				<li>Salas com AC</li> 
				<li>Wi-fi Gratuito</li> 
				<li>Ambiente de Aprendizagem</li> 
				<li>Sala de Discussão</li> 
				<li>Energia Gratuita</li> 
			</ul>

		</div> 
		<div class="col-md-8" id="main_content"> 
			<center><h3>User Login Form</h3></center> 
			<form action="" method="post"> 
				<div class="form-group"> 
					<label for="email">Email ID:</label> 
					<input type="text" name="email" class="form-control" required> 
				</div> 
				<div class="form-group"> 
					<label for="password">Password:</label> 
					<input type="password" name="password" class="form-control" required> 
				</div> 
				<button type="submit" name="login" class="btn btn-primary">Login</button> | 
				<a href="signup.php"> Signup</a>	 
			</form> 
			<?php 
				if(isset($_POST['login'])){ 
					$connection = mysqli_connect("localhost","root",""); 
					$db = mysqli_select_db($connection,"sbun"); 
					$query = "select * from users where email = '$_POST[email]'"; 
					$query_run = mysqli_query($connection,$query); 
					while ($row = mysqli_fetch_assoc($query_run)) { 
						if($row['email'] == $_POST['email']){ 
							if($row['password'] == $_POST['password']){ 
								$_SESSION['name'] = $row['name']; 
								$_SESSION['email'] = $row['email']; 
								$_SESSION['id'] = $row['id']; 
								header("Location: UserDashboard/user_dashboard.php"); 
							} 
							else{ 
								?> 
								<br><br><center><span class="alert-danger">Wrong Password !!</span></center> 
								<?php 
							} 
						} 
					} 
				} 
			?> 
		</div> 
	</div> 
</body> 
</html> 
