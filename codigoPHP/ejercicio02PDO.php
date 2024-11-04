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
            
            //Usar fetch object
            
            try{
                $miDB=new PDO('mysql:host=daw204.isauces.local;port=3306;dbname=DB204DWESProyectoTema4', 'user204DWESProyectoTema4','paso'); //Establecemos la conexion                
                
                $resultadoConsulta= $miDB->query('select * from T02_Departamento');
                
                $registroArray=$resultadoConsulta->fetch();
                while(!empty($registroArray)){
                    echo($registroArray['T02_CodDepartamento'].", ");
                    echo($registroArray['T02_DescDepartamento'].", ");
                    echo($registroArray['T02_FechaCreacionDepartamento'].", ");
                    echo($registroArray['T02_VolumenDeNegocio'].", ");
                    echo empty($registroArray['T02_FechaBajaDepartamento']) ? "Vacio <br>" : $registroArray['T02_FechaBajaDepartamento']."<br>";
                
                    $registroArray=$resultadoConsulta->fetch();
                }
                
                
                    
                unset($miDB);
                
            } catch (PDOException $ex) {
                echo("Error inesperado: ".$ex);
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
