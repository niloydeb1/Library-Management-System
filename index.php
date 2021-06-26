<?php
	session_start(); 
	if(isset($_SESSION['auth']))
	{
		if(isset($_SESSION['member']))
		{
			header("Location: memberHome.php");
		}
		elseif(isset($_SESSION['admin']))
		{
			header("Location: adminHome.php");
		}
		exit();
	}
	
	require 'includes/queryDB.php';
	$db = new db('localhost', 'root', 'root', 'library_database');
	$error = "";
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
        $password = $_POST['password'];
		
		$account = $db->query('SELECT * FROM users WHERE username = ? AND password = ?', $username, $password);
		$affects = $account->numRows();
		$account = $account->fetchArray();
        if($affects > 0){
			$_SESSION['auth'] = true;
			if($account['role'] === 'member')
			{
				$_SESSION['member'] = $username;
				header("Location: memberHome.php");
			}
			elseif($account['role'] === 'admin')
			{
				$_SESSION['admin'] = $username;
				header("Location: adminHome.php");
			}
            exit();
        }
        else{
			$error = "<div class='alert alert-success alert-dismissable'>
                <strong style='text-align: center;'>Wrong Username or Password. Try Again!</strong>
            </div>";
        }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include 'includes/header.php';
	?>
</head>
<body style="background-image: url('img/img_4.jpg');">
	<div class="topnav">
		<a class = "active" href="index.php">Library Management System</a>
		<a href="register.php">Register</a>
	</div>
	<h2 class = "heading">Login</h2>
	<form method="post" action="index.php">
		<div class="container">   
			<label>Username : </label>   
			<input type="text" placeholder="Enter Username" name="username" required>  
			<label>Password : </label>   
			<input type="password" placeholder="Enter Password" name="password" required autocomplete="off">  
			<button type="submit" name="submit">Login</button>
			<?php
				if($error != "")
				{
					echo $error;
				}
			?>
		</div>   
	</form>
</body>
</html>