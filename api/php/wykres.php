<?php
/**
 * Plik odpowiada za generowanie wykresów
 */
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
    </html>