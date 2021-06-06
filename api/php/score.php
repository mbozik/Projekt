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
    
    echo "<div><h1><p>".$row["a_temat"]."</a></h1><p>" . $row["a_opis"]. "</p><br><ul>";
    $id=$row["a_id"];
    $tem = $row["a_temat"];
    // $sql2 = "SELECT * from pytania where p_a_id='$id'";
    $sql2 = "SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta WHERE pytania.p_a_id=ankieta.a_id and p_a_id='$id'";
    // $sql2 = "SELECT * FROM odpowiedzi INNER join polacz_hash on odpowiedzi.o_id=polacz_hash.ph_o_id INNER JOIN pytania on odpowiedzi.o_p_id = pytania.p_id";
    $result2 = $connect->query($sql2);
    
    // SELECT * FROM odpowiedzi INNER join polacz_hash on odpowiedzi.o_id=polacz_hash.ph_o_id

    // $k=0;
    $zmienna="";
    if ($result2->num_rows > 0) {
      while($row = $result2->fetch_assoc()) {
        
        if($zmienna!=$row["pytanie"]){
          // if($k%2==0)
          echo"<div style='margin-top:2%;'><div style='background-color:#366d7ea1; padding: 8px; border-radius: 6px;'><p>"."Pytanie: ".$row["pytanie"]."</p><div style='background-color: #ffffff59; border-radius: 8px;     padding: 6px;'><p>Odpowiedzi</p>"; 
          // else
          // echo"<div style='background-color:#f3f3f36e; padding: 8px; border-radius: 6px;'><p>"."Pytanie: ".$row["pytanie"]."</p><div style='background-color: #ffffff59; border-radius: 8px;     padding: 6px;'><p>Odpowiedzi</p>"; 
          
          $zmienna=$row["pytanie"];
          $pyt = $row["pytanie"];
          // $k++;

          $sql3="SELECT COUNT(con_o_id), odpowiedz FROM polacz INNER JOIN odpowiedzi ON odpowiedzi.o_id=polacz.con_o_id INNER JOIN ankieta on ankieta.a_id=polacz.con_a_id INNER JOIN pytania ON pytania.p_a_id=ankieta.a_id WHERE tworca='$user' AND a_temat='$tem' AND pytanie='$pyt' AND odpowiedzi.o_p_id=pytania.p_id GROUP BY con_o_id";
          $result3 = $connect->query($sql3);
        
        while($row = $result3->fetch_assoc()) {
          $xx = $row["COUNT(con_o_id)"];
          echo"<li style='border-bottom: 1px dotted #00000030; list-style:none;'>"." <span>".$row["odpowiedz"]."</span><br><div><span style='float:left;'>Liczba odpowiedzi: </span><div style='background-color:black; border-radius: 15px; color:white;margin-left: 120px; padding-left: 5px;width:".$row["COUNT(con_o_id)"]."9px; margin-bottom: 2px;height: 19px;'>".$row["COUNT(con_o_id)"]."</div></div></li>";
        }
        echo"</div>";
        echo"</div>";
      }
      
      // echo"</div>";
      //  echo"</div>";
      
  }

 
  
  // $tab=[];
  // echo "</ul></div>";
  // $sql3="SELECT COUNT(con_o_id), odpowiedz FROM polacz INNER JOIN odpowiedzi ON odpowiedzi.o_id=polacz.con_o_id INNER JOIN ankieta on ankieta.a_id=polacz.con_a_id INNER JOIN pytania ON pytania.p_a_id=ankieta.a_id WHERE tworca='Bozik.kizob@gmail.com' AND a_temat='Motoryzacyjna' AND odpowiedzi.o_p_id=pytania.p_id GROUP BY con_o_id";
  // $result3 = $connect->query($sql3);
  // while($row = $result3->fetch_assoc()) {
  //  // echo"<li>"."pytanie: ".$row["pytanie"]." odpowiedz :".$row["odpowiedz"]." ile :".$row["COUNT(odpowiedz)"]."</li>";
  //   array_push($tab,array("y" => $row["COUNT(con_o_id)"], "label" => $row["odpowiedz"] ));
    
  //   }
    
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <!-- <script>
    
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

    </script> -->
    </head>
    <body>
    <!-- <div id="chartContainer" style="height: 370px; width: 98%;"></div> -->
    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
    </body>
    
    </html>     <?php
    
  //  echo" </tr>
  //   </table>";
   //    echo "</ul>";}else {
  //  echo "</ul>Brak pytań.";
  }

  echo "</ul>";

}

} else {
  echo "Brak ankiet.";
}
$connect->close();

?>

