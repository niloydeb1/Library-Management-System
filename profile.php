<?php
    session_start();
    if(!isset($_SESSION['auth']))
    {
        header("Location: index.php");
    }
    require 'includes/queryDB.php';
	$db = new db('localhost', 'root', 'root', 'library_database');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include 'includes/header.php';
	?>
</head>
<body style="background-image: url('img/img_2.jpg');">
    <?php
		include 'includes/memberNavbar.php';
	?>
	<h2 class = "heading">Profile</h2>
	<form method="post" action="index.php">
		<div class="container">   
            <table class = "profile_table">
                <?php 
                    $account = $db->query('SELECT * FROM members WHERE username = ?', $_SESSION['member']);
                    $account = $account->fetchArray();
                ?>
                                    
                    <tbody> 
                    <tr> 
                    
                        <td>Username : </td>
                        <td><?php echo $account['username']; ?></td>
                        
                    </tr> 
                    <tr> 
                        
                        <td>Full Name : </td>
                        <td><?php echo $account['name']; ?></td>
                    </tr> 
                    <tr> 
                        
                        <td>Email : </td>
                        <td><?php echo $account['email']; ?></td>
                    </tr>
                    <tr>
                        <tr> 
                    
                        <td>Age : </td>
                        <td><?php echo $account['age']; ?></td>
                    </tr>
                    
                    
                    <tr>
                        
                        <td>Contact No : </td>
                        <td><?php echo $account['contact']; ?></td>
                    </tr> 
                    </tbody>
            </table>
		</div>   
	</form>
</body>
</html>