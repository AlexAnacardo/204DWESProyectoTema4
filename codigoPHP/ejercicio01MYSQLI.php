<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 01</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio21.css">
    </head>
    <body>
        <main>
            <header>
                <h1>Conexion a la DB</h1>
            </header>
            <?php
            try{
                $miDB=new mysqli('daw204.isauces.local','user204DWESProyectoTema4','paso','DB204DWESProyectoTema4'); //Establecemos la conexion
                $error=$miDB->connect_errno; //Controlamos los posibles errores de la conexion

                $miDB->close();
            } catch (Error | Exception $ex) {
                echo("<b>Error inesperado</b>: ".$ex);
            }
                
            ?>
        </main>
        <footer>
            <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../indexProyectoTema4.php">Tema 4</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema4/tree/developer">GitHub del repositorio</a></p>
        </footer>
    </body>
</html>
