<?php
require("db.classe.php");
require("navi.php");
$sql = "SELECT Lieu, SUM(morts) as total_morts FROM onaserdb GROUP BY Lieu";
$result = $conn->query($sql);

$lieux = [];
$morts = [];

while ($row = $result->fetch_assoc()) {
    $lieux[] = $row['Lieu'];
    $morts[] = $row['total_morts'];
}
?>
<div style="margin-left:15%;padding:1px 16px;height:1000px;">
  <div class='papa'>
  <aside>
    <button type="button"><a href="list.php">Listing</a></button>
  </aside>
  </div>
    <canvas id="accidentsChart" width="400" height="200"></canvas>
    <script>
        var ctx = document.getElementById('accidentsChart').getContext('2d');
        var accidentsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($lieux); ?>,
                datasets: [{
                    label: 'Nombre de Morts',
                    data: <?php echo json_encode($morts); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
