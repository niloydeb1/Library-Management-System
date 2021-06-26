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
		include 'includes/memberNavbar.php';
	?>
	<h2 class = "heading">Welcome</h2>
	<form method="post" action="index.php">  
		<div class="container">   
			<ul type = "square" style="font-size: 25px; color: #dcf7f6;">
				<li>Instructions for member:
					<ol type = "A" style="font-size: 20px; padding: 5px 25px;">
						<li>Borrow Books:</br>View books and select to borrow. 
						Borrowed date will be recorded. Returning due date is one month after the borrowing date.</li>
						<li>Check Fines:</br>Check borrowed books, dates and fines here.
						Fine will increase by one unit per day, after missing the due returning date.
						Return the books and pay the assigned fines physically, and an admin will remove the record.</li>
						<li>View Profile:</br>View your profile information (e.g., Username, Full Name, Email, Contact No etc.).</li>
					</ol>
				</li>
			</ul>
		</div>   
	</form>
</body>
</html>