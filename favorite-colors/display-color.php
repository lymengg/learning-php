<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Favorite Colors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <style>
        .center-div {
            margin: 0 auto;
            width: 50%;
        }
    </style>
</head>

<body>

    <div class="container center-div p-4 border mt-4">
        <form method="post">
            <div class="mb-3">
                <label class="form-label" for="username">Name</label>
                <input type="text" name="username" class="form-control">
            </div>

            <?php

            $colors = array("red", "blue", "black", "yellow", "green");

            foreach ($colors as $index => $color) {
                echo " <div class='mb-3'>
                <input type='checkbox' name='colorList[]' value='" . $color . "'/> 
                <label class='form-label'>" . ucwords($color) . "</label></div>";
            }
            ?>


            <div class="mb-3">
                <button class="btn btn-primary" name="submit" type="submit">Display Favorite Colors</button>
            </div>
        </form>

        <?php

        $name = "";

        if (isset($_POST["submit"])) {
            if (isset($_POST["colorList"]) && isset($_POST["username"])) {
                $name = $_POST["username"];
                echo "<span>$name's favorite colors are: </span> <div class='row'>";
                foreach ($_POST["colorList"] as $index => $color) {
                    echo "<div class='w-15 col-2' style='height: 50px; background-color:" . $color . "'></div>";
                }
                echo "</div>";
            }
        }

        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>