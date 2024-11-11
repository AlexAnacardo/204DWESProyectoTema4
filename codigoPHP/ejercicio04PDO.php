<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 03</title>        
        <link rel="stylesheet" href="../webroot/css/ejercicio04PDO.css">            
    </head>
    <body>
        <main>
            <header>
                <h1>Buscar departamento</h1>
            </header>
            <?php
                /**
                 * @author Alex Asensio Sanchez
                 * @version Fecha de última modificación 06/11/2024
                 */
                 
                 //Importamos el fichero de variables con las constantes que pertenecen a nuestra conexion
                try{                                    
                    require_once('../config/confDBPDO.php');

                    //Establecemos la conexion
                    $miDB=new PDO(CONEXION, USUARIO, CONTRASEÑA);   
                    //importamos la libreria de vaidaciones
                    require_once('../core/231018libreriaValidacion.php');
                    $entradaOK=true; //Booleano que confirma que todo va bien               

                    $aErrores=[  //Array de errores                                            
                        'descripcion'=>''                        
                    ]; 
                    $aRespuestas=[  //Array de respuestas                                       
                        'descripcion'=>'',                        
                    ];

                    define('MAX_CADENA', 10000);
                    define('MIN_CADENA', 0);
                    define('OPCIONAL', 0);

                    if(isset($_REQUEST['enviar'])){                        
                            $aErrores=[                                                                          
                                'descripcion'=> validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], MAX_CADENA, MIN_CADENA, OPCIONAL),                                                                                           
                            ];   
                        
                        //Recorremos el array de errores 
                        foreach ($aErrores as $clave => $valor) {
                            if ($valor == !null) {
                                $entradaOK = false;
                                //Limpiamos el campo si hay un error
                                $_REQUEST[$clave] = ''; 
                            }
                        }
                    }
                    else{
                        $entradaOK=false;
                    }
                

                        ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                                                  
                                <div id="divDescripcion">
                                    <label for="descripcion">Descripcion: </label>
                                    <textarea name="descripcion" id="descripcion" rows="2" cols="50" style="resize: none"></textarea>
                                    <?php if (!empty($aErrores["descripcion"])) { ?>
                                        <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                        <p style="color: red"><?php echo $aErrores["descripcion"]; ?></p>
                                    <?php } ?>
                                </div>                                
                                <div id="divEnviar">
                                   <input type="submit" name="enviar" id="enviar" value="Enviar">
                                </div>                                
                            </form>
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
                    
                    //Lanzamos un query de consulta y lo guardamos en una variable                    
                    if(isset($_REQUEST['descripcion']) and $_REQUEST['descripcion']!=''){                   
                        $resultadoConsulta = $miDB->prepare("select * from T02_Departamento where T02_DescDepartamento=?");
                        $resultadoConsulta->execute([$_REQUEST['descripcion']]);                         
                    }
                    else{
                        $resultadoConsulta= $miDB->query('select * from T02_Departamento');
                    }
                    
                        
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
