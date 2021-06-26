<?php
    session_start();
    if(!isset($_SESSION['auth']))
    {
        header("Location: index.php");
    }
    require 'includes/queryDB.php';
    $db = new db('localhost', 'root', 'root', 'library_database');
    $title = $_GET['title'];
    $borrower = $_SESSION['member'];
    
    $sql = $db->query('SELECT title, isbn, copies FROM books WHERE title = ?', $title);
    $affects = $sql->numRows();
    $sql = $sql->fetchArray();
    $isbn = $sql['isbn'];
    $copies = $sql['copies'];

    if($affects > 0){
        date_default_timezone_set('Australia/Brisbane');
        $borrow_date = date('Y-m-d');
        $return_date = date('Y-m-d', strtotime('+1 month'));
        $fine = 0;

        $sql = $db->query('INSERT INTO borrow VALUES (?,?,?,?,?,?)', $borrower, $title, $isbn, $borrow_date, $return_date, $fine);
        $affects = $sql->affectedRows();

        if($affects == 0)
        {
            echo 'Something is wrong. Try Again!';
        }

        if($copies == 1)
        {
            $sql = $db->query('DELETE FROM books WHERE title = ?', $title);
            $affects = $sql->affectedRows();

            if($affects == 0)
            {
                echo 'Something is wrong. Try Again!';
            }
        }
        elseif($copies >= 1)
        {
            $copies = $copies - 1;
            $sql = $db->query('UPDATE books SET copies = ? WHERE title = ?', $copies, $title);
            $affects = $sql->affectedRows();

            if($affects == 0)
            {
                echo 'Something is wrong. Try Again!';
            }
        }
        header("Location: fine.php");
        exit();
    }
    else{
        echo 'Something is wrong. Try Again!';
    }
?>