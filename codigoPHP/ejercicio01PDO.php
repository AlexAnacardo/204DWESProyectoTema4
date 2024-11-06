<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 01</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio01PDO.css">
    </head>
    <body>        
        <header>
            <h1>Conexion a la DB</h1>
        </header>
        <main>
            <h2>Conexion exitosa</h2>
            <?php
            
            //Importamos el fichero de variables con las constantes que pertenecen a nuestra conexion
            require_once('../config/confDBPDO.php');
            
            try{
                //Establecemos la conexion usando las variables globales
                $miDB=new PDO(CONEXION, USUARIO, CONTRASEÑA);           
                
                //Declaramos el array con los atributos de la conexion
                $aAtributos = array(
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION",
                );
                
                foreach($aAtributos as $valor){
                    echo("$valor: ".$miDB->getAttribute(constant("PDO::ATTR_$valor"))."<br>");
                }
                
                unset($miDB);
                
            } catch (PDOException $ex) {
                echo("<b>Mensaje de error:</b> ".$ex->getMessage()."<br>");
                echo("<b>Codigo de error:</b> ".$ex->getCode());
            }
                
            ?>
            
            <h2>Conexion erronea</h2>
            <?php
            
            //mostrar atributos get attribute            
            try{
                $miDB=new PDO('mysql:host=daw204.isauces.local;port=3306;dbname=DB204DWESProyectoTema4', 'user204DWESProyectoTema4','pasito'); //Establecemos la conexion                
                
                unset($miDB);
                
            } catch (PDOException $ex) {
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
