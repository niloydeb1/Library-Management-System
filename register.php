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
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['fullName'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $contact = $_POST['contact'];

        $sql = $db->query('INSERT INTO users VALUES (?,?,?)', $username, $password, 'member');
        $sql->affectedRows();
        $sql = $db->query('INSERT INTO members VALUES (?,?,?,?,?)', $username, $name, $email, $age, $contact);
        $affects = $sql->affectedRows();

        if($affects > 0){
            $_SESSION['auth'] = true;
            $_SESSION['member'] = $username;
            header("Location: memberHome.php");
            exit();
        }
        else{
            $error =  "<div class='alert alert-success alert-dismissable'>
                <strong style='text-align: center'>Something is wrong. Try Again!</strong>
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
		<a href="index.php">Login</a>
	</div>
	<h2 class = "heading">Register</h2>
	<form method="post" action="register.php">
		<div class="container">   
			<label>Username : </label>   
			<input type="text" placeholder="Enter Username" name="username" required>  
			<label>Password : </label>   
			<input type="password" placeholder="Enter Password" name="password" required>
            <label>Full Name : </label>   
			<input type="text" placeholder="Enter Full Name" name="fullName" required> 
            <label>Email : </label>   
			<input type="text" placeholder="Enter Email" name="email" required> 
            <label>Age : </label>   
			<input type="number" placeholder="Enter Age" name="age" required> 
            <label>Contact No : </label>   
			<input type="text" placeholder="Enter Contact No" name="contact" required>
            <button type="submit" name="submit">Register</button>
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