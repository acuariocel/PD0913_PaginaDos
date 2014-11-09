<!DOCTYPE html>
<html>
    <head>
        <title>Conexión a Mysql</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        header("refresh:1");
        // Conectando, seleccionando la base de datos
        $link = mysql_connect('Pc2', 'root', '') or die('No se pudo conectar: ' . mysql_error());
        echo 'Connected successfully<br>';
        mysql_select_db('test') or die('<font color="red">No se pudo seleccionar la base de datos</font>');
        echo 'Base seleccionada correctamente<br>';
        // Realizar una consulta MySQL
        $query = 'SELECT * FROM personas';
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

        // Imprimir los resultados en HTML
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Cédula</th>";
        echo "<th>Nombres</th>";
        echo "<th>Apellidos</th>";
        echo "<th>Edad</th>";
        echo "</tr>";
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "<tr>";
            foreach ($line as $col_value) {
                echo '<td>'.utf8_encode($col_value).'</td>';
//                echo "<td>$col_value</td>";
//                echo "<td>".  utf8_encode($line["cedula"])."</td>";
//                echo "<td>".  utf8_encode($line["nombres"]." ".$line["apellidos"])."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        // Liberar resultados
        mysql_free_result($result);

        // Cerrar la conexión
        mysql_close($link);
        ?>
        <h1>Fin de la página</h1>
    </body>
</html>