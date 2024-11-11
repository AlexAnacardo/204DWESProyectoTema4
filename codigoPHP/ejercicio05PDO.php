<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 03</title>        
        <link rel="stylesheet" href="../webroot/css/ejercicio05PDO.css">            
    </head>
    <body>
        <main>
            <header>
                <h1>Introducir departamentos con transaction</h1>
            </header>
            <?php
                /**
                 * @author Alex Asensio Sanchez
                 * @version Fecha de última modificación 06/11/2024
                 */
                 
                 //Importamos el fichero de variables con las constantes que pertenecen a nuestra conexion
                try{                                    
                    require_once('../config/confDBPDO.php');
                    //NO LE PIDE NADA AL USUARIO, TODO LO HACE EL PROGRAMADOR
                    //Establecemos la conexion
                    $miDB=new PDO(CONEXION, USUARIO, CONTRASEÑA);   
                    //importamos la libreria de vaidaciones
                    require_once('../core/231018libreriaValidacion.php');
                    $entradaOK=true;


                    if(isset($_REQUEST['enviar'])){
                        
                    }
                    else{
                        $entradaOK=false;
                    }

                    if($entradaOK){                                                                        
                        try{
                            $insercion= $miDB->prepare('insert into T02_Departamento values(?,?,?,?,?)');

                            $insercion->bindParam(1, $sCodigo);
                            $insercion->bindParam(2, $sDescripcion);
                            $insercion->bindParam(3, $oFecha);
                            $insercion->bindParam(4, $fVolumen);
                            $insercion->bindParam(5, $oNull);

                            $insercion->execute();
                        } catch (PDOException $ex) {

                        }                       
                    }                    

                        ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                                                  
                                <div id="divEnviar">
                                   <input type="submit" name="enviar" id="enviar" value="Ejecutar transaccion">
                                </div>                                
                            </form>
                        <?php


                    //Lanzamos un query de consulta y lo guardamos en una variable
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

                    //Asignamos a la variable oResultado el 1er objeto de las respuestas recibidas del query, mientras el objeto contenga valores, se ejecutara el bucle                
                    while ($oDepartamento=$resultadoConsulta->fetchObject()){
                        ?>
                        <tr>
                            <?php
                            $oFechaBaja=$oDepartamento->T02_FechaBajaDepartamento;
                        
                            echo "<td>".$oDepartamento->T02_CodDepartamento."</td>";
                            echo "<td>".$oDepartamento->T02_DescDepartamento."</td>";
                            echo "<td>".date_format(new DateTime($oDepartamento->T02_FechaCreacionDepartamento), "d/m/Y")."</td>";
                            echo "<td>".$oDepartamento->T02_VolumenDeNegocio."</td>";
                            echo is_null($oFechaBaja) ? '<td></td>' : "<td>".date_format(new DateTime($oFechaBaja), "d/m/Y")."</td>";                            
                            ?>
                        </tr>
                        <?php                                        
                    }
                    ?>
                    </table> 
                <?php
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
