<?php
    session_start();
    if(!isset($_SESSION['auth']))
    {
        header("Location: index.php");
    }
    require 'includes/queryDB.php';
    $db = new db('localhost', 'root', 'root', 'library_database');

    $borrower = $_SESSION['member'];
    $books = $db->query('SELECT * FROM borrow WHERE borrower = ?', $borrower);
    $books = $books->fetchAll();
    foreach ($books as $book) 
    {
        $title = $book['book'];
        $return_date = strtotime($book['return_date']);
        $current_date = strtotime(date('Y-m-d'));
        $dayDiff = $current_date - $return_date;
        $dayDiff = round($dayDiff / (60 * 60 * 24));
        $fine = $dayDiff;
        if($fine > 0)
        {
            $sql = $db->query('UPDATE borrow SET fine = ? WHERE borrower = ? AND book = ?', $fine, $borrower, $title);
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
<body style="background-image: url('img/img_3.jpg');">
	<?php
		include 'includes/memberNavbar.php';
	?>
	<h2 class = "heading">Fine</h2>
	<div class="table_container">   
            <table id="member_table">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>ISBN</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Fine</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $books = $db->query('SELECT * FROM borrow WHERE borrower = ?', $borrower);
                        $books = $books->fetchAll();
                        foreach ($books as $book) 
                        {
                    ?> 
                    <tr> 
                        <td><?php echo $book['book']; ?></td>
                        <td><?php echo $book['isbn']; ?></td>
                        <td><?php echo $book['borrow_date']; ?></td>
                        <td><?php echo $book['return_date']; ?></td>
                        <td><?php echo $book['fine']; ?></td>
                    </tr> 
                    <?php } ?>
                </tbody>
            </table>
		</div> 
</body>
</html>