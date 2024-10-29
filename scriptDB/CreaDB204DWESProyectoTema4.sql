create database DB204DWESProyectoTema4;

use DB204DWESProyectoTema4;

create user if not exists 'user204DWESProyectoTema4'@'%' identified by 'paso';

grant all privileges on DB204DWESProyectoTema4.* to 'user204DWESProyectoTema4'@'%';



create table DB204DWESProyectoTema4.T02_Departamento(
    T02_CodDepartamento varchar(3) primary key,
    T02_DescDepartamento varchar(255),
    T02_FechaCreacionDepartamento datetime,
    T02_VolumenDeNegocio float,
    T02_FechaBajaDepartamento datetime
)engine=innodb;