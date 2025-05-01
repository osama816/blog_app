<?php
if($_GET['action']== 'delete'&&isset($_POST['id'])) {
    $id = $_POST['id'];
 
    if (delete_blog( $id)) {
     setMessages("success", "delete blog successfully");
     header('Location:./index.php?page=blogs ');
     exit;
 } else {
     setMessages("danger", "delete blog fail ");
     header('Location:./index.php?page=blogs ');
     exit;
 }
}
?>