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

}elseif ($_GET['action']== 'delete'&&isset($_POST['id'])) {
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
elseif ($_GET['action']== 'edit'&&isset($_POST['id'])) {
   $id = $_POST['id'];
   foreach ($_POST as $key => $value) {
    $$key = trim($value);
}
$image=$_FILES["image"];


   if (update_blog( $title, $content,$image,$id)) {
    setMessages("success", "Update blog successfully");
    header('Location:./index.php?page=blogs ');
    exit;
} else {
    setMessages("danger", "Update blog fail ");
    header('Location:./index.php?page=edit ');
    exit;
}

}
