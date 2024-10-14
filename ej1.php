<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio1OscarGiner</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    
    <?php
        $preciototal = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $kilos = $_POST["peso"];
            $alto = $_POST["alto"];
            $largo = $_POST["largo"];
            $ancho = $_POST["ancho"];
            $zona = $_POST["zona"];
            $npaquetes = $_POST["paquetes"];
        }

        $alto = $alto / 100;
        $ancho = $ancho / 100;
        $largo = $largo / 100;
        $tamaño = $alto * $largo * $ancho;
        
        if ($tamaño <= 0.5){
            $preciotamaño = $tamaño * 50;
        } elseif ($tamaño >= 1) {
            $preciotamaño = $tamaño * 100;
        } else {
            $preciotamaño = $tamaño * 75;
        }

        switch ($kilos) {
            case '0-4':
                $precioincrementado1 = $preciotamaño;
                break;
            case '5-9':
                $precioincrementado1 = ($preciotamaño * 25) / 100;
                $precioincrementado1 = $precioincrementado1 + $preciotamaño;
                break;
            case '10-14':
                $precioincrementado1 = ($preciotamaño * 50) / 100;
                $precioincrementado1 = $precioincrementado1 + $preciotamaño;
                break;
            default:
                $precioincrementado1 = $preciotamaño;
                break;
        }

        switch ($zona) {
            case 'peninsula':
                $precioincrementado2 = $precioincrementado1;
                break;
            case 'baleares maritimo':
                $precioincrementado2 = $precioincrementado1;
                break;
            case 'baleares aereo':
                $precioincrementado2 = ($precioincrementado1 * 10) / 100;
                $precioincrementado2 = $precioincrementado1 + $precioincrementado2;
                break;
            case 'canarias':
                $precioincrementado2 = ($precioincrementado1 * 10) / 100;
                $precioincrementado2 = $precioincrementado1 + $precioincrementado2;
                break;
        }

        if ($npaquetes > 0) {
            $preciototal = $precioincrementado2 * $npaquetes;
        }

        if ($preciototal > 0) {
            echo "El precio total es de " .$preciototal. "€";
        } else {
            echo "No has metido todos los datos necesarios";
        }
    ?>
    
    <form method="POST" action="">
        <label for="paquetes">Nº PAQUETES:</label>
        <input type="number" id="paquetes" name="paquetes" value="">
        <br>
        <label for="ancho">ANCHO(en cm):</label>
        <input type="number" id="ancho" name="ancho" value="">
        <br>
        <label for="largo">LARGO(en cm):</label>
        <input type="number" id="largo" name="largo" value="">
        <br>
        <label for="alto">ALTO(en cm):</label>
        <input type="number" id="alto" name="alto" value="">
        <br>
        <label for="peso">PESO(en kg):</label>
        <input type="number" id="peso" name="peso" value="">
        <br>
        <label for="zona">ZONA:</label>
        <select name="zona" id="zona">
        <option value="peninsula">Peninsula</option>
        <option value="baleares maritimo">Baleares Marítimo</option>
        <option value="baleares aereo">Baleares Aéreo</option>
        <option value="canarias">Canarias</option>
        </select>
        <br>
        <input type="submit" value="Calcular">
        <input type="reset" value="Reset">
    </form>
</body>
</html>