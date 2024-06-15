<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container border p-5">
        <form method="post">      
            <div class="row mb-3">
                <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="productName">
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="price">
                </div>
            </div>
            <div class="row mb-3">
                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="quantity">
                </div>
            </div>
            <div class="row mb-3">
                <label for="type" class="col-sm-2 col-form-label">Product Type</label>
                <div class="col-sm-10">
                    <select class="form-select" name="type">
                        <option>Good</option>
                        <option>Better</option>
                        <option>Best</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="description">
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary">
        </form>
    </div>
    <?php 

    function display($var) {
      foreach($GLOBALS as $demo => $value) {
         if ($value === $var) {
            return $demo;
         }
      }
      return false;
   }

    if (isset($_POST["submit"])) {  
        $productName = $_POST['productName'];
        $price = intval( $_POST['price']);
        $quantity = intval($_POST['quantity']);
        $type = $_POST['type'];
        $description = $_POST['description'];

        echo "
            <div class='container'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Details</th>
                            <th>Value</th>
                            <th>Return Type</th>
                        </tr>   
                    </thead>
                    <tbody>
                        <tr>
                            <td>" . display($productName) . "</td>
                            <td>" .$productName. "</td>
                            <td>" . gettype($productName) . "</td>
                        </tr>   
                        <tr>
                            <td>" .display($price). "</td>
                            <td>" .$price. "</td>
                            <td>" .gettype($price). "</td>
                        </tr>   
                        <tr>
                            <td>" .display($quantity). "</td>
                            <td>" .$quantity. "</td>
                            <td>" .gettype($quantity). "</td>
                        </tr>   
                        <tr>
                            <td>" .display($type). "</td>
                            <td>" .$type. "</td>
                            <td>" .gettype($type). "</td>
                        </tr>   
                        <tr>
                            <td>" .display($description). "</td>
                            <td>" .$description. "</td>
                            <td>" .gettype($description). "</td>
                        </tr>   
                    </tbody>
                </table>
            </div>
        ";
    }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>