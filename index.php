<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        <?php include "style.css" ?>
    </style>

</head>

<body>
    <div class="container">
        <h2>Calculator</h2>
        <form method="post" action="">
            <input type="number" name="num1" placeholder="Enter Number 1"><br>
            <input type="number" name="num2" placeholder="Enter Number 2"><br>
            <select name="Operation" id="">
                <option value="add">Addition</option>
                <option value="sub">Subtraction</option>
                <option value="mul">Multiplication</option>
                <option value="div">Division</option>
                <option value="bn">Binary</option>
                <option value="oc">Octal</option>
                <option value="hex">Hexadecimal</option>
            </select>
            <br>
            <button type="submit" name="submit">Calculate</button>
        </form>
        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = $_POST["num1"];
                $num2 = $_POST["num2"];
                $Operation = $_POST["Operation"];
                switch ($Operation) {
                    case "add":
                        $result = $num1 + $num2;
                        echo "Result: $result";
                        break;
                    case "sub":
                        $result = $num1 - $num2;
                        echo "Result: $result";
                        break;
                    case "mul":
                        $result = $num1 * $num2;
                        echo "Result: $result";
                        break;
                    case "div":
                        if ($num2 != 0) {
                            $result = $num1 / $num2;
                            echo "Result: $result";
                            break;
                        } else {
                            echo "Division by 0 is not possible";
                        }
                    case "bn":
                        echo "Binary: " . decbin($num1);
                }
            }
            ?>
        </div>
    </div>
</body>

</html>