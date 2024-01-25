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

// dichiaro la variabile parking vuota per evitare errori nella visualizzazione della select
$parking = '';


// dichiaro una variabile filtered_hotels a cui associo i valori dell'array hotels per evitare errori nella visualizzazione della tabella;
$filtered_hotels = $hotels;

// controllo se è stato selezionato un filtro per gli hotel con parcheggio
if (isset($_GET['parking']) && $_GET['parking'] != '') {

    // dichiaro un'array vuoto che mi servirà nel filtraggio degli hotel
    $temp_hotels = [];

    // assegno alla variabile parking il valore del filtro scelto
    $parking = $_GET['parking'];

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
                        <div class="row">
                            <div class="col-5 my-3">
                                <select class="form-select form-select-sm" name="parking" id="parking">
                                    <option value="">Filtro Hotel con parcheggi OFF</option>
                                    <option value="true" <?php echo ($parking == 'true') ? 'selected' : ''; ?>>Filtro Hotel con parcheggi ON</option>
                                    <!-- <option value="false" <?php echo ($parking == 'false') ? 'selected' : ''; ?>>No</option> -->
                                </select>
                            </div>
                            <div class="col-2 pt-3">
                                <button class="btn btn-success btn-sm" type="submit">Filtra</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-dark table-striped">
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
                                        <?php if ($hotel['parking']) {
                                            echo "Parcheggio disponibile: Sì";
                                        } else {
                                            echo "Parcheggio disponibile: No";
                                        } ?>
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