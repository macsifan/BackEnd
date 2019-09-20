<?php 
    session_start();
    $db = mysqli_connect("localhost","root") or die ('No Connection');
    mysqli_select_db($db,'my_db') or die ('db will not open');    
    if(isset($_POST['username'])){
        $uname=$_POST['username'];
        $upassword=$_POST['password'];
        $sql="select * from loginform where User ='".$uname."' AND Password='".$upassword." ' limit 1";
        $results=mysqli_query($db,$sql);
        if(mysqli_num_rows($results)==1){
            $row = mysqli_fetch_array($results);
            $_SESSION["name"] = $uname;
            $_SESSION["pass"] = $upassword;
            echo 'Hi, ' . $_SESSION["name"] . ' Your ID is ' .$row['ID'];
            exit();
        }
        else{
            echo " You Have Entered Incorrect Password";
        }
    }
?>

<html>
    <body>
    <form method="POST" action="#">
        <div>
            <input type="text" name="username" placeholder="Enter user name"/>
        </div>
        <div>
            <input type="password" name="password" placeholder="Enter user password"/>
        </div>
        <div>
            <input type="submit" name="submit" value="LOGIN">
        </div>
    </form>
    </body>
</html>

