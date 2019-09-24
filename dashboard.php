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
 $connect = mysqli_connect("localhost", "root", "", "packet");  


 $query = "SELECT root, count(*) as number FROM loss GROUP BY root";  
 $query1 = "SELECT shift, count(*) as number FROM loss GROUP BY shift";  



 $result = mysqli_query($connect, $query);  
 $result1 = mysqli_query($connect, $query1);  //change
 ?>  

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Dashboard Packet Loss</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  

           google.charts.setOnLoadCallback(drawChart);  
           google.charts.setOnLoadCallback(drawChart1); //change
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Root', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["root"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Root Cause',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  



           function drawChart1()  //change
           {  
                var data1 = google.visualization.arrayToDataTable([  
                          ['shift', 'number'],    //change
                          <?php  
                          while($row = mysqli_fetch_array($result1))  //change
                          {  
                               echo "['".$row["shift"]."', ".$row["number"]."],";  //change
                          }  
                          ?>  
                     ]);  
                var options1 = {         //change
                      title: 'Shift',  //change
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));  //change duita
                chart1.draw(data1, options1);  // 3 ta change
           }  





           </script>





      </head>  
      <body>  
         <h4  class="text-white text-center"> <a href="display.php"> Home </a> </h4>
           <div style="width:900px;">  
                <h3 align="center">Root Cause Scenerio</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
                 
           </div>  

<div style="width:900px;">  
                <h3 align="center">Shift-wise Packet Loss Input</h3>  
                <br />  
                <div id="piechart1" style="width: 900px; height: 500px;"></div>  
                 
           </div>  

















      </body>  
 </html>  
 
 
 
 
 
 
 <?php  
 echo " NTTN Packet Loss Report Table"; 
 echo "<table style='border: solid 1px black;'>";
 echo "<tr>

        <th>Serial</th>
        <th>Date</th>
        <th>Shift</th>
        <th>Site</th>
        <th>MW HOP</th>
        <th>SRMS</th>
        <th>Root Cause</th>
		 <th>Feedback</th>
       
 </tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "packet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $conn->prepare("SELECT id,date,shift,site,mw,srms,root,feedback FROM loss WHERE root='NTTN'"); 
    

    
    $stmt->execute();






    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 