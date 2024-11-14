<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 07</title>        
        <link rel="stylesheet" href="../webroot/css/ejercicio07PDO.css">            
    </head>
    <body>
        <main>
            <header>
                <h1>Importar datos</h1>
            </header>
            <?php
                /**
                 * @author Alex Asensio Sanchez
                 * @version Fecha de última modificación 13/11/2024
                 */
            
                //Importamos el fichero de variables con las constantes que pertenecen a nuestra conexion            
                require_once('../config/confDBPDO.php'); 
                //Importamos la libreria de validacion
                require_once('../core/231018libreriaValidacion.php');
                $entradaOK=true; //Booleano que confirma que todo va bien
                
                $aErrores=[  //Array de errores
                    'nombreArchivo' => '',                   
                ]; 
                $aRespuestas=[  //Array de respuestas
                    'nombreArchivos'=>" ",
                ];
                
                try{                    
                    /*
                    $fechaActual=date_format(new DateTime("now"), "Y-m-d");
                    $json= file_get_contents("../tmp/{$fechaActual}departamentos.json"); 
                    
                    $arrayJson= json_decode($json);
                    */ 
                                        
                    if(isset($_REQUEST['enviar'])){
                        
                            $aErrores=[
                                //'nombreArchivos'=> validacionFormularios::validarElementoEnLista($_REQUEST['enviar'], scandir("../tmp/"))
                            ];

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
                                                    
                            $json= file_get_contents("../tmp/{$_REQUEST['nombreArchivo']}");

                            $arrayJson= json_decode($json);

                            $miDB=new PDO(CONEXION, USUARIO, CONTRASEÑA);
                            $miDB->beginTransaction();

                            $totalInserciones=0;
                            foreach($arrayJson as $objJson){
                                $insercion= $miDB->prepare("insert into T02_Departamento values(:codigo, :descripcion, :fechaAlta, :volumen, :baja)");

                                $insercion->bindParam(':codigo', $objJson->T02_CodDepartamento);
                                $insercion->bindParam(':descripcion', $objJson->T02_DescDepartamento);
                                $insercion->bindParam(':fechaAlta', $objJson->T02_FechaCreacionDepartamento);
                                $insercion->bindParam(':volumen', $objJson->T02_VolumenDeNegocio);
                                $insercion->bindParam(':baja', $objJson->T02_FechaBajaDepartamento);

                                $insercion->execute();

                                $totalInserciones++;
                            }

                            $miDB->commit();    
                            ?>
                            <div>
                            <?php
                                echo("<p>Insercion completada, se han insertado {$totalInserciones} registros</p>");
                            ?>
                            </div>
                            <?php
                        }
                    
                    
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                       
                                <label for="nombreArchivo">Elija archivo</label>
                                <select name="nombreArchivo" id="nombreArchivo">
                                    <?php
                                        $arrayArchivos= scandir("../tmp/");
                                        foreach ($arrayArchivos as $nombreArchivo){
                                            if(!is_dir("../tmp/{$nombreArchivo}")){
                                                echo('<option value="'.$nombreArchivo.'" id="'.$nombreArchivo.'">'.$nombreArchivo.'</option>');                                    
                                            }
                                        }
                                    ?>
                                </select>                        
                            <input type="submit" name="enviar" id="enviar" value="Enviar">
                        </form>
                    <?php
                                        
                }catch (PDOException $ex) {
                    $miDB->rollBack();
                    ?>
                        <div>
                    <?php
                            echo('<p style="color: red">No se han podido insertar los registros</p><br>');
                            //Si se produce algun error, este se capturara aqui y se mostrara su codigo y mensaje
                            echo("<p><b>Mensaje de error:</b> ".$ex->getMessage()."</p><br>");
                            echo("<p><b>Codigo de error:</b> ".$ex->getCode()."</p>");
                    ?>
                        </div>
                    <?php
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
