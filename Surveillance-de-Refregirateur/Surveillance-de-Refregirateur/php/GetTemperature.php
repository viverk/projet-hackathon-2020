<?php
include 'cnx.php';
$sql = $cnx->prepare("select date, temperature from data where date between '".$_GET['dateDebut']."' and '".$_GET['dateDebut']."'");
$sql->execute();
echo $sql;
foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $uneTemperature)
{
    echo "<tbody>";
    echo "<tr>";
        echo "<td>".$uneTemperature['date']."</td>";
        echo "<td>".$uneTemperature['temperature']."</td>";
    echo "</tr>";
    echo "</tbody>";
}
?>
