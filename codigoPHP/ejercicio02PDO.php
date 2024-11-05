<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ej 02</title>        
        <link rel="stylesheet" href="../webroot/css/ejercicio02PDO.css">            
    </head>
    <body>
        <main>
            <header>
                <h1>Ejercicio 2</h1>
            </header>
            <?php
            
            //Usar fetch object
            
            try{
                //Establecemos la conexion
                $miDB=new PDO('mysql:host=daw204.isauces.local;port=3306;dbname=DB204DWESProyectoTema4', 'user204DWESProyectoTema4','paso');                 
                
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
                        //Recorremos el objeto mostrando el nombre del campo y su valor
                        foreach ($oDepartamento as $clave => $valor) {                            
                            if($clave=='T02FechaCreacionDepartamento' or $clave=='T02FechaBajaDepartamento'){
                                echo "<td>".date_format(new DateTime($valor), "d/m/Y")."</td>";
                            }
                            else{
                                echo "<td>$valor</td>";
                            }
                        }
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
