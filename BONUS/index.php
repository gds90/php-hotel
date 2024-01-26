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
    ]
];


// dichiaro la variabile vote vuota per evitare errori nella visualizzazione della select
$vote = '';

// dichiaro una variabile filtered_hotels a cui associo i valori dell'array hotels per evitare errori nella visualizzazione della tabella iniziale;
$filtered_hotels = $hotels;

// controllo se è stato selezionato un filtro per gli hotel con parcheggio
if (isset($_GET['parking']) && $_GET['parking'] != '') {

    // dichiaro un'array vuoto che mi servirà nel filtraggio degli hotel
    $temp_hotels = [];

    // assegno alla variabile parking il valore del filtro scelto
    $parking = $_GET['parking'];

    // // converto la stringa del select in valore booleano
    // $parking = filter_var($parking, FILTER_VALIDATE_BOOL);

    // svuoto l'array degli hotel filtrati per evitare doppioni nella tabella
    $filtered_hotels = [];

    // ciclo l'array degli hotel per cercare gli hotel che rientrano nel filtro scelto
    foreach ($hotels as $hotel) {

        if ($hotel['parking'] == $parking) {

            // se l'hotel ha il parcheggio, lo inserisco in un array temporanea
            $temp_hotels[] = $hotel;
        }
    }

    // riempio l'array degli hotel filtrati con il contenuto dell'array temporanea
    $filtered_hotels = $temp_hotels;
}
if (isset($_GET['vote']) && $_GET['vote'] != '') {

    // svuoto l'array degli hotel temporanei
    $temp_hotels = [];

    // assegno alla variabile vote il valore del filtro scelto
    $vote = $_GET['vote'];

    // ciclo l'array degli hotel temporanei per cercare gli hotel che hanno valutazione maggiore o uguale al filtro scelto
    foreach ($filtered_hotels as $hotel) {
        if ($hotel['vote'] >= $vote) {

            // se l'hotel ha il parcheggio, lo inserisco in un array temporanea
            $temp_hotels[] = $hotel;
        }
    }

    // riempio l'array degli hotel filtrati con il contenuto dell'array temporanea
    $filtered_hotels = $temp_hotels;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Hotel</title>
</head>

<body>
    <?php include_once __DIR__ . "/partials/templates/header.php"; ?>

    <main class="bg-body-tertiary py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="index.php" method="get">
                        <h3>Filtri:</h3>
                        <div class="row">
                            <div class="col-5 my-3">
                                <select class="form-select form-select-sm" name="parking" id="parking">
                                    <option value="">Filtra Hotel con o senza parcheggio</option>
                                    <option value="1" <?php echo (isset($_GET['parking']) && $parking == 1) ? 'selected' : ''; ?>>Filtra Hotel con parcheggio disponibile</option>
                                    <option value="0" <?php echo (isset($_GET['parking']) && $parking == 0) ? 'selected' : ''; ?>>Filtra Hotel con parcheggio non disponibile</option>
                                </select>
                            </div>
                            <div class="col-5 my-3">
                                <select class="form-select form-select-sm" name="vote" id="vote">
                                    <option value="">Filtra Hotel per voto</option>
                                    <option value="1" <?php echo ($vote == '1') ? 'selected' : ''; ?>>voto 1 e superiori</option>
                                    <option value="2" <?php echo ($vote == '2') ? 'selected' : ''; ?>>voto 2 e superiori</option>
                                    <option value="3" <?php echo ($vote == '3') ? 'selected' : ''; ?>>voto 3 e superiori</option>
                                    <option value="4" <?php echo ($vote == '4') ? 'selected' : ''; ?>>voto 4 e superiori</option>
                                    <option value="5" <?php echo ($vote == '5') ? 'selected' : ''; ?>>voto 5</option>
                                </select>
                            </div>
                            <div class="col-2 pt-3">
                                <button class="btn btn-success btn-sm" type="submit">Filtra</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-dark table-striped mt-2">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrizione</th>
                                <th>Parcheggio</th>
                                <th>Voto</th>
                                <th>Distanza dal centro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($filtered_hotels as $hotel) { ?>
                                <tr>
                                    <td>
                                        <?php echo $hotel['name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $hotel['description'] ?>
                                    </td>
                                    <td>
                                        <?php echo ($hotel['parking']) ? 'Parcheggio disponibile: Sì' : 'Parcheggio disponibile: No'; ?>
                                    </td>
                                    <td>
                                        <?php echo $hotel['vote'] ?>
                                    </td>
                                    <td>
                                        <?php echo $hotel['distance_to_center'] . " km" ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
<?php include_once __DIR__ . "/partials/templates/footer.php"; ?>

</html>