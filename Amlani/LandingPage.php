<?php
$siteTitle = "Welcome to My PHP Page";
$today = date("l, F j, Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $siteTitle; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; padding: 0;
            background: #f5f5f5;
            color: #333;
        }
        header {
            background: #40882bff;
            color: white;
            padding: 2rem;
            text-align: center;
        }
        main {
            padding: 2rem;
            max-width: 600px;
            margin: auto;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: -1rem;
        }
        form {
            margin-top: 2rem;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 1rem;
            padding: 10px 20px;
            background: #007BFF;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<header>
    <h1><?php echo $siteTitle; ?></h1>
    <p>Today is <?php echo $today; ?></p>
</header>

<main>
    <h2>About This Page</h2>
    <p>Just an Assignment Tasked for us</p>
    <form action="#" method="post">
        <label for="id_number">ID Number:</label>
        <input type="text" name="id_number" id="id_number" required>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required>

        <label for="course">Course:</label>
        <input type="text" name="course" id="course" required>

        <button type="submit">Send Message</button>
    </form>
</main>

</body>
</html>
