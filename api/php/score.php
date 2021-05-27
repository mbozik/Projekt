<?php
include('connect.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

$user = $_SESSION['name'];
$sql = "SELECT * from ankieta where tworca='$user'";
$result = $connect->query($sql);
$tytul;


if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
    $tytul=$row["a_temat"];
    
    echo "<h1><a href='".$row["a_temat"]. "'>".$row["a_temat"]."</a></h1><br><p> <h3>Opis</h3>" . $row["a_opis"]. "</p><br><ul>";
    $id=$row["a_id"];

    // $sql2 = "SELECT * from pytania where p_a_id='$id'";
    $sql2 = "SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta WHERE pytania.p_a_id=ankieta.a_id and p_a_id='$id'";
    $result2 = $connect->query($sql2);
    
//SELECT * FROM odpowiedzi INNER join polacz_hash on odpowiedzi.o_id=polacz_hash.ph_h_id INNER JOIN hash WHERE hash.h_id=ph_id

    $zmienna="";
    if ($result2->num_rows > 0) {
      
      while($row = $result2->fetch_assoc()) {
        
        if($zmienna!=$row["pytanie"]){
          echo"<br><p>"."Pytanie: ".$row["pytanie"]."</p>"; 
        $zmienna=$row["pytanie"];}
        echo"<li>"." ".$row["odpowiedz"]."</li>";
          
          // $sql3 = "SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta WHERE pytania.p_a_id=ankieta.a_id";
          // $result3 = $connect->query($sql3);
          // if ($result3->num_rows > 0) {
          //   while($row = $result3->fetch_assoc()) {
          //     if($row['o_p_id']===$row['p_id']){
          //     echo"<li>"."odpowiedz: ".$row["odpowiedz"]."</li>";
          //     }
          //   }}else
          //   {
          //     echo "</ul>Brak odpowiedzi.";
          //   }

  }
  
 // echo "<h1><a href></a></h1><br><p> ODPPWOIEDZI:</p><br><ul>";
  $sql3="SELECT COUNT(odpowiedz),odpowiedz,pytanie FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta WHERE pytania.p_a_id=ankieta.a_id GROUP BY odpowiedz";
  $result3 = $connect->query($sql3);
  $tab=[];
  echo "</ul>";
  while($row = $result3->fetch_assoc()) {
   // echo"<li>"."pytanie: ".$row["pytanie"]." odpowiedz :".$row["odpowiedz"]." ile :".$row["COUNT(odpowiedz)"]."</li>";
    array_push($tab,array("y" => $row["COUNT(odpowiedz)"], "label" => $row["odpowiedz"] ));
    }
   //    echo "</ul>";}else {
  //  echo "</ul>Brak pytań.";
 
  }
  echo "</ul>"
  ?>
  <!DOCTYPE HTML>
  <html>
  <head>
  <script>
  
  window.onload = function() {
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
      text: "Ankieta"
    },
    axisY: {
      title: "Ilość odpowiedzi"
    },
    data: [{
      type: "column",
      yValueFormatString: "#,##0.## odpowiedzi",
      dataPoints: <?php echo json_encode($tab, JSON_NUMERIC_CHECK); ?>
    }]
  });
  chart.render();
   
  }
  </script>
  </head>
  <body>
  <div id="chartContainer" style="height: 370px; width: 98%;"></div>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  </body>
  </html>      <?php
}

} else {
  echo "Brak ankiet.";
}
$connect->close();

?>
