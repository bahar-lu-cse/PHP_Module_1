<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=temperature_converter.php, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Temperature Converter</h1>

    <?php
    // Define variables
    $temperature = "";
    $conversionType = "";
    $result = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user inputs
        $temperature = floatval($_POST["temperature"]);
        $conversionType = $_POST["conversion_type"];

        // Perform temperature conversion
        if ($conversionType == "c_to_f") {
            $result = ($temperature * 9/5) + 32;
        } elseif ($conversionType == "f_to_c") {
            $result = ($temperature - 32) * 5/9;
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="temperature">Enter Temperature:</label>
        <input type="text" id="temperature" name="temperature" value="<?php echo $temperature; ?>" required>
        
        <label for="conversion_type">Conversion Type:</label>
        <select id="conversion_type" name="conversion_type">
            <option value="c_to_f">Celsius to Fahrenheit</option>
            <option value="f_to_c">Fahrenheit to Celsius</option>
        </select>
        
        <input type="submit" value="Convert">
    </form>

    <?php
    // Display the converted temperature
    if ($result !== "") {
        echo "<h2>Result:</h2>";
        if ($conversionType == "c_to_f") {
            echo "{$temperature} Celsius is {$result} Fahrenheit.";
        } elseif ($conversionType == "f_to_c") {
            echo "{$temperature} Fahrenheit is {$result} Celsius.";
        }
    }
    ?>
</body>
</html>