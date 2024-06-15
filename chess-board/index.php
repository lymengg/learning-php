<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Board</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <style>
        .container {
            margin: 0px auto;
            width: 50%;
        }
    </style>
</head>

<body>

    <div class="mt-5"></div>
    <?php

    $isEqualZero = 0;

    for ($x = 1; $x <= 8; $x++) {
        echo "<div class='row container' style='height: 50px;'>";
        for ($j = 1; $j <= 8; $j++) {
            if ($x % 2 != 0) {
                if ($j % 2 != 0) {
                    echo " <div class='col' style='background-color: white; height: 100%;'></div>";
                } else {
                    echo " <div class='col' style='background-color: black; height: 100%;'></div>";
                }
            } else {
                if ($j % 2 != 0) {
                    echo " <div class='col' style='background-color: black; height: 100%;'></div>";
                } else {
                    echo " <div class='col' style='background-color: white; height: 100%;'></div>";
                }
            }
        }
        echo "</div>";
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>