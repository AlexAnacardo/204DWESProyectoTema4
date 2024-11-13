<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 02</title>
        <link rel="stylesheet" href="../webroot/css/ejercicio02MYSQLI.css">
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
                
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Alta departamento</th>
                            <th>Volumen negocio</th>
                            <th>Baja departamento</th>
                        </tr>
                    </thead>
                <?php
                    while ($oDepartamento=$resultadoConsulta->fetch_object()){
                        ?>
                        <tr>
                            <?php                        

                            $oFechaBaja=$oDepartamento->T02_FechaBajaDepartamento;

                            $sVolumen=strval($oDepartamento->T02_VolumenDeNegocio);

                            echo "<td>".$oDepartamento->T02_CodDepartamento."</td>";
                            echo "<td>".$oDepartamento->T02_DescDepartamento."</td>";
                            echo "<td>".date_format(new DateTime($oDepartamento->T02_FechaCreacionDepartamento), "d/m/Y")."</td>";
                            echo "<td>".str_replace(".", ",", $sVolumen)."€</td>";                        
                            echo is_null($oFechaBaja) ? '<td></td>' : "<td>".date_format(new DateTime($oFechaBaja), "d/m/Y")."</td>";
                            ?>
                        </tr>
                        <?php                                        
                    }
                    /*
                $registroArray=$resultadoConsulta->fetch_array();
                while(!empty($registroArray)){
                    echo($registroArray['T02_CodDepartamento'].", ");
                    echo($registroArray['T02_DescDepartamento'].", ");
                    echo($registroArray['T02_FechaCreacionDepartamento'].", ");
                    echo($registroArray['T02_VolumenDeNegocio'].", ");
                    echo empty($registroArray['T02_FechaBajaDepartamento']) ? "Vacio <br>" : $registroArray['T02_FechaBajaDepartamento']."<br>";
                
                    $registroArray=$resultadoConsulta->fetch_array();
                }
                */
                
                    
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
