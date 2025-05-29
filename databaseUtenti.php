<?php
$nServer = "localhost";
$rServer = "root";
$psw = "";
$n = "progettosistemi";
$conn = "";
$conn = mysqli_connect($nServer, $rServer, $psw, $n);
$nome = $_POST["nome"];
$scelta = $_POST["scelta"];
session_start();
$_SESSION["nome"] = $nome;
$sql = "INSERT INTO utenti2 (nomeUtente, filaUtente) 
            VALUES ('$nome', '$scelta')";
mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="quiz.css">
</head>

<body>
    <header>
        <h1>QUIZ:BIG DATA E RISCHI DI IA</h1>
    </header>
    <main>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <form action="risultato.php" method="post">
                        <div id="primo">
                            <p>Cosa sono i Big Data?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Primo1">Grandi volumi di dati strutturati e non strutturati provenienti da varie fonti</label>
                                <input type="radio" id="Primo1" name="Primo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Primo2">Dati generati esclusivamente da sensori.</label>
                                <input type="radio" id="Primo2" name="Primo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Primo3">Dati memorizzati solo in fogli di calcolo.</label>
                                <input type="radio" id="Primo3" name="Primo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Primo4">Informazioni limitate a transazioni commerciali.</label>
                                <input type="radio" id="Primo4" name="Primo" required value="4">
                            </div>
                        </div>

                        <div id="secondo">
                            <p>Quali sono le applicazioni dei Big Data nel settore dell'Business Intelligence?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Secondo1">Utilizzo dei dati solo per scopi pubblicitari.</label>
                                <input type="radio" id="Secondo1" name="Secondo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Secondo2">Analisi dei dati limitata alla produzione.</label>
                                <input type="radio" id="Secondo2" name="Secondo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Secondo3"> Analisi dei dati dei clienti per decisioni di business più informate.</label>
                                <input type="radio" id="Secondo3" name="Secondo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Secondo4">Monitoraggio esclusivo delle attività sociali dei clienti.</label>
                                <input type="radio" id="Secondo4" name="Secondo" required value="4">
                            </div>
                        </div>

                        <div id="terzo">
                            <p>Qual è uno dei rischi associati all'utilizzo non etico dei big data?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Terzo1">Aumento della trasparenza nelle organizzazioni</label>
                                <input type="radio" id="Terzo1" name="Terzo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Terzo2">Miglioramento della sicurezza informatica</label>
                                <input type="radio" id="Terzo2" name="Terzo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Terzo3">Semplificazione delle decisioni aziendali</label>
                                <input type="radio" id="Terzo3" name="Terzo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Terzo4">Potenziale violazione della privacy degli individui</label>
                                <input type="radio" id="Terzo4" name="Terzo" required value="4">
                            </div>
                        </div>

                        <div id="quarto">
                            <p>Qual è uno dei principali rischi dell'automazione estrema nell'IA?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quarto1">Aumento dell'efficienza operativa</label>
                                <input type="radio" id="Quarto1" name="Quarto" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quarto2">Semplificazione delle decisioni aziendali</label>
                                <input type="radio" id="Quarto2" name="Quarto" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quarto3">Miglioramento della sicurezza informatica</label>
                                <input type="radio" id="Quarto3" name="Quarto" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quarto4">Perdita di posti di lavoro</label>
                                <input type="radio" id="Quarto4" name="Quarto" required value="4">
                            </div>
                        </div>

                        <div id="quinto">
                            <p>Cosa significa l'acronimo "AI"?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quinto1">Advanced Information</label>
                                <input type="radio" id="Quinto1" name="Quinto" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quinto2">Artificial Intelligence</label>
                                <input type="radio" id="Quinto2" name="Quinto" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quinto3">Automated Integration</label>
                                <input type="radio" id="Quinto3" name="Quinto" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quinto4">Algorithmic Insights</label>
                                <input type="radio" id="Quinto4" name="Quinto" required value="4">
                            </div>
                        </div>

                        <div id="sesto">
                            <p>Quali sono i rischi associati alle violazioni della privacy e della sicurezza dei dati nei sistemi basati su Big Data?
                            </p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Sesto1">Solo rischi legati alla gestione interna dei dati</label>
                                <input type="radio" id="Sesto1" name="Sesto" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Sesto2">Nessun rischio associato alla sicurezza dei dati</label>
                                <input type="radio" id="Sesto2" name="Sesto" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Sesto3">Compromissione dei dati sensibili durante la trasmissione</label>
                                <input type="radio" id="Sesto3" name="Sesto" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Sesto4">Rischi esclusivamente associati alla sicurezza fisica</label>
                                <input type="radio" id="Sesto4" name="Sesto" required value="4">
                            </div>
                        </div>

                        <div id="settimo">
                            <p>Qual è il rischio di bias e discriminazione nei sistemi basati su Big Data?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Settimo1">Decisioni ingiuste basate su pregiudizi nei dati di addestramento</label>
                                <input type="radio" id="Settimo1" name="Settimo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Settimo2">Assenza di rischi di bias nei sistemi basati su Big Data</label>
                                <input type="radio" id="Settimo2" name="Settimo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Settimo3">Utilizzo dei dati solo in base a criteri oggettivi</label>
                                <input type="radio" id="Settimo3" name="Settimo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Settimo4">Esclusione di dati non rilevanti dai modelli di analisi</label>
                                <input type="radio" id="Settimo4" name="Settimo" required value="4">
                            </div>
                        </div>

                        <div id="ottavo">
                            <p>Quali sono i rischi associati alla fiducia e all'interpretazione delle decisioni nei sistemi basati su Big Data?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Ottavo1">Interpretazione delle decisioni senza errori</label>
                                <input type="radio" id="Ottavo1" name="Ottavo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Ottavo2">Chiarezza totale delle decisioni prese dagli algoritmi</label>
                                <input type="radio" id="Ottavo2" name="Ottavo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Ottavo3">Facilità di interpretazione delle decisioni dei sistemi basati su Big Data</label>
                                <input type="radio" id="Ottavo3" name="Ottavo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Ottavo4">Difficoltà nell'interpretazione delle decisioni degli algoritmi di IA</label>
                                <input type="radio" id="Ottavo4" name="Ottavo" required value="4">
                            </div>
                        </div>

                        <div id="nono">
                            <p>Qual è il rischio della sostituzione delle competenze umane nei sistemi basati su Big Data?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Nono1">Dipendenza totale dalle macchine senza impatto sul lavoro umano</label>
                                <input type="radio" id="Nono1" name="Nono" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Nono2">Utilizzo dei sistemi AI solo per supportare le competenze umane</label>
                                <input type="radio" id="Nono2" name="Nono" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Nono3">Disoccupazione a causa della sostituzione dei lavoratori con tecnologie AI</label>
                                <input type="radio" id="Nono3" name="Nono" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Nono4">Assenza di rischi di sostituzione delle competenze umane</label>
                                <input type="radio" id="Nono4" name="Nono" required value="4">
                            </div>
                        </div>

                        <div id="decimo">
                            <p>Cosa rappresenta il termine "Bias" nei sistemi di intelligenza artificiale?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Decimo1">Completezza dei dati analizzati</label>
                                <input type="radio" id="Decimo1" name="Decimo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Decimo2">Equilibrio nei risultati dell'analisi</label>
                                <input type="radio" id="Decimo2" name="Decimo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Decimo3">Preconcetti o distorsioni nei dati di addestramento</label>
                                <input type="radio" id="Decimo3" name="Decimo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Decimo4">Mancanza di dati nell'analisi</label>
                                <input type="radio" id="Decimo4" name="Decimo" required value="4">
                            </div>
                        </div>

                        <div id="undicesimo">
                            <p>Qual è il rischio della dipendenza tecnologica e della vulnerabilità nei sistemi basati su Big Data?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Undicesimo1">Assenza di rischi legati alla dipendenza tecnologica</label>
                                <input type="radio" id="Undicesimo1" name="Undicesimo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Undicesimo2">Dipendenza eccessiva dalle tecnologie AI senza adeguate misure di backup</label>
                                <input type="radio" id="Undicesimo2" name="Undicesimo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Undicesimo3">Utilizzo dei sistemi AI solo come opzione aggiuntiva</label>
                                <input type="radio" id="Undicesimo3" name="Undicesimo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Undicesimo4">Dipendenza solo da tecnologie tradizionali</label>
                                <input type="radio" id="Undicesimo4" name="Undicesimo" required value="4">
                            </div>
                        </div>

                        <div id="dodicesimo">
                            <p>Quali sono i costi elevati associati all'implementazione, alla manutenzione e all'aggiornamento delle tecnologie AI, che possono superare i benefici attesi?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Dodicesimo1">Utilizzo esclusivo di tecnologie AI open source per ridurre i costi</label>
                                <input type="radio" id="Dodicesimo1" name="Dodicesimo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Dodicesimo2">Implementazione delle tecnologie AI senza costi aggiuntivi</label>
                                <input type="radio" id="Dodicesimo2" name="Dodicesimo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Dodicesimo3">Assenza di rischi associati ai costi di implementazione delle tecnologie AI</label>
                                <input type="radio" id="Dodicesimo3" name="Dodicesimo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Dodicesimo4">Costi elevati associati all'implementazione delle tecnologie AI</label>
                                <input type="radio" id="Dodicesimo4" name="Dodicesimo" required value="4">
                            </div>
                        </div>

                        <div id="tredicesimo">
                            <p>Qual è l'impatto ambientale e la sostenibilità nei sistemi basati su Big Data?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Tredicesimo1">Nessun impatto ambientale associato all'uso dei Big Data</label>
                                <input type="radio" id="Tredicesimo1" name="Tredicesimo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Tredicesimo2">Aumento del consumo di energia elettrica dovuto alle tecnologie AI</label>
                                <input type="radio" id="Tredicesimo2" name="Tredicesimo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Tredicesimo3">Utilizzo di fonti rinnovabili di energia per ridurre l'impatto ambientale</label>
                                <input type="radio" id="Tredicesimo3" name="Tredicesimo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Tredicesimo4">Implementazione di tecnologie AI per la riduzione dell'inquinamento</label>
                                <input type="radio" id="Tredicesimo4" name="Tredicesimo" required value="4">
                            </div>
                        </div>

                        <div id="quattordicesimo">
                            <p>Quali sono i potenziali rischi associati all'automazione dei processi di magazzino nei sistemi basati su Big Data?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quattordicesimo1"> Dipendenza eccessiva dalle tecnologie AI senza adeguate misure di backup</label>
                                <input type="radio" id="Quattordicesimo1" name="Quattordicesimo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quattordicesimo2">Aumento degli errori umani e inefficienza nelle operazioni di magazzino</label>
                                <input type="radio" id="Quattordicesimo2" name="Quattordicesimo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quattordicesimo3">Nessun rischio associato all'automazione dei processi di magazzino</label>
                                <input type="radio" id="Quattordicesimo3" name="Quattordicesimo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quattordicesimo4"> Sostituzione dei lavoratori umani con tecnologie AI senza impatto sul lavoro umano</label>
                                <input type="radio" id="Quattordicesimo4" name="Quattordicesimo" required value="4">
                            </div>
                        </div>

                        <div id="quindicesimo">
                            <p>Qual è uno dei vantaggi dell'analisi predittiva nei big data?</p>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quindicesimo1">Limitazione della scalabilità dei dati</label>
                                <input type="radio" id="Quindicesimo1" name="Quindicesimo" required value="1">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quindicesimo2">Previsione esatta di eventi futuri</label>
                                <input type="radio" id="Quindicesimo2" name="Quindicesimo" required value="2">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quindicesimo3">Difficoltà nell'interpretazione dei risultati</label>
                                <input type="radio" id="Quindicesimo3" name="Quindicesimo" required value="3">
                            </div>
                            <hr>
                            <div style="display: flex; justify-content:space-between">
                                <label for="Quindicesimo4">Costi elevati di implementazione</label>
                                <input type="radio" id="Quindicesimo4" name="Quindicesimo" required value="4">
                            </div>
                        </div>

                        <button type="submit">Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <p>&copy; 2024 Lavoro di gruppo</p>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
<?php
mysqli_close($conn);
?>