<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Basic Calculator</title>
</head>
<body>  
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num01" placeholder="Number 1" required>
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multi">*</option>
            <option value="divde">/</option>
        </select>
        <input type="number" name="num02" placeholder="Number 2" required>
        <button>Calculate</button>
    </form>

    <?php

    // For getting values

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num01 = filter_input(INPUT_POST, "num01", FILTER_VALIDATE_FLOAT);
        $num02 = filter_input(INPUT_POST, "num02", FILTER_VALIDATE_FLOAT); 
        $operator = htmlspecialchars($_POST["operator"]);

        $errors = false;

    // For errors

        if(empty($num01) || empty($num02) || empty($operator)) {
            echo "<P class='calc-error>Fill in all fields!</P>";    
            $errors = true;
        }
    
        if(!is_numeric($num01) || !is_numeric($num02)) {
            echo "<P class='calc-error>Only write numbers!</P>";    
            $errors = true;
        }
    
    // For calculating Numbers     
       if(!$errors) {
        $value = 0;
        
        switch($operator) {
                case "add":
                    $value = $num01 + $num02;
                break;
                case "subtract":
                    $value = $num01 - $num02;
                break;
                case "multi":
                    $value = $num01 * $num02;
                break;
                case "divide":
                    $value = $num01 / $num02;
                break;
                default:
                    echo "<P class='calc-error>Something wend wrong!</P>";
            }

            echo "<P class='calc-result'>Result = " . 
                $value . "</p>";
        } 
    }
    ?>

</body>
</html>