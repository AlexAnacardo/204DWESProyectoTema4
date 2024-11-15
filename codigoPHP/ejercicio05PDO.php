<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 05</title>        
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
                            
                            //Establecemos la conexion
                            $miDB=new PDO(CONEXION, USUARIO, CONTRASEÑA);
                            $aDepartamentosNuevos=[
                                ['AAA', 'descripcion 1', date_format(new DateTime("now"), "Y-m-d h:m:s"), 100.34, null],
                                ['BBB', 'descripcion 2', date_format(new DateTime("now"), "Y-m-d h:m:s"), 200.56, null],
                                ['CCC', 'descripcion 3', date_format(new DateTime("now"), "Y-m-d h:m:s"), 300.83, null]
                            ];
                            
                            $miDB->beginTransaction();
                            /*
                            $miDB->exec("insert into T02_Departamento values('AAA', 'descripcion 1', 'now()', 100.34, null)");
                            $miDB->exec("insert into T02_Departamento values('BBB', 'descripcion 2', 'now()', 200.56, null)");
                            $miDB->exec("insert into T02_Departamento values('CCC', 'descripcion 3', 'now()', 300.83, null)");
                            */
                            for($i=0; $i<count($aDepartamentosNuevos); $i++){
                                $consulta=$miDB->prepare("insert into T02_Departamento values(?,?,?,?,?)");
                                $consulta->execute($aDepartamentosNuevos[$i]);
                            }                                                        
                            
                            $miDB->commit();
                            
                        } catch (PDOException $ex) {
                            $miDB->rollBack();
                            
                            echo("Fallo: ".$ex->getMessage());
                        }
                        finally{
                            unset($miDB);
                        }
                    }                    

                        ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                                                  
                                <div id="divEnviar">
                                   <input type="submit" name="enviar" id="enviar" value="Ejecutar transaccion">
                                </div>                                
                            </form>
                        <?php

                    //Establecemos la conexion
                    $miDB=new PDO(CONEXION, USUARIO, CONTRASEÑA);
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
