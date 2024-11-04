<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 01</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio21.css">
    </head>
    <body>
        <main>
            <header>
                <h1>Mostrar contenido</h1>
            </header>
            <h2>Conexion exitosa</h2>
            <?php
            
            require_once('../config/confDB.php');
            
            try{
                $miDB=new PDO(CONEXION, USUARIO, CONTRASEÑA); //Establecemos la conexion                
                $attributes = array(
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION",
                );
                
                foreach($attributes as $valor){
                    echo("$valor: ".$miDB->getAttribute(constant("PDO::ATTR_$valor"))."<br>");
                }
                
                unset($miDB);
                
            } catch (Error | Exception $ex) {
                echo("<b>Error inesperado:</b> ".$ex);
            }
                
            ?>
            
            <h2>Conexion erronea</h2>
            <?php
            
            //mostrar atributos get attribute            
            try{
                $miDB=new PDO('mysql:host=daw204.isauces.local;port=3306;dbname=DB204DWESProyectoTema4', 'user204DWESProyectoTema4','pasito'); //Establecemos la conexion                
                
                unset($miDB);
                
            } catch (PDOException $ex) {
                echo("<b>Error inesperado:</b> ".$ex->getMessage());
            }
                
            ?>
        </main>
        <footer>
            <p><a href="../../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../indexProyectoTema3.php">Tema 3</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema3/tree/developer">GitHub del repositorio</a></p>
        </footer>
    </body>
</html>
