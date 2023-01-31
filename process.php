<?php
require('connection.php');
 
if(isset($_POST["add_product"])){
    //uploading to upload folder
$target_dir = "uploads/";
$basename = basename($_FILES["image"]["name"]);
$upload_file = $target_dir.$basename;
//move uploaded file
$move = move_uploaded_file($_FILES["image"]["tmp_name"],$upload_file);
if($move){
    $url = $upload_file;
    $product = $_POST["product"];
    $cpu = $_POST["cpu"];
    $ram = $_POST["ram"];
    $storage = $_POST["storage"];
    $screen = $_POST["screen"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $image = $url;
    //sql
    $sql = "INSERT INTO products(productName,image,cpu,ram,storage,screen,price,description)
    VALUES ('$product','$image','$cpu','$ram','$storage','$screen','$price','$description')";
    $query = mysqli_query($connection,$sql);
    if($query){
       //success message
        $success = "Product added";
    }else{
        $error = "Unable to add product <br>".mysqli_error($connection);
    }  
}else{
    $error = "Unable to upload image";
}
  
}


?>