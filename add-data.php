<?php
$connection = mysqli_connect("localhost", "root", "", "ajax");
$name = $_POST['name'];
$age = $_POST['age'];
$class = $_POST['class'];

$insert = "INSERT INTO student (name,age,class) VALUES ('{$name}',$age,'{$class}')";
$result = mysqli_query($connection, $insert);
if($result){
    echo 1;
}else{
    echo 2;
}
?>