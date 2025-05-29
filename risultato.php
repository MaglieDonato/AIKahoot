<?php
//effettuo le connessioni
session_start();
$nServer = "localhost";
$rServer = "root";
$psw = "";
$n = "progettosistemi";
$conn = "";
$conn = mysqli_connect($nServer, $rServer, $psw, $n);

//prendo le risposte corrette
$sqlRichiesta = "SELECT * FROM rispostecorrette1";
$risposteCorrette = mysqli_fetch_assoc(mysqli_query($conn, $sqlRichiesta));
foreach ($risposteCorrette as $domanda => $risposta) {
    // echo $domanda . " " . $risposta . " " . "<br>";
}

//prendo tutte le risposte dell utente
$listaRisposte = array();
$indice = 0;
foreach ($_POST as $risp) {
    $listaRisposte[$indice] = $risp;
    // echo $listaRisposte[$indice];
    $indice++;
}

//prendo il valore idUtente
$chiave = $_SESSION["nome"];
$sqlId = "SELECT idUtente FROM utenti2 WHERE nomeUtente='$chiave'";
$result = mysqli_query($conn, $sqlId);

if ($result) {
    $risultato = mysqli_fetch_assoc($result);
    if ($risultato) {
        $chiaveF = $risultato["idUtente"];
    }
}


//carico le risposte dell utente sul database
$sqlInserimentoRisposte = "INSERT INTO tabella (utente, d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, d12, d13, d14, d15)
VALUES ('" . $chiaveF . "', '" . $listaRisposte[0] . "', '" . $listaRisposte[1] . "', '" . $listaRisposte[2] . "', '" . $listaRisposte[3] . "', '" . $listaRisposte[4] . "', '" . $listaRisposte[5] . "', '" . $listaRisposte[6] . "', '" . $listaRisposte[7] . "', '" . $listaRisposte[8] . "', '" . $listaRisposte[9] . "', '" . $listaRisposte[10] . "', '" . $listaRisposte[11] . "', '" . $listaRisposte[12] . "', '" . $listaRisposte[13] . "', '" . $listaRisposte[14] . "')";
mysqli_query($conn, $sqlInserimentoRisposte);

//confronto le risposte date dall'utente con quelle e determino il punteggio
$arrayGrafico = array();
$punteggioCorrente = 0;
$punteggioMax = 15;
$contatore = 0;
foreach ($risposteCorrette as $esatta) {
    if ($esatta == $listaRisposte[$contatore]) {
        $arrayGrafico[$contatore] = 1;
        $punteggioCorrente++;
    } else {
        $arrayGrafico[$contatore] = 0;
    }
    $contatore++;
}
$sqlGrafico = "INSERT INTO rispostepergraficocollettivo (d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, d12, d13, d14, d15) 
                VALUES ($arrayGrafico[0], $arrayGrafico[1], $arrayGrafico[2], $arrayGrafico[3], $arrayGrafico[4], $arrayGrafico[5], $arrayGrafico[6], $arrayGrafico[7], $arrayGrafico[8], $arrayGrafico[9], $arrayGrafico[10], $arrayGrafico[11], $arrayGrafico[12], $arrayGrafico[13], $arrayGrafico[14])";
mysqli_query($conn, $sqlGrafico);
$inserimentoSql = "INSERT INTO tabellapunteggi4 (ptid, punteggio) VALUES ($chiaveF, $punteggioCorrente);";
mysqli_query($conn, $inserimentoSql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="ris.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: var(--azzurro);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: var(--indaco);
            padding: 20px;
            border-radius: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }

        button {
            margin-top: 20px;
            cursor: pointer;
        }

        @media (min-width: 700px) {
            body {
                margin: auto;
                justify-content: center;
                align-items: center;
                width: 700px;
            }

        }
    </style>
</head>

<body>
    <div class="container text-center">
        <?php
        echo "<p>Hai conseguito un punteggio di {$punteggioCorrente} / {$punteggioMax}</p>";
        ?>
        <button class="mt-4" id="button">Home</button>
    </div>

    <script>
        const bottone = document.getElementById("button");
        bottone.addEventListener("click", function() {
            window.location.href = "index.php";
        });
    </script>
</body>

</html>

<?php
//disconetto
mysqli_close($conn);
?>