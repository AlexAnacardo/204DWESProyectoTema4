<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 02</title>        
        <link rel="stylesheet" href="../webroot/css/ejercicio02PDO.css">            
    </head>
    <body>
        <main>
            <header>
                <h1>Mostrar tablas</h1>
            </header>
            <?php
            
            //Usar fetch object
            
            try{                
                //Importamos el fichero de variables con las constantes que pertenecen a nuestra conexion
                require_once('../config/confDBPDO.php');
                
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
                //Finalizamos la conexion
                unset($miDB);
                
            } catch (PDOException $ex) {
                //Si se produce algun error, este se capturara aqui y se mostrara su codigo y mensaje
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
