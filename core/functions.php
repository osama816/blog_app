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
    $id=mysqli_insert_id($conn);
    $_SESSION["user"] = [
        "name"=> $name,
        "id"=> $id
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
        "id"=> $data['id']
    ];
    return true;
   }else{
    return false;
   }
}
function getBlogs()  {
    $conn=$GLOBALS['conn'];
    $sql= "SELECT * FROM posts WHERE user_id = '{$_SESSION['user']['id']}'";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);

}
function add_blog( $title, $content,$image)  {
  

    $conn=$GLOBALS['conn'];
    $image_name=$image['name'];
    $image_path=realpath(__DIR__ . "/../assets/imgs")."/". $image['name'] ;
    $relative_path = "/assets/imgs/". $image_name;

    if (!move_uploaded_file($image["tmp_name"],$image_path)) {
        setMessages("danger", "Failed to upload image.");
        header('Location:./index.php?page=add-blog ');
        exit;
    }

    $sql= "INSERT INTO `posts` (`title` ,`content`,`imags`,`user_id`,`create_at`)
   VALUES('$title','$content','$relative_path','{$_SESSION['user']['id']}','now()')";
    $res = mysqli_query($conn, $sql);
    
    if($res){
        return true;
       }else{
        return false;
       }
}
function update_blog( $title, $content,$image , $id)  {
  
    $blog =find_blog($id);
    $old_img =realpath(__DIR__ . "/../".$blog['imags']) ;
    if ($old_img && $image && file_exists($old_img)) {
        unlink($old_img);
    }

    $conn=$GLOBALS['conn'];
    $image_name=$image['name'];
    $image_path=realpath(__DIR__ . "/../assets/imgs")."/". $image['name'] ;
    $relative_path = "/assets/imgs/". $image_name;

    if (!move_uploaded_file($image["tmp_name"],$image_path)) {
        setMessages("danger", "Failed to upload image.");
        header('Location:./index.php?page=add-blog ');
        exit;
    }

    $sql= "UPDATE posts SET title ='$title',content='$content',imags='$relative_path' WHERE id ='$id'";
    $res = mysqli_query($conn, $sql);
    
    if($res){
        return true;
       }else{
        return false;
       }
}

function find_blog($id)  {
    $conn=$GLOBALS['conn'];
    $sql= "SELECT * FROM `posts` WHERE id ='$id' ";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) === 0) {
        setMessages("danger", "invalid blog ");
        header('Location:./index.php?page=blogs ');
        exit;
    }
    return mysqli_fetch_assoc($res);
} 


function delete_blog( $id)  {
  
    find_blog($id);
    $conn=$GLOBALS['conn'];
    $sql= "DELETE FROM `posts` WHERE id ='$id' ";
    $res = mysqli_query($conn, $sql);
    
    if($res){
        return true;
       }else{
        return false;
       }
}
?>