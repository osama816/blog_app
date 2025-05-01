<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"&&$_GET['action']=="add") {
    foreach ($_POST as $key => $value) {
        $$key = trim($value);
    }
    $image=$_FILES["image"];

    $error = validate_blog( $title, $content,$image);
    if (!empty($error)) {
        setMessages("danger", $error);
        header('Location: ./index.php?page=add-blog');
        exit;
    }

    if (add_blog( $title, $content,$image)) {
        setMessages("success", "add blog successfully");
        header('Location:./index.php?page=blogs ');
        exit;
    } else {
        setMessages("danger", "add blog fail ");
        header('Location:./index.php?page=blogs ');
        exit;
    }

 }