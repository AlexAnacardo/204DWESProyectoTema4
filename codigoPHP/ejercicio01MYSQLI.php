<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 01</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio01PDO.css">
    </head>
    <body>
        <main>
            <header>
                <h1>Conexion a la DB</h1>
            </header>
            <h2>Conexion exitosa</h2>
            <?php
            
            //Importamos el fichero de variables con las constantes que pertenecen a nuestra conexion
            require_once('../config/confDBPDO.php');
            
            try{
                $miDB=new mysqli('daw204.isauces.local','user204DWESProyectoTema4','paso','DB204DWESProyectoTema4'); //Establecemos la conexion
                $error=$miDB->connect_errno; //Controlamos los posibles errores de la conexion

                $miDB->close();
            } catch (mysqli_sql_exception $ex) {
                echo("<b>Error</b>: ".$ex->getMessage());
                echo("Codigo de error: ".$ex->getCode());
            }
                
            ?>
            <h2>Conexion erronea</h2>
            <?php
            
            //mostrar atributos get attribute            
            try{
                $miDB=new mysqli('daw204.isauces.local','user204DWESProyectoTema4','pasito','DB204DWESProyectoTema4'); //Establecemos la conexion
                
                unset($miDB);
                
            } catch (mysqli_sql_exception $ex) {
                echo("<b>Mensaje de error:</b> ".$ex->getMessage()."<br>");
                echo("<b>Codigo de error:</b> ".$ex->getCode());                
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
