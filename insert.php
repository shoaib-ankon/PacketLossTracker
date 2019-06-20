<?php
    session_start();

    if(isset($_SESSION['User']))
    {
        echo ' Logged in ' . $_SESSION['User'].'<br/>';
        echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        header("location:index.php");
    }

?>






<?php

include 'conn.php';

if(isset($_POST['done'])){

 $date = $_POST['date'];
 $shift = $_POST['shift'];
 $site= $_POST['site'];
 $mw= $_POST['mw'];
 $reason= $_POST['reason'];
 $remarks= $_POST['remarks'];

 $q = " INSERT INTO `loss`(`date`, `shift`,`site`,`mw`,`reason`,`remarks`) VALUES ( '$date', '$shift','$site', '$mw', '$reason', '$remarks')";

  $query = mysqli_query($con,$q);
}
?>



<!DOCTYPE html>
<html>
<head>
 <title>Tracker- Packet Loss</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</head>
<body>




  <div class="col-lg-6 m-auto">
 


 <form method="post">
 <h4  class="text-white text-center"> <a href="display.php"> Update </a> </h4>
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Packet Loss Input </h1>
  

 </div><br>

  <label> Date </label>
 <input type="text" name="date" class="form-control"> <br>

  <label> Shift </label>
 <input type="text" name="shift" class="form-control"> <br>
 <label> Site </label>
 <input type="text" name="site" class="form-control"> <br>
 <label> MW HOP </label>
 <input type="text" name="mw" class="form-control"> <br>
 <label> Reason </label>
 <input type="text" name="reason" class="form-control"> <br>
 <label> Remarks </label>
 <input type="text" name="remarks" class="form-control"> <br>
  <br>

  <button class="btn btn-success" type="submit" name="done" onclick="alert('Submitted Successfully')"> Submit </button><br>

  </div>
 </form>
 </div>
</body>
</html>
