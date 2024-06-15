<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculate Program</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <style>
      .center-div {
        margin: 0 auto;
        width: 50%;
      }
    </style>
  </head>
  <body>

    <?php 

        $firstNumber = 0;
        $secondNumber = 0;
        $result = 0;

        function addFunction() {
            $GLOBALS["result"] = $GLOBALS["firstNumber"] + $GLOBALS["secondNumber"];
        }

        function subtract() {
            $GLOBALS["result"] = $GLOBALS["firstNumber"] - $GLOBALS["secondNumber"];
        }

        function multiply() {
            $GLOBALS["result"] = $GLOBALS["firstNumber"] * $GLOBALS["secondNumber"];
        }

        function divide() {
            $GLOBALS["result"] = $GLOBALS["firstNumber"] / $GLOBALS["secondNumber"];
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $firstNumber = intval($_POST["firstNumber"]);
            $secondNumber = intval($_POST["secondNumber"]);
            
            if (isset($_POST["btnAdd"])) {
                addFunction();
            } else if (isset($_POST["btnSubtract"])) {
                subtract();
            } else if (isset($_POST["btnMultiply"])) {
                multiply();
            } else {
                divide();
            }
        }
        
    ?>

    <div class="container center-div pt-3">
    <h3 class="mb-3">Calcuate Program</h3>
      <form method="post">
        <div class="mb-3">
          <label class="form-label" for="firstNumber">First Number</label>
          <input
            type="text"
            name="firstNumber"
            class="form-control"
            value="<?php echo $firstNumber; ?>"
          />
        </div>
        <div class="mb-3">
          <label class="form-label" for="secondNumber">Second Number</label>
          <input
            type="text"
            name="secondNumber"
            class="form-control"
            value="<?php echo $secondNumber; ?>"
          />
        </div>
        <div class="mb-3">
          <label class="form-label" for="result">Result</label>
          <input
            type="text"
            name="result"
            class="form-control"
            value="<?php echo $result; ?>"
            readonly
          />
        </div>
        <div class="mb-3">
          <button class="btn btn-primary" name="btnAdd">Add</button>
          <button class="btn btn-secondary" name="btnSubtract">Subtract</button>
          <button class="btn btn-success" name="btnMultiply">Multiply</button>
          <button class="btn btn-danger" name="btnDivide">Divide</button>
        </div>
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
