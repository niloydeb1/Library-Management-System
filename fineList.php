<?php
    session_start();
    if(!isset($_SESSION['auth']))
    {
        header("Location: index.php");
    }
    require 'includes/queryDB.php';
	$db = new db('localhost', 'root', 'root', 'library_database');

    $books = $db->query('SELECT * FROM borrow');
    $books = $books->fetchAll();
    foreach ($books as $book) 
    {
        $title = $book['book'];
        $borrower = $book['borrower'];
        $borrow_date = $book['borrow_date'];
        $return_date = strtotime($book['return_date']);
        $current_date = strtotime(date('Y-m-d'));
        $dayDiff = $current_date - $return_date;
        $dayDiff = round($dayDiff / (60 * 60 * 24));
        $fine = $dayDiff;
        if($fine > 0)
        {
            $sql = $db->query('UPDATE borrow SET fine = ? WHERE borrower = ? AND book = ? AND borrow_date = ?', $fine, $borrower, $title, $borrow_date);
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
		include 'includes/adminNavbar.php';
	?>
	<h2 class = "heading">List Of Fines</h2>
	<form method="post" action="fineList.php">
		<div class="table_container">   
            <table id="member_table">
                <thead>
                    <tr>
                        <th>Borrower</th>
                        <th>Book Title</th>
                        <th>ISBN</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Fine</th>
                        <th>Remove Fine</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $fines = $db->query('SELECT * FROM borrow');
                        $fines = $fines->fetchAll();
                        foreach ($fines as $fine) 
                        {
                    ?> 
                    <tr> 
                        <td><?php echo $fine['borrower']; ?></td>
                        <td><?php echo $fine['book']; ?></td>
                        <td><?php echo $fine['isbn']; ?></td>
                        <td><?php echo $fine['borrow_date']; ?></td>
                        <td><?php echo $fine['return_date']; ?></td>
                        <td><?php echo $fine['fine']; ?></td>
                        <td><a href="fineQuery.php?
                        borrower=<?php echo $fine['borrower']; ?>
                        &book=<?php echo $fine['book']; ?>
                        &borrow_date=<?php echo $fine['borrow_date']; ?>
                        &fine=<?php echo $fine['fine']; ?>">Remove</a></td>
                    </tr> 
                    <?php } ?>
                </tbody>
            </table>
		</div>   
	</form>
</body>
</html>