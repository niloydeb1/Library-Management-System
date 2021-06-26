<?php
    session_start();
    if(!isset($_SESSION['auth']))
    {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include 'includes/header.php';
	?>
</head>
<body style="background-image: url('img/img_1.jpg');">
	<?php
		include 'includes/adminNavbar.php';
	?>
	<h2 class = "heading">Welcome</h2>
	<form method="post" action="index.php">
		<div class="container">   
			<ul type = "square" style="font-size: 25px; color: #dcf7f6;">
				<li>Instructions for admin:
					<ol type = "A" style="font-size: 20px; padding: 5px 25px;">
						<li>Manage Books:</br>Add books by providing necessary details. 
						(e.g., book title, author name etc.)</li>
						<li>Member's List:</br>View list of members available in the system.</li>
						<li>Fine List:</br>View which book is borrowed by whom, borrowing date, returning due date
						and any available fine. After book is returned by the borrower and fine is collected, 
						the fine record can be deleted from here.</li>
					</ol>
				</li>
			</ul>
		</div>   
	</form>
</body>
</html>