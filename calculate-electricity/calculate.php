<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculate Electricity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <style>
    .center-div {
      margin: 0 auto;
      width: 50%;
    }
  </style>
</head>

<body>
  <?php

  $power = 2.4;
  $hoursUsed = 10;
  $result = "";

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch ($_POST["watt"]) {
      case 1:
        $GLOBALS["result"] = ($power * $hoursUsed) * 500;
        break;
      case 2:
        $GLOBALS["result"] = ($power * $hoursUsed) * 700;
        break;
      case 3:
        $GLOBALS["result"] = ($power * $hoursUsed) * 1000;
        break;
    }
  }

  ?>

  <div class="container center-div pt-3">
    <h3 class="mb-3">Calcuate Kwh</h3>
    <form method="post">
      <div class="mb-3">
        <label class="form-label" for="power">អនុភាព​ (P)</label>
        <input type="text" name="power" class="form-control" value="<?php echo $power; ?>" />
      </div>
      <div class="mb-3">
        <label class="form-label" for="hoursUsed">រយះពេលប្រើប្រាស់​ (T):
        </label>
        <input type="text" name="hoursUsed" class="form-control" value="<?php echo $hoursUsed; ?>" />
      </div>
      <div class="mb-3 row">
        <div class="col">
          <label>តម្លៃអគ្គិសនី​ (W)</label>
          <select class="form-select" name="watt">
            <option value="1">500 &#6107;</option>
            <option value="2">700 &#6107;</option>
            <option value="3">1000 &#6107;</option>
          </select>
        </div>
        <div class="col">
          <label class="form-label" for="result"></label>
          <input type="text" name="hoursUsed" class="form-control" value="<?php echo $result; ?> &#6107;" />
        </div>
      </div>
      <div class="mb-3">
        <button class="btn btn-primary" name="btnAdd">Calculate</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>