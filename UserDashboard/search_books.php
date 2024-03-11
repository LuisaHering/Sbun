<?php
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "sbun");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = mysqli_real_escape_string($connection, $_GET['search']);
$query = "SELECT books.*, authors.author_name, category.cat_name FROM books
          INNER JOIN authors ON books.author_id = authors.author_id
          INNER JOIN category ON books.cat_id = category.cat_id
          WHERE books.book_name LIKE '%$search%' OR authors.author_name LIKE '%$search%'";


$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <style>
        body {
            background: #B5C39F;
    background-image: url("https://i.postimg.cc/6q46q7MH/Sbun-Girl-amp-BG-2.jpg");
	background-size: cover; /* Add this line */
    background-repeat: no-repeat; /* Ensures the image doesn't repeat */
    background-attachment: fixed; /* Optional: Makes the background image fixed during scroll */
    background-position: right bottom; /* Aligns the image to the bottom right */} }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="user_dashboard.php">SBUN</a>
            </div>
            <span style="color: white"><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span>
            <span style="color: white"><strong>Email: <?php echo $_SESSION['email'];?></strong></span>
            <form action="search_books.php" method="get" class="form-inline">
                <input type="text" name="search" placeholder="Search for books..." required class="form-control mr-sm-2">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_profile.php">View Profile</a>
                        <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Search Results</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $issuedCheckQuery = "SELECT * FROM issued_books WHERE book_no = ? AND student_id = ? AND status = 1";
                $stmt = mysqli_prepare($connection, $issuedCheckQuery);
                mysqli_stmt_bind_param($stmt, 'ii', $row['book_no'], $_SESSION['id']);
                mysqli_stmt_execute($stmt);
                $issuedResult = mysqli_stmt_get_result($stmt);
                $isAlreadyBorrowed = mysqli_num_rows($issuedResult) > 0;
                ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['book_name']); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Author: <?php echo htmlspecialchars($row['author_name']); ?></h6>
                        <p class="card-text">Category: <?php echo htmlspecialchars($row['cat_name']); ?></p>
                        <?php if (!$isAlreadyBorrowed): ?>
                            <a href='borrow_book.php?book_id=<?php echo $row['book_id']; ?>' class="btn btn-primary">Borrow</a>
                        <?php else: ?>
                            <span class="badge badge-warning">You have this book borrowed already.</span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No books found.</p>";
        }
        mysqli_close($connection);
        ?>
    </div>
</body>

</html>