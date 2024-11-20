<html>
     <head>
        <meta charset="UTF-8">               
        <meta name="author" content="Alex Asensio Sanchez">
        <meta name="application-name" content="indice">
        <meta name="description" content="Indice tema 3">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
         <link rel="stylesheet" href="webroot/css/indexProyectoTema4.css">
         <title>Alex Asensio Sanchez</title>
     </head>
     <body>
         <header>
             <h1>Proyecto tema 4</h1>
         </header>       
        <main>    
            <div id="scripts">
                <p><a href="mostrarcodigo/muestraCrearDB.php">Script creacion base de datos</a></p>
                <p><a href="mostrarcodigo/muestraCargarDB.php">Script carga base de datos</a></p>
                <p><a href="mostrarcodigo/muestraBorrarDB.php">Script borrado base de datos</a></p>
                <p><a href="mostrarcodigo/muestraConfDBPDO.php">Fichero configuracion PDO</a></p>
            </div>
            <table>
                <thead>
                    <th>nº</th>
                    <th>Enunciado</th>
                    <th colspan="2">PDO</th>
                    <th colspan="2">MYSQLI</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Conexión a la base de datos con la cuenta usuario y tratamiento de errores</td>
                        <td><a href="codigoPHP/ejercicio01PDO.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio01PDO.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                        <td><a href="codigoPHP/ejercicio01MYSQLI.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio01MYSQLI.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mostrar el contenido de la tabla Departamento y el número de registros</td>
                        <td><a href="codigoPHP/ejercicio02PDO.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio02PDO.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                        <td><a href="codigoPHP/ejercicio02MYSQLI.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio02MYSQLI.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores</td>
                        <td><a href="codigoPHP/ejercicio03PDO.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio03PDO.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos)</td>
                        <td><a href="codigoPHP/ejercicio04PDO.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio04PDO.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno</td>
                        <td><a href="codigoPHP/ejercicio05PDO.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio05PDO.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos utilizando una consulta preparada</td>
                        <td><a href="codigoPHP/ejercicio06PDO.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio06PDO.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Página web que toma datos de un fichero xml y los añade a la tabla Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el directorio .../tmp/ del servidor</td>
                        <td><a href="codigoPHP/ejercicio07PDO.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio07PDO.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se encuentra en el directorio .../tmp/ del servidor</td>
                        <td><a href="codigoPHP/ejercicio08PDO.php"><image src="webroot/images/play.png" heigth="25%" width="25%"/></a></td>
                        <td><a href="mostrarcodigo/muestraEjercicio08PDO.php"><image src="webroot/images/ojo.png" heigth="30%" width="30%"/></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Aplicación resumen MtoDeDepartamentosTema4. (Incluir PHPDoc y versionado en el repositorio GIT)</td>
                        <td><a></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Aplicación resumen MtoDeDepartamentos POO y multicapa</td>
                        <td><a></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                        <td><a></a></td>
                    </tr>
                </tbody>
            </table>           
        </main>
        <footer>
            <p><a href="../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../204DWESProyectoDWES/indexProyectoDWES.php">DWES</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESProyectoTema4">Repositorio del proyecto</a></p>
        </footer>
     </body>
 </html>
