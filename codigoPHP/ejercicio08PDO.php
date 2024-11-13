<?php
/*
$json=json_encode($value)

$json= json_decode($json);
        
file_get_contents($filename)
*/
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 08</title>        
        <link rel="stylesheet" href="../webroot/css/ejercicio08PDO.css">            
    </head>
    <body>
        <main>
            <header>
                <h1>Exportar datos</h1>
            </header>
            <?php
                /**
                 * @author Alex Asensio Sanchez
                 * @version Fecha de última modificación 13/11/2024
                 */
                 
                //Importamos el fichero de variables con las constantes que pertenecen a nuestra conexion
                require_once('../config/confDBPDO.php');
                
                try{                                 
                    //Establecemos la conexion
                    $miDB=new PDO(CONEXION, USUARIO, CONTRASEÑA);                                           

                    //Lanzamos un query de consulta y lo guardamos en una variable
                    $consulta= $miDB->query('select * from T02_Departamento');  
                    
                    $resultados=$consulta->fetchAll(PDO::FETCH_ASSOC);
                                                            
                    file_put_contents('departamentos.json', json_encode($resultados));   
                    
                     
                }catch (PDOException $ex) {
                    //Si se produce algun error, este se capturara aqui y se mostrara su codigo y mensaje
                    echo("<b>Mensaje de error:</b> ".$ex->getMessage()."<br>");
                    echo("<b>Codigo de error:</b> ".$ex->getCode());
                }
                finally{
                    unset($miDB);
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
