<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
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
    <header>
        <div class="titolo">
            <h1>SONDAGGIO PER LA CLASSE</h1>
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="border-radius: 12px !important;" id="nV">
            <div id="barraRicerca" class="container-fluid">
                <p>Barra di ricerca</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="spazio"></div>
            <div style="justify-content: space-around;" class="collapse navbar-collapse" id="navbarNavDropdown" class="tendina">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="index.php">Home</a>
                    </li>
                    <div style="width: 100px;"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="contattaci.html">Contattaci</a>
                    </li>
                    <div style="width:50px;"></div>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div id="testo">
                        <p id="consegna">
                            <b>
                                Compila queste 15 domande sommative che verificheranno le tue conoscenze sui big data e sui rischi dell'integrazione delle IA.
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div id="recBlock">
                        <div id="ricRecBlock">
                            <p id="ricRec">
                                <b>
                                    Prima di continuare effettua la registazione, grazie.
                                </b>
                            </p>
                        </div>
                        <button id="rec">Registrati</button>
                        <div id="registrazione">
                            <div class="card">
                                <div class="card-body">
                                    <form action="databaseUtenti.php" method="post">
                                        <div class="nome">
                                            <h5 class="card-title">Inserisci il tuo nome</h5>
                                            <input type="text" name="nome" required id="nome">
                                        </div>
                                        <h5 class="card-title">Indica la fila di appartenenza</h5>
                                        <div class="fila">
                                            <div class="primo">
                                                <label>destra</label>
                                                <input type="radio" name="scelta" value="destra" id="fila" required>
                                            </div>
                                            <div class="secondo">
                                                <label>centro</label>
                                                <input type="radio" name="scelta" value="centro" id="fila" required>
                                            </div>
                                            <div class="terzo">
                                                <label>sinistra</label>
                                                <input type="radio" name="scelta" value="sinistra" id="fila" required>
                                            </div>
                                        </div>
                                        <button class="mt-3" type="submit" id="invio">Invia</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bt1">
            <button class="mt-4" id="button1">Grafico</button>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Lavoro di gruppo</p>
    </footer>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titolo">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <img src="" id="immagine">
                </div>
                <div id="descrizione">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    const rec = document.getElementById("rec");
    const modulo = document.getElementById("registrazione");
    rec.addEventListener("click", function() {
        modulo.style.display = "block";
        modulo.style.display = 'flex';
        rec.style.display = 'none';
    })

    button1.addEventListener("click", function() {
        window.location.href = "grafici.php";
    })
</script>

</html>