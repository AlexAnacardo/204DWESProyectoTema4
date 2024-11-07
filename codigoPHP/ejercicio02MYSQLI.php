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
            <?php
            try{
                $miDB=new mysqli('daw204.isauces.local','user204DWESProyectoTema4','paso','DB204DWESProyectoTema4'); //Establecemos la conexion
                $error=$miDB->connect_errno; //Controlamos los posibles errores de la conexion
                
                $resultadoConsulta= $miDB->query('select * from T02_Departamento');
                
                $registroArray=$resultadoConsulta->fetch_array();
                while(!empty($registroArray)){
                    echo($registroArray['T02_CodDepartamento'].", ");
                    echo($registroArray['T02_DescDepartamento'].", ");
                    echo($registroArray['T02_FechaCreacionDepartamento'].", ");
                    echo($registroArray['T02_VolumenDeNegocio'].", ");
                    echo empty($registroArray['T02_FechaBajaDepartamento']) ? "Vacio <br>" : $registroArray['T02_FechaBajaDepartamento']."<br>";
                
                    $registroArray=$resultadoConsulta->fetch_array();
                }
                
                
                    
                $miDB->close();
                
            } catch (Error | Exception $ex) {
                echo("Error inesperado: ".$ex);
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
