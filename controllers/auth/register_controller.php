<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    foreach ($_POST as $key => $value) {
        $$key = trim($value);
    }


    $error = validateRegister($name, $email, $password);
    if (!empty($error)) {
        setMessages("danger", $error);
        header('Location: ./index.php?page=register');
        exit;
    }


    if (user_register($name, $email, $password)) {
        setMessages("success", "register user successfully");
        header('Location:./index.php?page=home ');
        exit;
    } else {
        setMessages("danger", "register user fail ");
        header('Location:./index.php?page=register ');
        exit;
    }

}
