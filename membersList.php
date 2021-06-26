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
<body style="background-image: url('img/img_3.jpg');">
    <?php
		include 'includes/adminNavbar.php';
	?>
	<h2 class = "heading">List Of Members</h2>
	<form method="post" action="index.php">
		<div class="table_container">   
            <table id="member_table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Contact No</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $accounts = $db->query('SELECT * FROM members');
                        $accounts = $accounts->fetchAll();
                        foreach ($accounts as $account) 
                        {
                    ?> 
                    <tr> 
                        <td><?php echo $account['username']; ?></td>
                        <td><?php echo $account['name']; ?></td>
                        <td><?php echo $account['email']; ?></td>
                        <td><?php echo $account['age']; ?></td>
                        <td><?php echo $account['contact']; ?></td>
                    </tr> 
                    <?php } ?>
                </tbody>
            </table>
		</div>   
	</form>
</body>
</html>