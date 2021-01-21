<!DOCTYPE html>
<html>

<head>

    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>Recinto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">


    <meta name="generator" content="Bluefish 2.2.2">


    <style type="text/css">
        <!--
        @page {
            margin: 2cm
        }

        P {
            margin-bottom: 0cm;
            text-align: justify
        }

        P.western {
            so-language: es-ES
        }
        -->
    </style>
</head>

<body>
    <?php include("../header.php");
    ?>
    <h2 class="container">Formulario 2: Adivinar recinto</h2>
    <br>
    <div class="container" style="border: 1px solid black;padding: 30px;">
        <form method="POST" action="formRecinto.php">
            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Indique su estilo de aprendizaje: </label>
                </div>
                <div class="col-sm-3">
                    <select name="Estilo">
                        <option value="1">DIVERGENTE</option>
                        <option value="2">CONVERGENTE</option>
                        <option value="3">ASIMILADOR</option>
                        <option value="4">ACOMODADOR</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Indique su ultimo promedio de matricula: </label>
                </div>
                <div class="col-sm-3">
                    <input name="Promedio" type="number" min="0" value="10" max="10">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Indique su sexo:</label>
                </div>
                <div>
                    <select name="Sexo">
                        <option value="1">Femenino</option>
                        <option value="2">Masculino</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <input name="promedioBtn" type="submit" value="Adivinar">
                </div>
            </div>
        </form>
    </div>
    <?php
    //para poder calcular la distancia euclidiana de texto a caracteres, a cada uno se le asignara un valor numerico
    if (isset($_POST['promedioBtn'])) {
        include "db_connection.php";
        include "calculoEuclidiano.php";
        include "textToNum.php";
        //creo el objeto de conexion
        $connection = createDatabase();
        //preparo la consulta
        $stmt = $connection->prepare("Select * FROM EstiloSexoPromedioRecinto");
        //definimos el modo de fecth que es la forma en como nos retornara los datos
        //FETCH_ASSOC nos devolvera los datos en un array indexado cuyos keys son el nombre de las columnas.
        $stmt->execute();
        $resultArrayBD = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        //obtenemos las caracteristicas brindadas por el usuario
        $estilo = $_POST['Estilo'];
        $promedio = floatval($_POST['Promedio']);
        $sexo = $_POST['Sexo'];

        //creamos un arreglo formado de estos 3 valores
        $sampleArray = array(
            estiloToNum($estilo), $promedio, sexoToNum($sexo)
        );

        //asignamos variable para guardar el mejor valor y compararlo en cada iteracion
        $bestSample = null;
        //en esta variable guardaremos el recinto del registro que tenga una menor distancia euclidiana con los datos del usuario actual
        $sampleRecinto = null;
        //con esta variable nos aseguramos de que solo el primer valor que retorne la funcion dist() sea asignada automaticamente
        //para que bestSample no tenga un valor de nulo
        $primerContador = 0;
        //Creamos un ciclo para comparar los datos del usuario actual con los guardados en la base de datos
        foreach ($resultArrayBD as $item) {
            $baseArray = array(
                estiloToNum($item['Estilo']),
                floatval($item['Promedio']),
                sexoToNum($item['Sexo']),
                $item['Recinto']

            );

            $distanciaEuclidiana = dist($sampleArray, $baseArray);
            //nos aseguramos de tener la mejor muestra, en menor es mejor
            if ($distanciaEuclidiana <= $bestSample || $primerContador == 0) {
                $bestSample = $distanciaEuclidiana;
                $sampleRecinto = $baseArray[3]; //obtiene el atributo estilo en el indice 4
                $primerContador++;
            }
        }

        echo "<div class='container' style='border: 1px solid black;padding: 28px;'><font color='#2574a9'><font size='6'>Su recinto es: $sampleRecinto</font></font></div><br>";

        $connection = null;
    }
    ?>
</body>

</html>