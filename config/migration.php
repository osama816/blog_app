<?php 



// create tables 

$conn =  mysqli_connect("localhost","root","","blog_app");



// users 
    // id , name  , email , password 

// posts
    // id , title ,content, user_id,create_at ,imags
    // user id foreign key 



$sql = "CREATE TABLE `users` ( 
    id INT PRIMARY KEY AUTO_INCREMENT , 
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE
    `password` VARCHAR(100) NOT NULL 
    
) ";

mysqli_query($conn,$sql);

$sql = "CREATE TABLE IF NOT EXISTS posts(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(200) NOT NULL ,
    `content` VARCHAR(200) NOT NULL ,
    `imags` VARCHAR(200) NOT NULL ,
    `user_id` INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES `users` (id)

) ";

// to make a query 
mysqli_query($conn,$sql);



mysqli_close($conn);

