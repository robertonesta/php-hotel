<?php
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
$parkingLot = $_GET["parkingLot"];
$vote = $_GET["vote"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Hotel</title>
</head>

<body>

<!-- Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate per steps:
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus: 1
Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.-->
<div class="appHeader text-center align-items-center">
    <h1>Hotel Filter</h1>
</div>
<div class="appMain">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <form class="my-3" action="index.php" method="get">
            <div class="form-check p-0 text-center mb-5 d-flex align-items-center">
                <label class="form-check-label mb-2" for="parkingLot">Check for hotels with parking lots</label>
                <input class="form-check-input m-0" name="parkingLot" type="checkbox" id="parkingLot">
            </div>
            <div class="mb-5">
                <label for="vote" class="form-label mb-2">Vote</label>
                <input type="number"
                class="form-control mb-2" min="1" max="5" name="vote" id="vote" aria-describedby="voteHelper" placeholder="Choose the vote">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        
        <table class="table table-dark table-striped text-center w-70">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking Lot</th>
                    <th>Vote</th>
                    <th>Distance to center</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($hotels as $hotel) :
                if (($parkingLot === null || $hotel["parking"]) && ($hotel["vote"] >= $vote)) : ?>
                <tr>
                    <?php foreach ($hotel as $key => $searchfilter) : ?>
                        <td>
                            <?php
                            if ($searchfilter !== true && $searchfilter !== false){
                                echo $searchfilter;
                            } elseif ($searchfilter){
                                echo "Yes";
                            } else {
                                echo "No";
                            }
                            ?>
                        </td>                        
                    <?php endforeach; ?>
                </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
