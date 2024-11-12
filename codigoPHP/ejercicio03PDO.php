<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 03</title>        
        <link rel="stylesheet" href="../webroot/css/ejercicio03PDO.css">            
    </head>
    <body>
        <main>
            <header>
                <h1>Ejercicio 3</h1>
            </header>
            <?php
                /**
                 * @author Alex Asensio Sanchez
                 * @version Fecha de última modificación 06/11/2024
                 */
                 
                 //Importamos el fichero de variables con las constantes que pertenecen a nuestra conexion
                try{  
                    define('MAX_CADENA', 3);
                    define('MIN_CADENA', 1);
                    define('MIN_VOLUMEN', 0);
                    define('MIN_FLOAT', 0);
                    define('OBLIGATORIO', 1);
                    
                    require_once('../config/confDBPDO.php');

                    //Establecemos la conexion
                    $miDB=new PDO(CONEXION, USUARIO, CONTRASEÑA);   
                    //importamos la libreria de vaidaciones
                    require_once('../core/231018libreriaValidacion.php');
                    $entradaOK=true; //Booleano que confirma que todo va bien               

                    $aErrores=[  //Array de errores
                        'codigo' => '',                    
                        'descripcion'=>'',
                        'volumen'=>''                    
                    ]; 
                    $aRespuestas=[  //Array de respuestas
                        'codigo' => '',                    
                        'descripcion'=>'',
                        'volumen'=>'' 
                    ];

                    

                    if(isset($_REQUEST['enviar'])){
                        
                            $aErrores=[                            
                                'codigo' => validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'], MAX_CADENA, MIN_CADENA, OBLIGATORIO),                                                       
                                'descripcion'=> validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], 1000, MIN_CADENA, OBLIGATORIO),                                
                                'volumen'=> validacionFormularios::comprobarFloat($_REQUEST['volumen'], PHP_FLOAT_MAX, MIN_FLOAT, OBLIGATORIO),                                   
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

                    if($entradaOK){                                                
                        
                        $aRespuestas['codigo']=$_REQUEST['codigo'];                    
                        $aRespuestas['descripcion']=$_REQUEST['descripcion'];
                        $aRespuestas['volumen']=$_REQUEST['volumen'];                                                
                        
                        $insercion= $miDB->prepare("insert into T02_Departamento values(:codigo,:descripcion, now(),:volumen, null)");

                        $insercion->bindParam(':codigo', $aRespuestas['codigo']);
                        $insercion->bindParam(':descripcion', $aRespuestas['descripcion']);
                        $insercion->bindParam(':volumen', $aRespuestas['volumen']);
                        

                        $insercion->execute();
                        
                        unset($_REQUEST);                        
                    }                    

                        ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                  
                                <div id="divCodigo">
                                    <label for="codigo">Codigo departamento: </label>
                                    <input type="text" name="codigo" id="codigo" style="background-color: #ffffb3" value="<?php echo (isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : ''); ?>">
                                    <?php if (!empty($aErrores["codigo"])) { ?>
                                        <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                        <p style="color: red"><?php echo $aErrores["codigo"]; ?></p>
                                    <?php } ?>
                                </div>
                                <div id="divDescripcion">
                                    <label for="descripcion">Descripcion: </label>
                                    <textarea name="descripcion" id="descripcion" rows="2" cols="50" style="resize: none; background-color: #ffffb3"></textarea>
                                    <?php if (!empty($aErrores["descripcion"])) { ?>
                                        <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                        <p style="color: red"><?php echo $aErrores["descripcion"]; ?></p>
                                    <?php } ?>
                                </div>
                                <div id="divVolumen">
                                    <label for="volumen">Volumen negocio: </label>
                                    <input type="text" name="volumen" id="volumen" style="background-color: #ffffb3" value="<?php echo (isset($_REQUEST['volumen']) ? $_REQUEST['volumen'] : ''); ?>">
                                    <?php if (!empty($aErrores["volumen"])) { ?>
                                        <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                                        <p style="color: red"><?php echo $aErrores["volumen"]; ?></p>
                                    <?php } ?>
                                </div>
                                <div id="divEnviar">
                                   <input type="submit" name="enviar" id="enviar" value="Enviar">
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
