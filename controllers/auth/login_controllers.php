<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    foreach ($_POST as $key => $value) {
        $$key = htmlspecialchars(trim($value));
    }


    $error = validate_Login( $email, $password);
    if (!empty($error)) {
        setMessages("danger", $error);
        header('Location: ./index.php?page=login');
        exit;
    }


    if (LoginUser( $email, $password)) {
        setMessages("success", "Login user successfully");
        header('Location:./index.php?page=home ');
        exit;
    } else {
        setMessages("danger", "invalid Email or Password ");
        header('Location:./index.php?page=login ');
        exit;
    }

}
