<?php
session_start();
//db connection
$db = mysqli_connect("localhost","root") or die ('No Connection');
mysqli_select_db($db,'my_db') or die ('db will not open');    
//init
$id = 1;
$name = '';
$surname = '';
$email = '';
$edit_state = false;

//when save button pressed do this staff
if(isset($_POST['insert'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $query = "INSERT INTO student (id,name,surname,email) VALUES ('$id','$name','$surname','$email')";
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Information saved";
    header('location: index.php');

}
if( isset($_GET['id']) && isset($_GET['name'])) { 

    $query = "DELETE FROM student WHERE id = '".$_GET['id']." 'AND name='".$_GET['name']." ' ";
    mysqli_query($db, $query);
    if($query) {
        header('location: index.php');
    }
    
    }

if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        echo($name);    
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $query = "UPDATE student SET name='".$name."' ,surname='".$surname."',email='".$email."'WHERE id =$id";
        mysqli_query($db, $query);
        $_SESSION['msg'] = "Information saved";
        header('location: index.php');
    
}
//retrieve records
$results = mysqli_query($db,"SELECT * FROM student");
?>