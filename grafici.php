<?php
$nServer = "localhost";
$rServer = "root";
$psw = "";
$n = "progettosistemi";
$conn = "";
$domanda1 = 0;
$domanda2 = 0;
$domanda3 = 0;
$domanda4 = 0;
$domanda5 = 0;
$domanda6 = 0;
$domanda7 = 0;
$domanda8 = 0;
$domanda9 = 0;
$domanda10 = 0;
$domanda11 = 0;
$domanda12 = 0;
$domanda13 = 0;
$domanda14 = 0;
$domanda15 = 0;
$conn = mysqli_connect($nServer, $rServer, $psw, $n);
$domande = array("domanda1", "domanda2", "domanda3", "domanda4", "domanda5", "domanda6", "domanda7", "domanda8", "domanda9", "domanda10", "domanda11", "domanda12", "domanda13", "domanda14", "domanda15");
$arrayDomande = array("d1", "d2", "d3", "d4", "d5", "d6", "d7", "d8", "d9", "d10", "d11", "d12", "d13", "d14", "d15");
$sqlGraficoCollettivo = "SELECT * FROM rispostepergraficocollettivo";
$risultato = mysqli_query($conn, $sqlGraficoCollettivo);
while ($row = mysqli_fetch_assoc($risultato)) {
    $d1 = $row[$arrayDomande[0]];
    $d2 = $row[$arrayDomande[1]];
    $d3 = $row[$arrayDomande[2]];
    $d4 = $row[$arrayDomande[3]];
    $d5 = $row[$arrayDomande[4]];
    $d6 = $row[$arrayDomande[5]];
    $d7 = $row[$arrayDomande[6]];
    $d8 = $row[$arrayDomande[7]];
    $d9 = $row[$arrayDomande[8]];
    $d10 = $row[$arrayDomande[9]];
    $d11 = $row[$arrayDomande[10]];
    $d12 = $row[$arrayDomande[11]];
    $d13 = $row[$arrayDomande[12]];
    $d14 = $row[$arrayDomande[13]];
    $d15 = $row[$arrayDomande[14]];
    if ($d1 == 1) {
        $domanda1++;
    }
    if ($d2 == 1) {
        $domanda2++;
    }
    if ($d3 == 1) {
        $domanda3++;
    }
    if ($d4 == 1) {
        $domanda4++;
    }
    if ($d5 == 1) {
        $domanda5++;
    }
    if ($d6 == 1) {
        $domanda6++;
    }
    if ($d7 == 1) {
        $domanda7++;
    }
    if ($d8 == 1) {
        $domanda8++;
    }
    if ($d9 == 1) {
        $domanda9++;
    }
    if ($d10 == 1) {
        $domanda10++;
    }
    if ($d11 == 1) {
        $domanda11++;
    }
    if ($d12 == 1) {
        $domanda12++;
    }
    if ($d13 == 1) {
        $domanda13++;
    }
    if ($d14 == 1) {
        $domanda14++;
    }
    if ($d15 == 1) {
        $domanda15++;
    }
}
$graficoCollettivo = array($domanda1, $domanda2, $domanda3, $domanda4, $domanda5, $domanda6, $domanda7, $domanda8, $domanda9, $domanda10, $domanda11, $domanda12, $domanda13, $domanda14, $domanda15);
$domandeJs = json_encode($domande);
$graficoCollettivoJs = json_encode($graficoCollettivo);

//secondo grafico
//media destra
$sqlGraficoFile = "SELECT punteggio FROM tabellapunteggi4
INNER JOIN utenti2 ON tabellapunteggi4.ptid = utenti2.idUtente
WHERE utenti2.filaUtente = 'destra';";
$ris = mysqli_query($conn, $sqlGraficoFile);
$c = 0;
$accumulatore = 0;
while ($row = mysqli_fetch_assoc($ris)) {
    $accumulatore += $row["punteggio"];
    $c++;
}
if ($accumulatore == 0) {
    $mediaDestra = 0;
} else {
    $mediaDestra = $accumulatore / $c;
}
//media centro
$sqlGraficoFile = "SELECT punteggio FROM tabellapunteggi4
INNER JOIN utenti2 ON tabellapunteggi4.ptid = utenti2.idUtente
WHERE utenti2.filaUtente = 'centro';";
$ris = mysqli_query($conn, $sqlGraficoFile);
$c = 0;
$accumulatore = 0;
while ($row = mysqli_fetch_assoc($ris)) {
    $accumulatore += $row["punteggio"];
    $c++;
}
if ($accumulatore == 0) {
    $mediaCentro = 0;
} else {
    $mediaCentro = $accumulatore / $c;
}

//media sinistra
$sqlGraficoFile = "SELECT punteggio FROM tabellapunteggi4
INNER JOIN utenti2 ON tabellapunteggi4.ptid = utenti2.idUtente
WHERE utenti2.filaUtente = 'sinistra';";
$ris = mysqli_query($conn, $sqlGraficoFile);
$c = 0;
$accumulatore = 0;
while ($row = mysqli_fetch_assoc($ris)) {
    $accumulatore += $row["punteggio"];
    $c++;
}
if ($accumulatore == 0) {
    $mediaSinistra = 0;
} else {
    $mediaSinistra = $accumulatore / $c;
}
$mediePhp = array($mediaDestra, $mediaCentro, $mediaSinistra);
$medie = json_encode($mediePhp);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafici</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container" style="margin-top: 30px;">
        <h1><b>Numero di risposte corrette per domanda</b></h1>
        <canvas id="myCanvas"></canvas>
        <h1><b>Numero di risposte corrette per fila</b></h1>
        <canvas id="myCanvas2"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let domande = <?php echo $domandeJs; ?>;
        let graficoCollettivo = <?php echo $graficoCollettivoJs; ?>;
        let partecipanti = [5, 10, 15, 20, 25, 30];

        let maxValue = Math.max(Math.max(...partecipanti), Math.max(...graficoCollettivo));

        let myCanvas = document.getElementById("myCanvas");
        let myCanvas2 = document.getElementById("myCanvas2");
        let chart = new Chart(myCanvas, {
            type: 'bar',
            data: {
                labels: domande,
                datasets: [{
                        label: "Numero di partecipanti",
                        data: partecipanti,
                        borderWidth: 0,
                        hidden: true
                    },
                    {
                        label: "Risposte corrette",
                        data: graficoCollettivo,
                        backgroundColor: '#8D80AD',
                        borderColor: '#54423f',
                        hoverBorderWidth: 4,
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        display: true,
                        suggestedMax: maxValue
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        let medie = <?php echo $medie; ?>;
        let file = ["destra", "centro", "sinistra"];
        let chart2 = new Chart(myCanvas2, {
            type: 'bar',
            data: {
                labels: file,
                datasets: [{
                        label: "Numero di partecipanti",
                        data: partecipanti,
                        borderWidth: 0,
                        hidden: true
                    },
                    {
                        label: "media delle file",
                        data: medie,
                        backgroundColor: '#b2f1c5',
                        borderColor: "#54423f",
                        hoverBorderWidth: 4,
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        display: true,
                        suggestedMax: maxValue
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>






</body>

</html>


<?php
mysqli_close($conn);
?>