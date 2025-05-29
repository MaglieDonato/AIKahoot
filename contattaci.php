<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferma</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: var(--azzurro);
        }

        .conferma {
            border-radius: 20px;
            background-color: var(--indaco);
            padding: 20px;
            margin-left: 10px;
            margin-right: 10px;
            text-align: center;
        }

        h1,
        h2 {
            margin: 10px 0;
            color: white;
        }

        .bottone {
            margin-top: 20px;
        }

        button {
            width: 100px;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="conferma">
        <h1>Richiesta inviata!</h1>
        <h2>Riceverai aggiornamenti il prima possibile.</h2>
        <div class="bottone">
            <button id="button">Home</button>
        </div>
    </div>

    <script>
        const bottone = document.getElementById("button");
        bottone.addEventListener("click", function() {
            window.location.href = "index.php";
        });
    </script>
</body>

</html>