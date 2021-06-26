<?php
    session_start();
    if(!isset($_SESSION['auth']))
    {
        header("Location: index.php");
    }
    require 'includes/queryDB.php';
    $db = new db('localhost', 'root', 'root', 'library_database');
    $borrower = $_GET['borrower'];
    $book = $_GET['book'];
    $borrow_date = $_GET['borrow_date'];
    $fine = $_GET['fine'];

    $sql = $db->query('DELETE FROM borrow WHERE borrower = ? AND book = ? AND borrow_date = ? AND fine = ?', $borrower, $book, $borrow_date, $fine);
    $affects = $sql->affectedRows();

    if($affects == 0)
    {
        echo 'Something is wrong. Try Again!';
    }
    header("Location: fineList.php");
    exit();
?>