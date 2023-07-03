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

    $hasParking = isset($_GET['parking']) ? $_GET['parking'] : null;
    $vote = $_GET['vote'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <form action="./index-with-bonus.php" method="GET" class="row mb-5 d-flex p-2">
            <div class="col-auto mx-2 align-self-center d-flex">
                <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="parking" id="parkingtrue" value="true">
                    <label class="form-check-label" for="parkingtrue">
                        Has parking
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parking" id="parkingfalse" value="false">
                    <label class="form-check-label" for="parkingfalse">
                        Doesn't have parking
                    </label>
                </div>
            </div>
            <div class="col-auto mx-2 align-self-center">
                <label for="vote">Users average vote:</label>
                <select name="vote" id="vote">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button class="col-auto btn btn-primary btn-sm align-self-center">FILTER</button>
        </form>
        
    </div>
    <div class="container">
        <h3>
            <?php
                if (empty($hasParking)
                && empty($vote)){
                    echo 'All our offers';
                } else {
                    echo 'Search result';
                }
            ?>
        </h3>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-light bg-dark">Name</th>
                    <th scope="col" class="text-light bg-dark">Description</th>
                    <th scope="col" class="text-light bg-dark text-center">Parking</th>
                    <th scope="col" class="text-light bg-dark text-center">Vote</th>
                    <th scope="col" class="text-light bg-dark text-center">Downtown distance</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($vote) && empty($hasParking)) {
                        foreach ($hotels as $singleHotel) { 
                ?>
                    <tr>
                        <th scope="row">
                            <?php echo $singleHotel['name']; ?>
                        </th>
                        <td>
                            <?php echo $singleHotel['description']; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($singleHotel['parking'] === true) {
                                echo '<i class="fa-solid fa-check text-success"></i>';
                            } else {
                                echo '<i class="fa-solid fa-xmark text-danger"></i>';
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php 
                                for ($i=0; $i < $singleHotel['vote']; $i++) { 
                                    echo '<i class="fa-solid fa-star text-warning"></i>';
                                } for ($i=0; $i < 5-$singleHotel['vote'] ; $i++) { 
                                    echo '<i class="fa-regular fa-star"></i>';
                                }
                            ?>
                        </td>
                        <td class="text-center">
                            <?php echo $singleHotel['distance_to_center'] .' km'; ?>
                        </td>
                    </tr>
                <?php }} elseif ($hasParking === null) {
                            foreach ($hotels as $singleHotel) {
                                if ($singleHotel['vote'] >= $vote){
                ?>
                        <tr>
                        <th scope="row">
                            <?php echo $singleHotel['name']; ?>
                        </th>
                        <td>
                            <?php echo $singleHotel['description']; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($singleHotel['parking'] === true) {
                                echo '<i class="fa-solid fa-check text-success"></i>';
                            } else {
                                echo '<i class="fa-solid fa-xmark text-danger"></i>';
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php 
                                for ($i=0; $i < $singleHotel['vote']; $i++) { 
                                    echo '<i class="fa-solid fa-star text-warning"></i>';
                                } for ($i=0; $i < 5-$singleHotel['vote'] ; $i++) { 
                                    echo '<i class="fa-regular fa-star"></i>';
                                }
                            ?>
                        </td>
                        <td class="text-center">
                            <?php echo $singleHotel['distance_to_center'] .' km'; ?>
                        </td>
                    </tr>
                <?php }}} elseif ($vote === '') {
                        foreach ($hotels as $singleHotel) {
                            if ($singleHotel['parking'] == $hasParking){
                ?>
                    <tr>
                        <th scope="row">
                            <?php echo $singleHotel['name']; ?>
                        </th>
                        <td>
                            <?php echo $singleHotel['description']; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($singleHotel['parking'] === true) {
                                echo '<i class="fa-solid fa-check text-success"></i>';
                            } else {
                                echo '<i class="fa-solid fa-xmark text-danger"></i>';
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php 
                                for ($i=0; $i < $singleHotel['vote']; $i++) { 
                                    echo '<i class="fa-solid fa-star text-warning"></i>';
                                } for ($i=0; $i < 5-$singleHotel['vote'] ; $i++) { 
                                    echo '<i class="fa-regular fa-star"></i>';
                                }
                            ?>
                        </td>
                        <td class="text-center">
                            <?php echo $singleHotel['distance_to_center'] .' km'; ?>
                        </td>
                    </tr>
                <?php }}} elseif ($hasParking != null && $vote != '') {
                            foreach ($hotels as $singleHotel) {
                                if ($singleHotel['vote'] >= $vote && $singleHotel['parking'] == $hasParking){
                ?>
                        <tr>
                        <th scope="row">
                            <?php echo $singleHotel['name']; ?>
                        </th>
                        <td>
                            <?php echo $singleHotel['description']; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($singleHotel['parking'] === true) {
                                echo '<i class="fa-solid fa-check text-success"></i>';
                            } else {
                                echo '<i class="fa-solid fa-xmark text-danger"></i>';
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php 
                                for ($i=0; $i < $singleHotel['vote']; $i++) { 
                                    echo '<i class="fa-solid fa-star text-warning"></i>';
                                } for ($i=0; $i < 5-$singleHotel['vote'] ; $i++) { 
                                    echo '<i class="fa-regular fa-star"></i>';
                                }
                            ?>
                        </td>
                        <td class="text-center">
                            <?php echo $singleHotel['distance_to_center'] .' km'; ?>
                        </td>
                    </tr>


                <?php } } } ?>
            </tbody>
        </table>
    </div>
</body>
</html>