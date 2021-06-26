<?php
    session_start();
    if(!isset($_SESSION['auth']))
    {
        header("Location: index.php");
    }

    require 'includes/queryDB.php';
    $db = new db('localhost', 'root', 'root', 'library_database');
    $message = "";
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        $publisher = $_POST['publisher'];
        $category = $_POST['category'];
        $copies = $_POST['copies'];

        $sql = $db->query('INSERT INTO books VALUES (?,?,?,?,?,?)', $title, $author, $isbn, $publisher, $category, $copies);
        $affects = $sql->affectedRows();

        if($affects > 0){
            $message = "<div class='alert alert-success alert-dismissable'>
            <strong style='text-align: center'>Book Added Succesfully!</strong>
        </div>";
        }
        else{
            $message =  "<div class='alert alert-success alert-dismissable'>
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
<body style="background-image: url('img/img_2.jpg');">
    <?php
		include 'includes/adminNavbar.php';
	?>
	<h2 class = "heading">Manage Books</h2>
	<form method="post" action="manageBooks.php">
		<div class="container">   
			<label>Book Title : </label>   
			<input type="text" placeholder="Enter Book Title" name="title" required>  
			<label>Author : </label>   
			<input type="text" placeholder="Enter Author Name" name="author" required>
            <label>ISBN : </label>   
			<input type="text" placeholder="Enter ISBN Code" name="isbn" required> 
            <label>Publisher : </label>   
			<input type="text" placeholder="Enter Publisher" name="publisher" required> 
            <label>Category : </label>   
			<input type="text" placeholder="Enter Category" name="category" required> 
            <label>Copies : </label>   
			<input type="number" placeholder="Enter Number Of Copies" name="copies" required>
            <button type="submit" name="submit">Submit</button>
            <?php
                if($message != "")
                {
                    echo $message;
                }
            ?>
		</div>   
	</form>
</body>
</html>