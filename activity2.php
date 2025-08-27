<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['clear_all'])) {
        session_unset();
        session_destroy();
    }

    if (isset($_POST['input_string'])) {
        $input_string = trim($_POST['input_string']);
        if (!empty($input_string)) {
            $_SESSION['string_results'] = [
                'uppercase' => strtoupper($input_string),
                'lowercase' => strtolower($input_string),
                'first_letter_capitalized' => ucfirst($input_string),
                'each_word_capitalized' => ucwords($input_string),
                'trimmed' => $input_string
            ];
        }
    }

    if (isset($_POST['new_fruit'])) {
        $new_fruit = trim($_POST['new_fruit']);
        if (!empty($new_fruit)) {
            if (!isset($_SESSION['fruits'])) {
                $_SESSION['fruits'] = [];
            }
            $_SESSION['fruits'][] = strtolower($new_fruit);
        }
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (!isset($_SESSION['fruits'])) {
    $_SESSION['fruits'] = [];
}
if (!isset($_SESSION['string_results'])) {
    $_SESSION['string_results'] = null;
}
?>
<!DOCTYPE html>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h1, h2, h3 {
            color: #1a237e;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 5px;
            margin-top: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        input[type="text"] {
            width: 80%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .clear-btn {
            background-color: #f44336;
        }

        .clear-btn:hover {
            background-color: #e53935;
        }

        .results {
            margin-top: 20px;
            width: 100%;
        }

        .results b {
            display: inline-block;
            width: 250px;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        li {
            margin-bottom: 5px;
            font-size: 16px;
        }

        hr {
            width: 100%;
            border: 0;
            border-top: 1px solid #ddd;
            margin: 30px 0;
        }
    </style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity #2</title>
</head>
<body>

<h1>String Manipulation</h1>
<form action="" method="post">
    Enter a string: <input type="text" name="input_string"><br><br>
    <input type="submit">
</form>

<?php
if ($_SESSION['string_results']) {
    $results = $_SESSION['string_results'];
    echo "<b>Uppercase:</b> " . htmlspecialchars($results['uppercase']) . "<br>";
    echo "<b>Lowercase:</b> " . htmlspecialchars($results['lowercase']) . "<br>";
    echo "<b>First letter capitalized:</b> " . htmlspecialchars($results['first_letter_capitalized']) . "<br>";
    echo "<b>Each word capitalized:</b> " . htmlspecialchars($results['each_word_capitalized']) . "<br>";
    echo "<b>Original string after trimming spaces:</b> " . htmlspecialchars($results['trimmed']) . "<br>";
}
?>

<hr>

<h2>Arrays</h2>
<form action="" method="post">
    <label for="new_fruit">Enter a fruit to add:</label>
    <input type="text" id="new_fruit" name="new_fruit">
    <input type="submit" value="Add Fruit">
</form>

<h3>Array Size</h3>
The size of the fruits array is: <?php echo count($_SESSION['fruits']); ?><br>

<h3>Fruits in the Array</h3>
<ul>
<?php
foreach ($_SESSION['fruits'] as $fruit) {
    echo "<li>" . htmlspecialchars($fruit) . "</li>";
}
?>
</ul>

<hr>

<form action="" method="post">
    <input type="submit" name="clear_all" value="Clear All">
</form>

</body>
</html>