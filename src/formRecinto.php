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
                        <option value="DIVERGENTE">DIVERGENTE</option>
                        <option value="CONVERGENTE">CONVERGENTE</option>
                        <option value="ASIMILADOR">ASIMILADOR</option>
                        <option value="ACOMODADOR">ACOMODADOR</option>
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
                        <option value="F">Masculino</option>
                        <option value="M">Femenino</option>
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
        if (isset($_POST['promedioBtn'])) {
            echo "<p>Hola post</p>";
        }
    ?>
</body>
</html>