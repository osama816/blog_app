<?php
session_start();
function setMessages($type, $message)
{
    $_SESSION['message'] = [
        'type' => $type,
        'text' => $message,
    ];
}

function showMessages()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];

        echo "<div class='text-center'><div class='alert alert-$type'>$text</div></div>";

        unset($_SESSION['message']);
    }
}
 
function user_register($name, $email, $password) {
    $conn=$GLOBALS['conn'];
   $password_hash= password_hash($password, PASSWORD_DEFAULT); 
   $sql= "INSERT INTO users (`name` ,`email`,`password`)
   VALUES('$name','$email','$password_hash')";
   $res = mysqli_query($conn, $sql);
 
   if($res){
    $_SESSION["user"] = [
        "name"=> $name,
        "email"=> $email
    ];
    return true;
   }else{
    return false;
   }
}

function LoginUser($email, $password)
{
$conn=$GLOBALS['conn'];
$sql= "SELECT * FROM users WHERE email='$email' ";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) === 0) {
    setMessages("danger", "invalid Email ");
    header('Location:./index.php?page=login ');
    exit;
}
$data=mysqli_fetch_assoc($res);
if(password_verify($password, $data['password'])) {
    $_SESSION["user"] = [
        "name"=> $data['name'],
        "email"=> $data['email']
    ];
    return true;
   }else{
    return false;
   }
}

?>