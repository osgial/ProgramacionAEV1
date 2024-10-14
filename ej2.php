<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio2OscarGiner</title>
</head>
<body>
    <h1>Ejercicio 2</h1>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num = $_POST["num"];
        }

        $iteraciones = 0;

        if ($num > 1) {
            while ($num > 1) {
                $iteraciones ++;
                echo $num. ", ";
                if (($num % 2) == 0) {
                    $num = $num / 2;
                } else {
                    $num = ($num * 3) + 1;
                }
            }
        }
        echo "1<br>";
        echo "Se han realizado " .$iteraciones. " iteraciones";
    ?>
    
    <form method="POST" action="">
        <label for="num">NÚMERO:</label>
        <input type="number" id="num" name="num" min="0" value="">
        <br>
        <input type="submit" value="Calcular">
        <input type="reset" value="Reset">
    </form>
</body>
</html>