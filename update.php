<?php

  include 'conn.php';

  if(isset($_POST['done'])){

 $id=$_GET['id'];   
 $date = $_POST['date'];
 $shift = $_POST['shift'];
 $site= $_POST['site'];
 $mw= $_POST['mw'];
 $reason= $_POST['reason'];
 $remarks= $_POST['remarks'];

 $q = " update loss set id=$id,date='$date',shift='$shift', site='$site', mw='$mw', reason= '$reason', remarks= '$remarks' where id=$id ";


  $query = mysqli_query($con,$q);

  header('location:display.php');
}
?>


?>

<!DOCTYPE html>
<html>
<head>
 <title>Input Tracker</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="col-lg-6 m-auto">
 
 <form method="post">
 
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

  <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

  </div>
 </form>
 </div>
</body>
</html>
