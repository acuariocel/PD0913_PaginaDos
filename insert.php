<html>
    <head>
        <title>Insertar datos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        $servername = "Pc2";
        $username = "root";
        $password = "";
        $dbname = "test";
        extract($_POST);
        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Verifica si se conectó
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
//        $cedula='1102423502';
//        $nombres='maria';
//        $apellidos='Sanchez';
//        $edad=23;
        $sql = "INSERT INTO personas (cedula, nombres, apellidos, edad) VALUES ('".$cedula."', '".$nombres."', '" . utf8_decode($apellidos) . "',". $edad.")";

        if ($conn->query($sql) === TRUE) {
            echo "Insertado correctamente";
        } else {
            if (strcmp('Duplicate', substr($conn->error, 0, 9)) === 0) {
                echo 'Dato duplicado '.$cedula;
            } else {
                echo "Error: " . utf8_encode($sql) . "<br>" . $conn->error;
            }
        }
        $conn->close();
        ?>
    </body>
</html>