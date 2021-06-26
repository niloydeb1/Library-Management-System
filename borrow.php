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
		include 'includes/memberNavbar.php';
	?>
	<h2 class = "heading">Borrow Books</h2>
	<div class="table_container">   
            <table id="member_table">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Publisher</th>
                        <th>Category</th>
                        <th>Copies</th>
                        <th>Borrow</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $books = $db->query('SELECT * FROM books');
                        $books = $books->fetchAll();
                        foreach ($books as $book) 
                        {
                    ?> 
                    <tr> 
                        <td><?php echo $book['title']; ?></td>
                        <td><?php echo $book['author']; ?></td>
                        <td><?php echo $book['isbn']; ?></td>
                        <td><?php echo $book['publisher']; ?></td>
                        <td><?php echo $book['category']; ?></td>
                        <td><?php echo $book['copies']; ?></td>
                        <td><a href="borrowQuery.php?title=<?php echo $book['title']; ?>">Borrow</a></td>
                    </tr> 
                    <?php } ?>
                </tbody>
            </table>
		</div> 
</body>
</html>