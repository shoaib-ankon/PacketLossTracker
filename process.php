<?php
require_once('loginconn.php');
session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['username']) || empty($_POST['password']))
       {
            header("location:index.php?Empty= You cannot login with an empty input");
       }
       else
       {
            $query="select * from login where username='".$_POST['username']."' and password='".$_POST['password']."'";
            $result=mysqli_query($con,$query);
 
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['username'];
                header("location:insert.php");
                

            }
            else
            {
                header("location:index.php?Invalid= Please enter correct user name and password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now';
    }
 
?>