<html>
<?php
    include '../php/cnx.php';
?>
    <head>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script src="../js/courbes.js"></script>
        <script src="../js/functions.js"></script>
        <script src="../jquery/jquery-3.1.1.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar navbar-dark bg-dark p-3">
            <a class="navbar-brand">
                Alice & Bob
            </a>
        </nav>

        <figure class="highcharts-figure">
            <?php
                $sql = $cnx->prepare("SELECT DISTINCT IDF FROM data");
                $sql->execute();
            ?>

            <div id="container"></div>

            <center>
            <div class="btn-group">
                <select class="btn btn-primary dropdown-toggle" name="fridge" id="fridge-select">
                    <?php
                        foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
                            echo "<option value='".$ligne['IDF']."'>Fridge_".$ligne['IDF']."</option>";
                    ?>
                </select>
            </div>
            </center>
        </figure>
        <?php
            $sql = $cnx->prepare("select date, temperature from data");
            $sql->execute();
        ?>
        <center>
            Filtre de l'historique des températures<br/><br/>
            <input  type="datetime-local" name="txtDateDebut"></input>
            <input  type="datetime-local" name="txtDateFin"></input><br/><br/>
            <button type="submit" class="btn btn-primary" name="filter" onClick="getTemperature(document.getElementsByName('txtDateDebut')[0].value, document.getElementsByName('txtDateFin')[0].value)">Filtrer</button><br/><br/>
            <p id="demo"></p>
            <div class="divFilter">
            <table class="table table-striped w-50">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Température</th>
                    </tr>
                </thead>
                    <?php
                    $sql = $cnx->prepare("select date, temperature from data");
                    $sql->execute();
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
            </table>
                </div>
        </div>
        </center>
        <?php

        //     foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $uneTemperature)
        //     {
        //         echo "<div class='divHistorique'>";
        //             echo "<em>".$uneTemperature['date']."</em>";
        //             echo "<em>".$uneTemperature['temperature']."</em>";
        //         echo "</div>";
        //     }
        // ?>
        </div>
    </body>
</html>
