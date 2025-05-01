<?php
if ($_GET['action']== 'edit'&&isset($_POST['id'])) {
    $id = $_POST['id'];
    foreach ($_POST as $key => $value) {
     $$key = trim($value);
 }
 $image=$_FILES["image"];

 $error = validate_blog( $title, $content,$image);
 if (!empty($error)) {
     setMessages("danger", $error);
     header('Location: ./index.php?page=blogs');
     exit;
 }
 
 
    if (update_blog( $title, $content,$image,$id)) {
     setMessages("success", "Update blog successfully");
     header('Location:./index.php?page=blogs ');
     exit;
 } else {
     setMessages("danger", "Update blog fail ");
     header('Location:./index.php?page=blogs ');
     exit;
 }
 
 }
?>