<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amlani Calculator</title>
    <style>
        h1 {
            text-align: center;
        }
        p {
            text-align: center;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        form {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label, input[type="radio"] {
            display: inline-block;
            margin-right: 20px;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

<?php   
function add($num1, $num2) {
    if ($num1 == 2 && $num2 == 2) {
        return "4, minus 1 that's 3 quick maths!";
    }
    return $num1 + $num2;
}

function subtract($num1, $num2) {
    return $num1 - $num2;
}

function multiply($num1, $num2) {
    return $num1 * $num2;
}

function divide($num1, $num2) {
    if ($num2 != 0) {
        return $num1 / $num2;
    } else {
        return "Bruh, Really? Divide by Zero? Grow up. ♿";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = (int) $_POST['num1'];
    $num2 = (int) $_POST['num2'];
    $operation = $_POST['operation'];
    $result = null;

    switch ($operation) {
        case '+':
            $result = add($num1, $num2);
            break;
        case '-':
            $result = subtract($num1, $num2);
            break;
        case '*':
            $result = multiply($num1, $num2);
            break;
        case '/':
            $result = divide($num1, $num2);
            break;
        default:
            $result = "Invalid operation!";
    }
}
?>

<div class="container">
    <h1>Calcoolator</h1>
    <p>Ahmad Amlani</p>

    <form method="POST" action="">
        <label for="num1">Input for Number 1: </label>
        <input type="text" id="num1" name="num1" required><br><br>

        <label for="num2">Input for Number 2: </label>
        <input type="text" id="num2" name="num2" required><br><br>

        <label>Choose operation: </label><br>
        <input type="radio" id="add" name="operation" value="+" required>
        <label for="add">Add</label><br>

        <input type="radio" id="subtract" name="operation" value="-">
        <label for="subtract">Subtract</label><br>

        <input type="radio" id="multiply" name="operation" value="*">
        <label for="multiply">Multiply</label><br>

        <input type="radio" id="divide" name="operation" value="/">
        <label for="divide">Divide</label><br><br>

        <input type="submit" value="Calculate">

        <?php
        if (isset($result)) {
            echo "<div class='result'>Result: $result</div>";
        }
        ?>
    </form>
</div>

</body>
</html>
