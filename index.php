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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="my-2">Hotel della zona</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
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
                            <?php foreach ($hotels as $hotel) { ?>
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

</html>